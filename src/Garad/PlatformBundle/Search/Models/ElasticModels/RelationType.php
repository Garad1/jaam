<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 14/10/2017
 * Time: 22:50
 */

namespace Garad\PlatformBundle\Search\Models\ElasticModels;

class RelationType
{
    public $id;
    public $code;
    public $name;
    public $description;
    public $relations = ['in' => [], 'out' => []];

    public function __construct(\Garad\PlatformBundle\Search\Models\DumpModels\RelationType $relationType)
    {
        $this->setId($relationType->getId());
        $this->setDescription($relationType->getDescription());
        $this->setName($relationType->getName());
        $this->setCode($relationType->getCode());
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
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
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * @param array $relations
     */
    public function setRelations($relations)
    {
        $this->relations = $relations;
    }

    /**
     * @param Relation $relation
     */
    public function addRelationIn(Relation $relation)
    {
        $this->relations['in'][] = $relation;
    }

    /**
     * @param Relation $relation
     */
    public function addRelationOut(Relation $relation)
    {
        $this->relations['out'][] = $relation;
    }


    public function getRelationIn(){
        return $this->relations['in'];
    }

    public function getRelationOut(){
        return $this->relations['out'];
    }
}