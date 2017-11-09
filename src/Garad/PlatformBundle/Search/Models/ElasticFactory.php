<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 09/11/2017
 * Time: 14:44
 */

class ElasticFactory
{

    public function __construct ($object){
        $relationTypes = $object->relationTypes;
        $nodeTypes = $object->nodeTypes;
        $nodes = $object->nodes;
        $relation = $object->relations;
    }
}