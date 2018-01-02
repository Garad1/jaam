<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 02/01/2018
 * Time: 14:11
 */

namespace Garad\PlatformBundle\Search\Models\ElasticModels;

use Garad\PlatformBundle\Search\Models\DumpModels\Node;

class Relation
{

    private $id;
    private $weight;
    private $node;

    public function __construct($id, $weight, Node $node)
    {
        $this->id = $id;
        $this->weight = $weight;
        $this->node = $node;

    }


}