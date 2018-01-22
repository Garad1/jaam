<?php
/**
 * Created by PhpStorm.
 * User: MELY
 * Date: 9/28/2017
 * Time: 2:36 PM
 */

namespace Garad\PlatformBundle\Search\Parser;

class FetchWord
{
    private static $url = "http://www.jeuxdemots.org/rezo-dump.php?gotermsubmit=Chercher&gotermrel=";


    static function fetch($word)
    {
        $word = urldecode($word);
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_ENCODING, '');
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt( $curl_handle, CURLOPT_URL, self::$url . utf8_decode(str_replace(' ', '+',ltrim($word))));
        $result = curl_exec( $curl_handle ); // Execute the request
        curl_close($curl_handle);
        return $result;
    }
}