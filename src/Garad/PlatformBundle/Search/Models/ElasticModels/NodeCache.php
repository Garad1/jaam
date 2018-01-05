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


    public function setNode(Node $node){

        $this->setId($node->getId());
        $this->setName(str_replace("'", "", $node->getName()));
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
}