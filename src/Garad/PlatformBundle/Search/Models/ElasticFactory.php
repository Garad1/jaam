<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 09/11/2017
 * Time: 14:44
 */

namespace Garad\PlatformBundle\Search\Models;

use Garad\PlatformBundle\Search\Models\ElasticModels\NodeCache;
use Garad\PlatformBundle\Search\Models\ElasticModels\RelationType;
use Garad\PlatformBundle\Search\Models\ElasticModels\Relation;

class ElasticFactory
{

    public static function createCache ($object){

        $nodeCache = new NodeCache();

        $relationTypes = $object->relationTypes;
        $nodeTypes = $object->nodeTypes;
        $nodes = $object->nodes;
        $relations = $object->relations;
        $description = $object->description;

        foreach ($nodes as $entity) {
            $nodeCache->setNode($entity);
            break;
        }

        $nodeCache->setNodeTypes($nodeTypes);
        $nodeCache->setDescription($description);

        $allRelationsTypes = [];

        /** @var \Garad\PlatformBundle\Search\Models\DumpModels\Relation $relation */
        foreach($relations as $relation){

            $relationType = $relation->getType();

            $idFrom = $relation->getFrom();
            $idTo = $relation->getTo();

            //Out Relation Me -> Other
            if($nodeCache->getId() == $idFrom && $nodeCache->getId() != $idTo){

                if (array_key_exists($relationType, $allRelationsTypes)) {
                    if(isset($nodes[$idTo])){
                        $allRelationsTypes[$relationType]->addRelationOut(new Relation($relation->getId(),$relation->getWeight(),$nodes[$idTo]));
                    }
                }
                else {
                    $elasticType = new RelationType($relationTypes[$relationType]);
                    $elasticType->addRelationOut(new Relation($relation->getId(),$relation->getWeight(),$nodes[$idTo]));
                    $allRelationsTypes[$relationType] = $elasticType;
                }
            }

            //In Relation Other -> Me
            if($nodeCache->getId() != $idFrom && $nodeCache->getId() == $idTo){

                if (array_key_exists($relationType, $allRelationsTypes)) {
                    if(isset($nodes[$idFrom])) {
                        $allRelationsTypes[$relationType]->addRelationIn(new Relation($relation->getId(),$relation->getWeight(),$nodes[$idFrom]));
                    }
                }
                else {
                    $elasticType = new RelationType($relationTypes[$relationType]);
                    $elasticType->addRelationIn(new Relation($relation->getId(),$relation->getWeight(),$nodes[$idFrom]));
                    $allRelationsTypes[$relationType] = $elasticType;
                }
            }
            //In Out Relation Me -> Me
            if($nodeCache->getId() == $idFrom && $nodeCache->getId() == $idTo){
                if (array_key_exists($relationType, $allRelationsTypes)) {
                    $allRelationsTypes[$relationType]->addRelationIn(new Relation($relation->getId(),$relation->getWeight(),$nodes[$idFrom]));
                    $allRelationsTypes[$relationType]->addRelationOut(new Relation($relation->getId(),$relation->getWeight(),$nodes[$idFrom]));
                }
                else {
                    $elasticType = new RelationType($relationTypes[$relationType]);
                    $elasticType->addRelationIn(new Relation($relation->getId(),$relation->getWeight(),$nodes[$idFrom]));
                    $elasticType->addRelationOut(new Relation($relation->getId(),$relation->getWeight(),$nodes[$idFrom]));
                    $allRelationsTypes[$relationType] = $elasticType;
                }
            }
        }
        dump($allRelationsTypes);
        $nodeCache->setRelationTypes($allRelationsTypes);

        return $nodeCache;
    }
}