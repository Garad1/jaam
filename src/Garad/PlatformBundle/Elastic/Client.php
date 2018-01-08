<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 05/01/2018
 * Time: 13:47
 */


namespace Garad\PlatformBundle\Elastic;

use Elasticsearch\ClientBuilder;


class Client
{

    private static $client;

    private static function getInstance(){

        if(self::$client == null){
            self::$client = ClientBuilder::create()
                    ->setSerializer("Garad\PlatformBundle\Elastic\Serializer")
                    ->build();
        }
        return self::$client;
    }

    public static function index($index,$type,$id,$body){

        $params = [
                'index' => $index,
                'type' => $type,
                'id' => $id,
                'body' => $body,
            ];

        return self::getInstance()->index($params);
    }


    public static function search($index,$type,$body){

        $params = [
            'index' => $index,
            'type' => $type,
            'body' => $body,
        ];

        return self::getInstance()->search($params);
    }

    public static function getClient(){
        return self::$client;
    }
}