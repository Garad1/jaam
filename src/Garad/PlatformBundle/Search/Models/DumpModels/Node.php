<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 14/10/2017
 * Time: 16:08
 */

namespace Garad\PlatformBundle\Search\Models\DumpModels;

class Node
{
    public $id;
    public $name;
    public $nodeType;
    public $weight;
    public $formattedName;
    public $description;

    /**
     * Node constructor.
     * @param $id
     * @param $name
     * @param $type
     * @param $weight
     * @param $formattedName
     */
    public function __construct($id, $name, $type, $weight, $formattedName)
    {
        $this->id = (int)$id;
        $this->name = self::trim($name);
        $this->nodeType = (int)$type;
        $this->weight = (int)$weight;
        $this->formattedName =  self::trim($formattedName);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
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
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
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