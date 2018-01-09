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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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
            catch(\Exception $exception){
                $errorMessage = 'Mot ' . $word . ' : ' . $exception->getMessage();
                $this->get('session')->getFlashBag()->add('error', 'Le mot contient trop de relations pour être supporté par rezo-dump (le site où nous récupérons les données)');
                $this->get('logger')->error($errorMessage);
                return $this->render('GaradPlatformBundle:Jdm:index.html.twig');
            }

            if ($object != null) {

                $full_node_cache = ElasticFactory::createCache($object);

                //Save relations
                foreach ($full_node_cache->getRelationTypes() as $relationType) {
                    ElasticRelation::bulkCreate("relation-in", $full_node_cache->getId(), $relationType->getId(), $relationType->getRelationIn());
                    ElasticRelation::bulkCreate("relation-out", $full_node_cache->getId(), $relationType->getId(), $relationType->getRelationOut());
                }

                $node_cache = clone $full_node_cache;
                $node_cache->trimRelations(30);

                dump("from jdm");

                //Save the trimmed cache into elastic
                Client::index('nodes-cache', 'node-cache', $node_cache->getId(), json_encode($node_cache));

            } else {
                //Handle error here
            }
        }

        return $this->render('GaradPlatformBundle:Jdm:result.html.twig',array(
            'cache' => $node_cache
        ));
    }

    /**
     * @Route("/mot/{idNode}/relationType/{idRelationType}/{idPage}", name="jdm_get_relations")
     */
    public function getAllRelations($idNode,$idRelationType,$idPage){

        $wordsByPage = 150;

        $from = $wordsByPage * ($idPage - 1);
        $to = $wordsByPage * $idPage;

        $relations = [];

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

        dump($maxRelationIn);
        dump($maxRelationOut);

        if($from < $maxRelationIn->count){
            //load relationIn
            if($to < $maxRelationIn->count){
                $responseIn = Client::paginate('relations', 'relation-in',$from,$to,$request);
                foreach ($responseIn->hits->hits as $hits){
                    //we get source
                    $relations['in'][] = $hits->_source->node;
                }
            }
            else {
                //Load to maxRelationIn
                $responseIn = Client::paginate('relations', 'relation-in',$from,$maxRelationIn->count,$request);
                foreach ($responseIn->hits->hits as $hits){
                    //we get source
                    $relations['in'][] = $hits->_source->node;
                }
            }
        }
        /*else {
            $responseIn = Client::paginate('relations', 'relation-in', 0, $maxRelationIn->count, $request);
            foreach ($responseIn->hits->hits as $hits) {
                //we get source
                $relations['in'][] = $hits->_source->node;
            }
        }*/

        if ($from < $maxRelationOut->count) {
            //load RelationOut
            if ($to < $maxRelationOut->count) {
                $responseOut = Client::paginate('relations', 'relation-out', $from, $to, $request);
                foreach ($responseOut->hits->hits as $hits) {
                    //we get source
                    $relations['out'][] = $hits->_source->node;
                }
            }
            else {
                $responseOut = Client::paginate('relations', 'relation-out', $from, $maxRelationOut->count, $request);
                foreach ($responseOut->hits->hits as $hits) {
                    //we get source
                    $relations['out'][] = $hits->_source->node;
                }
            }
        }
        /*else {
            //load from 0
            $responseOut = Client::paginate('relations', 'relation-out', 1, $maxRelationOut->count, $request);
            foreach ($responseOut->hits->hits as $hits) {
                //we get source
                $relations['out'][] = $hits->_source->node;
            }
        }*/

        $isMoreToLoad = (($to < $maxRelationOut->count) || ($to < $maxRelationIn->count));

        $relations['isMoreToLoad'] = $isMoreToLoad;

        return new Response(json_encode($relations));
    }
}