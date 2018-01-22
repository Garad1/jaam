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
use Garad\PlatformBundle\Search\Exception\ErrorException;

class DocumentParser
{
    static $separator = "\n";

    static function parse($html)
    {
        $object = new \stdClass();

        $content = utf8_encode($html);

        $object->nodeTypes = [];
        $object->nodes = [];
        $object->relationTypes = [];
        $object->relations = [];

        $line = strtok($content, self::$separator);

        while ($line !== false && $line !== "<CODE>") {// fail safe check
            $line = strtok(self::$separator);
        }

        if($line === false){
            throw new ErrorException("Word not exists", ErrorException::ERROR);
        }
        // YES !! we are in code
        // getting the description and the error if has some
        $error = null;
        $description = "";
        $areWeInDefYet = false;
        $isDefDoneYet = false; // ??
        while ($line !== false && !$isDefDoneYet) {
            if (!$areWeInDefYet) {
                if ("<WARNING>" === substr($line, 0, 9)) {
                    $error = "TOOBIG_USE_DUMP";
                    break;
                } elseif ("<def>" === $line) {
                    $areWeInDefYet = true;
                }
                $line = strtok(self::$separator);
                continue;
            }
            if ($line === "</def>") {
                $isDefDoneYet = true;
            } else {
                $description .= trim(strip_tags($line))."\n";
            }
            $line = strtok(self::$separator);
        }

        if(isset($error)){
            throw new ErrorException($error,ErrorException::WARNING);
        }
        else {

            $object->description = $description;

            //Cf Fati chen
            while ($line !== false) {
                if ($line === null) {
                    $line = strtok(self::$separator);
                }
                $array = explode(';', $line);
                $type = $array[0];
                if ($type === "nt") {

                    $nodeType = new NodeType($array[1], self::trim($array[2]));
                    $object->nodeTypes[] = $nodeType;

                } elseif ($type === 'e') {

                    $node = new Node($array[1],$array[2],$array[3],$array[4],  isset($array[5]) ? $array[5] : null);
                    $object->nodes[$node->getId()] = $node;

                } elseif ($type === 'rt') {

                    $relationType = new RelationType($array[1],trim($array[2]),$array[3],$array[4]);
                    $object->relationTypes[$relationType->getId()] = $relationType;

                } elseif ($type === 'r') {

                    $relation = new Relation($array[1],trim($array[2]),$array[3],$array[4],$array[5]);
                    $object->relations[$array[1]] = $relation;
                }
                $line = strtok(self::$separator);
            }
            strtok('', '');
            dump($nodeType);
            return $object;
        }
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