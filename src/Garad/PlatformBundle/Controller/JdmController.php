<?php


namespace Garad\PlatformBundle\Controller;

use Garad\PlatformBundle\Elastic\Client;
use Garad\PlatformBundle\Search\Parser\FetchWord;
use Garad\PlatformBundle\Search\Parser\FileHandler;
use Garad\PlatformBundle\Search\Parser\DocumentParser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Garad\PlatformBundle\Search\Models\ElasticFactory;


class JdmController extends Controller
{


    public function redirectAction()
    {
        return $this->redirectToRoute('garad_jdm_home');
    }


    public function indexAction()
    {

        if(isset($_POST["search"]) && strcmp($_POST["search"],"")!== 0){
            return $this->redirectToRoute('garad_jdm_search', array('word' => $_POST["search"]));
        }
        $content = $this->get('templating')->render('GaradPlatformBundle:Jdm:index.html.twig');

        return new Response($content);
    }

    /*public function searchAction($word)
    {

        $extract = new GaradSearch();
        $result = $extract->getElement($word);
        $isNewWord = $extract->isNewWord();

        $content = $this->get('templating')->render('GaradPlatformBundle:Jdm:result.html.twig', array('result' => $result, 'isNewWord' => $isNewWord, 'word' => $word));
        return new Response($content);
    }*/


    public function displayAction($word){

        //If word exists in elastic database
        /**
         * Handle creation of elastic request
         */

        $response = Client::search('nodes-cache','node-cache', [
            'query' => [
                'match' => [
                    'name' => $word
                ]
            ]
        ]);

        dump($response->hits);
        //If word exists in elatic search we take source
        if(count($response->hits->hits) !=  0){

            dump("from elastic");
            $node_cache = $response->hits->hits[0]->_source;
            dump($node_cache->name);

        }
        else {
            //If not exist we create the cache from jdm
            $html = FetchWord::fetch($word);

            //Get code balise
            $domDoc = new \DOMDocument('1.0', 'ISO-8859-1');
            @$domDoc->loadHTML($html);
            $code = $domDoc->getElementsByTagName('code')->item(0);

            $object = $this->parse($code);

            $node_cache = ElasticFactory::createCache($object);

            dump("from jdm");
            Client::index('nodes-cache','node-cache', json_encode($node_cache));

        }
        /*$fileHandler = new FileHandler();
        if($fileHandler::exist($word)){
            echo "File already exists";
        }
        else {
            //If not in elastic cache index it
            dump($response);
        }*/

        $content = $this->get('templating')->render('GaradPlatformBundle:Jdm:empty.html.twig');
        return new Response($content);
    }

    public function parse($code){
        $object = DocumentParser::parse($code);
        return $object;
    }
}