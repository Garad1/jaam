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
        $this->name = self::trim($name);
        $this->code = self::trim($code);
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