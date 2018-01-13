<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 13/01/2018
 * Time: 22:52
 */

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
use Garad\PlatformBundle\Controller\JdmController;


class ExistsController extends Controller
{

    /**
     * @Route("/exist/{word}", name="jdm_exist_word")
     */
    public function existWord($word){

        $result = [];
        $node_cache = null;

        $response = Client::search('nodes-cache','node-cache', [
            'query' => [
                'match' => [
                    'name' => $word
                ]
            ]
        ]);

        if(count($response->hits->hits) !=  0){

            dump("from elastic");
            $node_cache = $response->hits->hits[0]->_source;
            $result['exist'] = true;
            $result['idWord'] = $response->hits->hits[0]->_source->id;
            return new JsonResponse($result);
        }
        else {
            $html = FetchWord::fetch($word);
            try {
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

                //Save the trimmed cache into elastic
                Client::index('nodes-cache', 'node-cache', $node_cache->getId(), json_encode($node_cache));

            } catch (ErrorException $exception) {
                $result['exist'] = false;
                return new JsonResponse($result);
            }
        }
        $result['exist'] = true;
        $result['idWord'] = $node_cache->getId();

        return new JsonResponse($result);
    }


    /**
     * @Route("/exist/{word}/{relationType}", name="jdm_exist_relation_for_word")
     */
    public function existRelationTypeForWord($word,$relationType){

        $existWord = json_decode($this->existWord($word)->getContent());

        $result = [];
        if(isset($existWord->idWord)){
            $result['idWord'] = $existWord->idWord;
        }

        if($existWord->exist == true){

            //We now check for relationType
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

            dump($relationFound->hits->hits);
            if(count($relationFound->hits->hits) > 0){
                //The relation exist
                $result['existRelation'] = true;
                $result['idRelation'] = $relationFound->hits->hits[0]->_source->id;
                return new JsonResponse($result);
            }
            else {
                $result['existRelation'] = false;
                return new JsonResponse($result);
            }
        }
        else {
            $result['existRelation'] = false;
            return new JsonResponse($result);
        }

    }

    /**
     * @Route("/exist/{word}/{relationType}/{endWord}", name="jdm_exist_word_for_relationType")
     */
    public function existNodeForRelationType($word,$relationType,$endWord){

        $existWordForRelation = json_decode($this->existRelationTypeForWord($word,$relationType)->getContent());
        dump($existWordForRelation);

        if($existWordForRelation->existRelation == true){

            $request =  [
                'query' => [
                    'bool' => [
                        'filter' => [
                            [ 'term' => [ 'idNode' => $existWordForRelation->idWord ] ],
                            [ 'term' => [ 'idRelationType' => $existWordForRelation->idRelation ] ],
                        ],
                        'must' => [
                            'multi_match' => [
                                'query' => $endWord,
                                'fields' => ['node.formattedName','node.name.autocomplete']
                            ]
                        ]
                    ]
                ]
            ];
            //We check if word exist in relation out
            $existRelationOut = Client::search('relations','relation-out',$request);

            if(count($existRelationOut->hits->hits) > 0){
                return new JsonResponse(true);
            }
            else {
                //We check if word exist in relation in
                $existRelationIn = Client::search('relations','relation-in',$request);
                if(count($existRelationIn->hits->hits) > 0){
                    return new JsonResponse(true);
                }
                else return new JsonResponse(false);
            }
        }
        else return new JsonResponse(false);
    }


}