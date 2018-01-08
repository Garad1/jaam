<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 14/10/2017
 * Time: 16:12
 */

namespace Garad\PlatformBundle\Search\Models\DumpModels;

class RelationType
{
    public $id;
    public $name;
    public $code;
    public $description;

    /**
     * RelationType constructor.
     * @param $id
     * @param $name
     * @param $code
     * @param $description
     */
    public function __construct($id, $name, $code, $description)
    {
        $this->id = (int)$id;
        $this->name = str_replace("'", "", $name);
        $this->code = str_replace("'", "", $code);
        $this->description = $description;
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
}