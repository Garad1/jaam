<?php


namespace Garad\PlatformBundle\Controller;

use Garad\PlatformBundle\Search\Parser\FetchWord;
use Garad\PlatformBundle\Search\Parser\FileHandler;
use Garad\PlatformBundle\Search\Parser\DocumentParser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Garad\PlatformBundle\Search\Models\ElasticFactory;
use Garad\PlatformBundle\Entity\NodeCache;
use Elasticsearch\ClientBuilder;

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

    public function searchAction($word)
    {

        $extract = new GaradSearch();
        $result = $extract->getElement($word);
        $isNewWord = $extract->isNewWord();

        $content = $this->get('templating')->render('GaradPlatformBundle:Jdm:result.html.twig', array('result' => $result, 'isNewWord' => $isNewWord, 'word' => $word));
        return new Response($content);
    }


    public function displayAction($word){

        $fileHandler = new FileHandler();
        if($fileHandler::exist($word)){
            echo "File already exists";
        }
        else {
            $html = FetchWord::fetch($word);

            //Get code balise
            $domDoc = new \DOMDocument('1.0', 'ISO-8859-1');
            @$domDoc->loadHTML($html);
            $code = $domDoc->getElementsByTagName('code')->item(0);

            $object = $this->parse($code);

            dump($object);

            $node_cache = ElasticFactory::createCache($object);

            $nodeCache = new NodeCache($node_cache);

            dump(\GuzzleHttp\json_encode($node_cache));
            /*$em = $this->getDoctrine()->getManager();

            $em->persist($nodeCache);

            $em->flush();*/

            $params = [
                'index' => 'nodes-cache',
                'type' => 'node-cache',
                'body' => json_encode($node_cache)
            ];


            $client = ClientBuilder::create()->build();
            $response = $client->index($params);
        }

        $content = $this->get('templating')->render('GaradPlatformBundle:Jdm:empty.html.twig');
        return new Response($content);
    }

    public function parse($code){
        $object = DocumentParser::parse($code);
        return $object;
    }
}