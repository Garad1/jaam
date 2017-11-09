<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 14/10/2017
 * Time: 14:32
 */

namespace Jaam\PlatformBundle\Search\Parser;
use Jaam\PlatformBundle\Search\Config;

class FileHandler
{
    public static $QUERY_PATH;

    public function __construct()
    {
        self::$QUERY_PATH = dirname(__DIR__) . DIRECTORY_SEPARATOR . "query";
    }

    public static function exist($word){

        $query = utf8_encode(str_replace(' ', '+',ltrim($word)));
        $files = scandir(FileHandler::$QUERY_PATH);

        foreach ($files as $file){
            if(strcmp($file,$query) == 0){
                return true;
            }
        }
        return false;
    }

    private static function writeContentInFile($name, $content){

        $myFile = fopen(FileHandler::$QUERY_PATH . $name, "w");
        fwrite($myFile, $content);
        fclose($myFile);
    }


}