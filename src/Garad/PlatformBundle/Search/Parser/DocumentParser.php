<?php
/**
 * Created by PhpStorm.
 * User: adamgarcia
 * Date: 12/10/2017
 * Time: 11:20
 */

namespace Garad\PlatformBundle\Search\Parser;

use Garad\PlatformBundle\Search\Models\DumpModels\Node;
use Garad\PlatformBundle\Search\Models\DumpModels\NodeType;
use Garad\PlatformBundle\Search\Models\DumpModels\RelationType;
use Garad\PlatformBundle\Search\Models\DumpModels\Relation;

class DocumentParser
{
    static $separator = "\n";

    static function parse(\DOMElement $node)
    {
        $object = new \stdClass();

        $content = $node->textContent;
        $description = $node->getElementsByTagName("def")->item(0)->textContent;

        $object->description = $description;

        $object->nodeTypes = [];
        $object->nodes = [];
        $object->relationTypes = [];
        $object->relations = [];

        $line = strtok($content, self::$separator);

        while ($line !== false) {
            if ($line === null) {
                $line = strtok(self::$separator);
            }
            $array = explode(';', $line);
            $type = $array[0];
            if ($type === "nt") {

                $nodeType = new NodeType($array[1], $array[2]);
                $object->nodeTypes[] = $nodeType;

            } elseif ($type === 'e') {

                $node = new Node($array[1],$array[2],$array[3],$array[4],  isset($array[5]) ? $array[5] : null);
                $object->nodes[$node->getId()] = $node;

            } elseif ($type === 'rt') {

                $relationType = new RelationType($array[1],$array[2],$array[3],$array[4]);
                $object->relationTypes[$relationType->getId()] = $relationType;

            } elseif ($type === 'r') {

                $relation = new Relation($array[1],$array[2],$array[3],$array[4],$array[5]);
                $object->relations[$array[1]] = $relation;
            }
            $line = strtok(self::$separator);
        }
        strtok('', '');
        return $object;
    }
}