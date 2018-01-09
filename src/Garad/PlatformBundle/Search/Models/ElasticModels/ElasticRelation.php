<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 06/01/2018
 * Time: 21:40
 */

namespace Garad\PlatformBundle\Search\Models\ElasticModels;
use Garad\PlatformBundle\Elastic\Client;

class ElasticRelation
{

    public $id;
    public $idNode;
    public $idRelationType;
    public $weight;
    public $node;

    public static function bulkCreate($type, $idNode, $idRelationType, $relations){

        if(count($relations) > 0){

            $params = ['body' => []];

            foreach ($relations as $relation){

                $params['body'][] = [
                    'create' => [
                        '_index' => 'relations',
                        '_type' => $type,
                        '_id' => $relation->id,
                    ],
                ];

                $elasticRelation = new ElasticRelation();
                $elasticRelation->id = $relation->id;
                $elasticRelation->idNode = $idNode;
                $elasticRelation->idRelationType = $idRelationType;
                $elasticRelation->weight = $relation->weight;
                $elasticRelation->node = $relation->node;
                $params['body'][] = $elasticRelation;

            }

            Client::getClient()->bulk($params);
        }
    }

}