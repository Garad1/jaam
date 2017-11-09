<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 14/10/2017
 * Time: 22:50
 */

class RelationType
{
    public $id;
    public $code;
    public $name;
    public $description;
    private $relations = ['in' => [], 'out' => []];

}