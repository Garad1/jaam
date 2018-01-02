<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 14/10/2017
 * Time: 16:13
 */

namespace Garad\PlatformBundle\Search\Models\DumpModels;

class Relation
{
    private $id;
    private $from;
    private $to;
    private $type;
    private $weight;

    /**
     * Relation constructor.
     * @param $id
     * @param $from
     * @param $to
     * @param $type
     * @param $weight
     */
    public function __construct($id, $from, $to, $type, $weight)
    {
        $this->id = (int)$id;
        $this->from = (int)$from;
        $this->to = (int)$to;
        $this->type = (int)$type;
        $this->weight = (int)$weight;
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
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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

}