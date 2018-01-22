<?php


namespace Garad\PlatformBundle\Controller;

use Garad\PlatformBundle\Elastic\Client;
use Garad\PlatformBundle\GaradPlatformBundle;
use Garad\PlatformBundle\Search\Models\ElasticModels\ElasticRelation;
use Garad\PlatformBundle\Search\Parser\FetchWord;
use Garad\PlatformBundle\Search\Parser\DocumentParser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Garad\PlatformBundle\Search\Models\ElasticFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Garad\PlatformBundle\Search\Exception\ErrorException;

class JdmController extends Controller
{
    /**
     * @Route("/", name="jdm_index")
     */
    public function indexAction()
    {

        if(isset($_POST["search"]) && strcmp($_POST["search"],"")!== 0){
            return $this->redirectToRoute('jdm_search', array('word' => $_POST["search"]));
        }
        $content = $this->get('templating')->render('GaradPlatformBundle:Jdm:index.html.twig');

        return new Response($content);
    }

    /*public function searchAction($word)
    {

        $extract = new GaradSearch();
        $result = $extract->getElement($word);
        $isNewWord = $extract->isNewWord();

        $content = $this->get('templating')->render('GaradPlatformBundle:Jdm:result.html.twig', array('result' => $result, 'isNewWord' => $isNewWord, 'word' => $word));
        return new Response($content);
    }*/

    /**
     * @Route("/{word}", name="jdm_search")
     */
    public function displayAction($word){

        try {
            $node_cache = $this->getWord($word);
        }
        catch(ErrorException $exception) {
            //We check the error code
            $errorMessage = 'Mot ' . $word . ' : ' . $exception->getMessage();

            if($exception->getCode() == ErrorException::WARNING){
                $this->get('session')->getFlashBag()->add('warn', 'Le mot contient trop de relations pour être supporté par rezo-dump (le site où nous récupérons les données)');
            }
            if($exception->getCode() == ErrorException::ERROR){
                $errorMessage = 'Mot ' . $word . ' : ' . $exception->getMessage();
                $this->get('session')->getFlashBag()->add('error', 'Le mot nexiste pas sur la plateforme jdm');
            }
            $this->get('logger')->error($errorMessage);
            return $this->render('GaradPlatformBundle:Jdm:index.html.twig');
        }

        return $this->render('GaradPlatformBundle:Jdm:result.html.twig',array(
            'cache' => $node_cache
        ));
    }

    public function getWord($word){

        $node_cache = null;


        $response = Client::search('nodes-cache','node-cache', [
            'query' => [
                'match' => [
                    'name' => urldecode($word)
                ]
            ]
        ]);

        dump($response);

        if(count($response->hits->hits) !=  0){

            dump("from elastic");
            $node_cache = $response->hits->hits[0]->_source;
            dump($node_cache);
            return $node_cache;
        }
        else {
            $html = FetchWord::fetch($word);
            try{
                $node_cache = DocumentParser::parse($html);
                $full_node_cache = ElasticFactory::createCache($node_cache);

                //We save in elastic db

                Client::index('nodes', 'node', $full_node_cache->getId(), json_encode($full_node_cache->getNode()));

                //Save relations
                foreach ($full_node_cache->getRelationTypes() as $relationType) {
                    Client::index('relations-type', 'relation-type', $relationType->getId(), $relationType->getJsonWithoutRelations());
                    ElasticRelation::bulkCreate("relation-in", $full_node_cache->getId(), $relationType->getId(), $relationType->getRelationIn());
                    ElasticRelation::bulkCreate("relation-out", $full_node_cache->getId(), $relationType->getId(), $relationType->getRelationOut());
                }

                $node_cache = clone $full_node_cache;
                $node_cache->trimRelations(30);

                dump("from jdm");
                dump($node_cache);
                //Save the trimmed cache into elastic
                $response = Client::index('nodes-cache', 'node-cache', $node_cache->getId(), json_encode($node_cache));
                dump($response);

            }
            catch(ErrorException $exception){
                throw  $exception;
            }
        }

        return $full_node_cache;
    }


    /**
     * @Route("/mot/{idNode}/relationType/{idRelationType}/{sort}", name="jdm_display_relationtype")
     */
    public function displayRelationType($idNode,$idRelationType,$sort){

        $response = $this->getAllRelations($idNode, $idRelationType, 1,$sort);
        $test = json_decode($response->getContent());

        $nodeResponse = $this->getNodeFromId($idNode);
        $node = json_decode($nodeResponse->getContent());

        return $this->render('GaradPlatformBundle:Jdm:relationType.html.twig',array(
            'relation' => $test,
            'node' => $node
        ));
    }


    /**
     * @Route("/mot/{idNode}/relationType/{idRelationType}/{idPage}/{sort}", name="jdm_get_relations")
     */
    public function getAllRelations($idNode,$idRelationType,$idPage,$sort){

        $request = $this->container->get('request');
        $sort = $request->query->get('sort');

        if(isset($sort)){
            switch (sort){
                case "lexico":
                    $sort = array('node.name:desc');
                    break;
                case "weight":
                    $sort = array('node.weight:desc');
                    break;
            }
        }

        $relations = [];

        //Get relationType from elastic
        $relationRequest =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'id' => $idRelationType ] ],
                    ]
                ],
            ],
        ];

        $relation = Client::search('relations-type','relation-type',$relationRequest);

        $relations['relationType'] = $relation->hits->hits[0]->_source;

        //Paginate over
        $size = 150;

        $from = $size * ($idPage - 1);

        $request =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'idNode' => $idNode ] ],
                        [ 'term' => [ 'idRelationType' => $idRelationType ] ],
                    ]
                ]
            ],
        ];

        $maxRelationIn = Client::count('relations','relation-in',$request);
        $maxRelationOut = Client::count('relations','relation-out',$request);

        $responseIn = Client::paginate('relations', 'relation-in',$from,$size,$request,$sort);
        foreach ($responseIn->hits->hits as $hits){
            //we get source
            $relations['in'][] = $hits->_source->node;
        }

        $responseIn = Client::paginate('relations', 'relation-out',$from,$size,$request,$sort);
        foreach ($responseIn->hits->hits as $hits){
            //we get source
            $relations['out'][] = $hits->_source->node;
        }

        $isMoreToLoadIn =   (($from+$size) < $maxRelationIn->count);
        $isMoreToLoadOut = (($from+$size) < $maxRelationOut->count);

        $relations['isMoreToLoadIn'] = $isMoreToLoadIn;
        $relations['isMoreToLoadOut'] = $isMoreToLoadOut;

        return new JsonResponse($relations);
    }
    /**
     * @Route("/yolo/{name}/{relationType}", name="yolo")
     */
    public function yolo($name,$relationType){

        //Check si la node est dans elastic

        $nodeExist =  [
            'query' => [
                'bool' => [
                    'must' => [
                        'multi_match' => [
                            'query' => $name,
                            'fields' => ['name.autocomplete','formattedName.autocomplete']
                        ]
                    ]
                ]
            ]
        ];

        $nodesFound = Client::search('nodes','node',$nodeExist);

        if(count($nodesFound->hits->hits) > 0){
            //If node already exist in elastic we try to get the relationType associated

            $relationExist =  [
                'query' => [
                    'bool' => [
                        'filter' => [
                            [ 'term' => [ 'code' => $relationType ] ],
                        ]
                    ]
                ],
            ];
            $relationFound = Client::search('relations-type','relation-type',$relationExist);
        }
        else {
            //node not exists so get word from jdm
        }

        return new JsonResponse($nodesFound);

        //Si elle est presente alors recuperer le relationType et /mot/idNode/relationType/idRelationType
        //Sinon
        //Get Word from jdm
        //Recuperer id du relationType
        //displayRelationType(idNode,idRelationType)

    }

    /**
     * @Route("/mot/{idNode}/relationType/{idRelationType}/in/{idPage}", name="jdm_get_relationsIn")
     */
    public function getRelationsIn($idNode,$idRelationType,$idPage){

        $relations = [];

        $size = 150;

        $from = $size * ($idPage - 1);

        /**
         * Get RelationType
         */
        $relationRequest =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'id' => $idRelationType ] ],
                    ]
                ]
            ]
        ];

        $relation = Client::search('relations-type','relation-type',$relationRequest);

        $relations['relationType'] = $relation->hits->hits[0]->_source;

        /**
         * Get RelationIn
         */
        $request =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'idNode' => $idNode ] ],
                        [ 'term' => [ 'idRelationType' => $idRelationType ] ],
                    ]
                ]
            ]
        ];

        $sort = array('node.weight:desc');

        $maxRelationIn = Client::count('relations','relation-in',$request);

        $responseIn = Client::paginate('relations', 'relation-in',$from,$size,$request,$sort);
        foreach ($responseIn->hits->hits as $hits){
            //we get source
            $relations['in'][] = $hits->_source->node;
        }

        $isMoreToLoad = (($from+$size) < $maxRelationIn->count);

        $relations['isMoreToLoad'] = $isMoreToLoad;

        return new JsonResponse($relations);
    }

    /**
     * @Route("/mot/{idNode}/relationType/{idRelationType}/out/{idPage}", name="jdm_get_relationsOut")
     */
    public function getRelationsOut($idNode,$idRelationType,$idPage){

        $relations = [];

        $size = 150;

        $from = $size * ($idPage - 1);

        /**
         * Get RelationType
         */
        $relationRequest =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'id' => $idRelationType ] ],
                    ]
                ]
            ]
        ];

        $relation = Client::search('relations-type','relation-type',$relationRequest);

        $relations['relationType'] = $relation->hits->hits[0]->_source;

        /**
         * Get RelationIn
         */
        $request =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'idNode' => $idNode ] ],
                        [ 'term' => [ 'idRelationType' => $idRelationType ] ],
                    ]
                ]
            ]
        ];

        $sort = array('node.weight:desc');

        $maxRelationIn = Client::count('relations','relation-out',$request);

        $responseIn = Client::paginate('relations', 'relation-out',$from,$size,$request,$sort);
        foreach ($responseIn->hits->hits as $hits){
            //we get source
            $relations['out'][] = $hits->_source->node;
        }

        $isMoreToLoad = (($from+$size) < $maxRelationIn->count);

        $relations['isMoreToLoad'] = $isMoreToLoad;

        return new JsonResponse($relations);

    }

    /**
     * @Route("/mot/{name}", name="jdm_get_nodes")
     */
    public function getNode($name){

        $request =  [
            'query' => [
                'bool' => [
                    'must' => [
                        'multi_match' => [
                            'query' => $name,
                            'fields' => ['name.autocomplete','formattedName.autocomplete']
                        ]
                    ]
                ]
            ]
        ];

        $hits = [];

        $nodesFound = Client::search('nodes','node',$request);

        if($nodesFound->hits->hits != null){
            //If we found nodes
            $hits = $nodesFound->hits->hits;
        }
        return new JsonResponse($hits);
    }

    /**
     * @Route("/mot/{idNode}/relationTypes", name="jdm_get_relationTypeForNode")
     */
    public function getRelationsTypeForNode($idNode){

        $request =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'id' => $idNode ] ],
                    ]
                ]
            ]
        ];

        //Get all IDS
        $fields = ['relationTypes.id','relationTypes.code','relationTypes.name'];

        $relationTypesId = Client::searchWithSource('nodes-cache','node-cache',$request,$fields);

        $hits = [];
        if(count($relationTypesId->hits->hits) > 0){
            foreach ($relationTypesId->hits->hits[0]->_source->relationTypes as $id){
                $hits[] = $id;
            }
        }

        return new JsonResponse($hits);

    }
    /**
     * @Route("/node/{idNode}", name="jdm_get_node_from_id")
     */
    public function getNodeFromId($idNode){

        $request =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'id' => $idNode ] ],
                    ]
                ]
            ]
        ];

        $node = Client::search('nodes','node',$request);

        return new JsonResponse($node->hits->hits[0]->_source);

    }

}