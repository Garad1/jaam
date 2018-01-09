<?php

namespace Garad\PlatformBundle\Search\Models\ElasticModels;

use Garad\PlatformBundle\Search\Models\DumpModels\Node;

/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 14/10/2017
 * Time: 22:22
 */

class NodeCache
{

    public $id;
    public $name;
    public $nodeType;
    public $weight;
    public $formattedName;
    public $description;
    public $relationTypes = [];
    public $nodeTypes = [];
    public $timestamp;

    public function __construct()
    {
        $this->timestamp = (new \DateTime('now'))->format(\DateTime::ATOM);
    }


    public function setNode(Node $node){

        $this->setId($node->getId());
        $this->setName(self::trim($node->getName()));
        $this->setDescription($node->getDescription());
        $this->setFormattedName($node->getName());
        $this->setNodeType($node->getNodeType());
        $this->setWeight($node->getWeight());

    }
    
    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getFormattedName()
    {
        return $this->formattedName;
    }

    /**
     * @param mixed $formattedName
     */
    public function setFormattedName($formattedName)
    {
        $this->formattedName = $formattedName;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getRelationTypes()
    {
        return $this->relationTypes;
    }

    /**
     * @param array $relationTypes
     */
    public function setRelationTypes($relationTypes)
    {
        dump("set relations");
        //If relationsTypes contains raffinement semantique we push it in first pos
        if(isset($relationTypes[1])){
            $raffinement = $relationTypes[1];
            unset($relationTypes[1]);
            array_unshift($relationTypes,$raffinement);
        }
        $this->relationTypes = array_values($relationTypes);
    }

    /**
     * @return array
     */
    public function getNodeTypes()
    {
        return $this->nodeTypes;
    }

    /**
     * @param array $nodeTypes
     */
    public function setNodeTypes($nodeTypes)
    {
        $this->nodeTypes = $nodeTypes;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNodeType()
    {
        return $this->nodeType;
    }

    /**
     * @param mixed $nodeType
     */
    public function setNodeType($nodeType)
    {
        $this->nodeType = $nodeType;
    }

    public function trimRelations($size){
        if($this->getRelationTypes() != null){
            foreach ($this->getRelationTypes() as $rel){
                $rel->sortRelationsByWeight();
            }

            foreach($this->getRelationTypes() as $rel){
                $rel->trimRelations($size);
            }
        }
    }

    public function getRaffinement(){
        return $this->raffinement;
    }

    static function trim($word, $separator = '\'')
    {
        $len = strlen($word);
        if ($word[0] === $separator) {
            $iniidx = 1;
        } else {
            $iniidx = 0;
        }
        if ($word[$len - 1] === $separator) {
            $endidx = -1;
        } else {
            $endidx = $len - 1;
        }
        if ($iniidx == 1 || $endidx == -1) {
            return substr($word, $iniidx, $endidx);
        }
        return $word;
    }
}