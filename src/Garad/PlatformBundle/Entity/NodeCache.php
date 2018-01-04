<?php

namespace Garad\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NodeCache
 *
 * @ORM\Table(name="node_cache")
 * @ORM\Entity(repositoryClass="Garad\PlatformBundle\Repository\NodeCacheRepository")
 */
class NodeCache
{

    public function __construct(\Garad\PlatformBundle\Search\Models\ElasticModels\NodeCache $nodeCache)
    {
        $this->setName($nodeCache->getName());
        $this->setDescription($nodeCache->getDescription());
        $this->setNodeTypes($nodeCache->getNodeTypes());
        $this->setNodeType($nodeCache->getNodeType());
        $this->setRelationTypes($nodeCache->getRelationTypes());
        $this->setWeight($nodeCache->getWeight());
        $this->id = $nodeCache->getId();
        $this->setFormattedName($nodeCache->getFormattedName());
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="nodeType", type="integer")
     */
    private $nodeType;

    /**
     * @var int
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="formattedName", type="string", length=255)
     */
    private $formattedName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000000)
     */
    private $description;

    /**
     * @var array
     *
     * @ORM\Column(name="relationTypes", type="array")
     */
    private $relationTypes;

    /**
     * @var array
     *
     * @ORM\Column(name="nodeTypes", type="array")
     */
    private $nodeTypes;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return NodeCache
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nodeType
     *
     * @param integer $nodeType
     *
     * @return NodeCache
     */
    public function setNodeType($nodeType)
    {
        $this->nodeType = $nodeType;

        return $this;
    }

    /**
     * Get nodeType
     *
     * @return int
     */
    public function getNodeType()
    {
        return $this->nodeType;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return NodeCache
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set formattedName
     *
     * @param string $formattedName
     *
     * @return NodeCache
     */
    public function setFormattedName($formattedName)
    {
        $this->formattedName = $formattedName;

        return $this;
    }

    /**
     * Get formattedName
     *
     * @return string
     */
    public function getFormattedName()
    {
        return $this->formattedName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return NodeCache
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set relationTypes
     *
     * @param array $relationTypes
     *
     * @return NodeCache
     */
    public function setRelationTypes($relationTypes)
    {
        $this->relationTypes = $relationTypes;

        return $this;
    }

    /**
     * Get relationTypes
     *
     * @return array
     */
    public function getRelationTypes()
    {
        return $this->relationTypes;
    }

    /**
     * Set nodeTypes
     *
     * @param array $nodeTypes
     *
     * @return NodeCache
     */
    public function setNodeTypes($nodeTypes)
    {
        $this->nodeTypes = $nodeTypes;

        return $this;
    }

    /**
     * Get nodeTypes
     *
     * @return array
     */
    public function getNodeTypes()
    {
        return $this->nodeTypes;
    }
}

