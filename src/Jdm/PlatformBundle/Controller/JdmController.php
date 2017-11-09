<?php


namespace Jdm\PlatformBundle\Controller;

use Jdm\PlatformBundle\Search\Parser\FetchWord;
use Jdm\PlatformBundle\Search\Parser\FileHandler;
use Jdm\PlatformBundle\Search\Parser\DocumentParser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class JdmController extends Controller
{


    public function redirectAction()
    {
        return $this->redirectToRoute('Jdm_jdm_home');
    }


    public function indexAction()
    {

        if(isset($_POST["search"]) && strcmp($_POST["search"],"")!== 0){
            return $this->redirectToRoute('Jdm_jdm_search', array('word' => $_POST["search"]));
        }
        $content = $this->get('templating')->render('JdmPlatformBundle:Jdm:index.html.twig');

        return new Response($content);
    }


    public function parse($code){
        $object = DocumentParser::parse($code);
        return $object;
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

        }

        $content = $this->get('templating')->render('JdmPlatformBundle:Jdm:result.html.twig', array('result' => $object, 'isNewWord' => true, 'word' => $word));
        return new Response($content);
    }
}