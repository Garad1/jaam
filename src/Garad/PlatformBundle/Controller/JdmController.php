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

        //If word exists in elastic database
        /**
         * Handle creation of elastic request
         */

        $node_cache = null;

        $response = Client::search('nodes-cache','node-cache', [
            'query' => [
                'match' => [
                    'name' => $word
                ]
            ]
        ]);

        //dump($response->hits);
        //If word exists in elatic search we take source
        if(count($response->hits->hits) !=  0){

            dump("from elastic");
            $node_cache = $response->hits->hits[0]->_source;
            //dump($node_cache->name);

            dump($node_cache);

        }
        else {
            //If not exist we create the cache from jdm
            $html = FetchWord::fetch($word);
            try{
                $object = DocumentParser::parse($html);
            }
            catch(ErrorException $exception){
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

            if ($object != null) {

                $full_node_cache = ElasticFactory::createCache($object);
                //Save the node

                Client::index('nodes', 'node', $full_node_cache->getId(), json_encode($full_node_cache->getNode()));

                //Save relations
                foreach ($full_node_cache->getRelationTypes() as $relationType) {
                    Client::index('relations-type', 'relationTypes', $relationType->getId(), $relationType->getJsonWithoutRelations());
                    ElasticRelation::bulkCreate("relation-in", $full_node_cache->getId(), $relationType->getId(), $relationType->getRelationIn());
                    ElasticRelation::bulkCreate("relation-out", $full_node_cache->getId(), $relationType->getId(), $relationType->getRelationOut());
                }

                $node_cache = clone $full_node_cache;
                $node_cache->trimRelations(30);

                dump("from jdm");

                //Save the trimmed cache into elastic
                Client::index('nodes-cache', 'node-cache', $node_cache->getId(), json_encode($node_cache));

            }
        }

        return $this->render('GaradPlatformBundle:Jdm:result.html.twig',array(
            'cache' => $node_cache
        ));
    }

    /**
     * @Route("/mot/{idNode}/relationType/{idRelationType}", name="jdm_display_relationtype")
     */
    public function displayRelationType($idNode,$idRelationType){
        $response = $this->getAllRelations($idNode, $idRelationType, 1);
        $test = json_decode($response->getContent());

        dump($test);
        return $this->render('GaradPlatformBundle:Jdm:relationType.html.twig',array(
            'relation' => $test
        ));
    }


    /**
     * @Route("/mot/{idNode}/relationType/{idRelationType}/{idPage}", name="jdm_get_relations")
     */
    public function getAllRelations($idNode,$idRelationType,$idPage){

        $relations = [];

        //Get relationType from elastic
        $relationRequest =  [
            'query' => [
                'bool' => [
                    'filter' => [
                        [ 'term' => [ 'id' => $idRelationType ] ],
                    ]
                ]
            ]
        ];

        $relation = Client::search('relations-type','relationTypes',$relationRequest);

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
            ]
        ];

        $maxRelationIn = Client::count('relations','relation-in',$request);
        $maxRelationOut = Client::count('relations','relation-out',$request);

        $responseIn = Client::paginate('relations', 'relation-in',$from,$size,$request);
        foreach ($responseIn->hits->hits as $hits){
            //we get source
            $relations['in'][] = $hits->_source->node;
        }

        $responseIn = Client::paginate('relations', 'relation-out',$from,$size,$request);
        foreach ($responseIn->hits->hits as $hits){
            //we get source
            $relations['out'][] = $hits->_source->node;
        }

        $isMoreToLoad = (($from+$size) < $maxRelationOut->count) || (($from+$size) < $maxRelationIn->count);

        $relations['isMoreToLoad'] = $isMoreToLoad;

        return new JsonResponse($relations);
    }

    /**
     * @Route("/mot/{idNode}/relationIn/{idRelationType}/{idPage}", name="jdm_get_relationsIn")
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

        $relation = Client::search('relations-type','relationTypes',$relationRequest);

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

        $maxRelationIn = Client::count('relations','relation-in',$request);

        $responseIn = Client::paginate('relations', 'relation-in',$from,$size,$request);
        foreach ($responseIn->hits->hits as $hits){
            //we get source
            $relations['in'][] = $hits->_source->node;
        }

        $isMoreToLoad = (($from+$size) < $maxRelationIn->count);

        $relations['isMoreToLoad'] = $isMoreToLoad;

        return new JsonResponse($relations);
    }

    /**
     * @Route("/mot/{idNode}/relationOut/{idRelationType}/{idPage}", name="jdm_get_relationsOut")
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

        $relation = Client::search('relations-type','relationTypes',$relationRequest);

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

        $maxRelationIn = Client::count('relations','relation-out',$request);

        $responseIn = Client::paginate('relations', 'relation-out',$from,$size,$request);
        foreach ($responseIn->hits->hits as $hits){
            //we get source
            $relations['out'][] = $hits->_source->node;
        }

        $isMoreToLoad = (($from+$size) < $maxRelationIn->count);

        $relations['isMoreToLoad'] = $isMoreToLoad;

        return new JsonResponse($relations);

    }

    /**
     * @Route("/mot/{name}", name="jdm_get_relationsIn")
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

        //dump($nodesFound);
        if($nodesFound->hits->hits != null){
            //If we found nodes
            $hits = $nodesFound->hits->hits;
        }
        return new JsonResponse($hits);
    }
}