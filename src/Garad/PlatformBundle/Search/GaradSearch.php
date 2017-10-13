<?php
// src/OC/PlatformBundle/Search/GaradSearch.php

namespace Garad\PlatformBundle\Search;

class GaradSearch
{
    private static $url = "http://www.jeuxdemots.org/rezo-dump.php?gotermsubmit=Chercher&gotermrel=";
    private static $directory = __DIR__ . DIRECTORY_SEPARATOR . "query";
    private $newWord;

    function __construct() {
        $this->newWord = true;
    }

    /*
     * Parcours le fichier query à la recherche des éléments
     * S'il y a l'élément en cache, on le récupère et on l'affiche
     * Sinon on le télécharge et le met en cache
     */
    function getElement($word){
        $query = utf8_decode(str_replace(' ', '+',ltrim($word)));

        #$query = utf8_decode($word);

        if (!file_exists(GaradSearch::$directory)) {
            mkdir(GaradSearch::$directory, 0777, true);
        }
        $files = scandir(GaradSearch::$directory);
        foreach ($files as $file){
            if(strcmp($file,$query) == 0){
                $this->newWord = false;
                $filename = GaradSearch::$directory . DIRECTORY_SEPARATOR . $query;
                if(filesize($filename) == 0){
                    return "";
                }
                $myFile = fopen($filename, "r");
                $result = fread($myFile, filesize($filename));
                fclose($myFile);
                return $result;
            }
        }

        $result = $this->extract($query);

        $this->writeContentInFile($query,$result->textContent);

        return $result;
    }

    function isNewWord(){
        return $this->newWord;
    }

    private function extract($query){
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_ENCODING, '');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $curl_handle, CURLOPT_URL, GaradSearch::$url . $query);
        $result = curl_exec( $curl_handle ); // Execute the request
        curl_close($curl_handle);
        dump($result);
        die;
        return $this->parse($result);
    }

    private function parse($html){
        #$dom = new \DOMDocument();
       # @$dom->loadHTML($html);
#
 #       foreach($dom->getElementsByTagName('code') as $code) {
  #          return $code->nodeValue;
   #     }

        $domDoc = new \DOMDocument('1.0', 'ISO-8859-1');
        @$domDoc->loadHTML($html);
        return $domDoc->getElementsByTagName('code')->item(0);
    }

    private function writeContentInFile($name, $content){

        $myFile = fopen(GaradSearch::$directory . DIRECTORY_SEPARATOR . $name, "w");
        fwrite($myFile, $content);
        fclose($myFile);



    }


}