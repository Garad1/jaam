<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request;
        $requestMethod = $canonicalMethod = $context->getMethod();
        $scheme = $context->getScheme();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }


        // hello_the_world
        if ('/hello-world' === $pathinfo) {
            return array (  '_controller' => 'Garad\\PlatformBundle\\Controller\\AdvertController::indexAction',  '_route' => 'hello_the_world',);
        }

        // bye_the_world
        if ('/bye' === $pathinfo) {
            return array (  '_controller' => 'Garad\\PlatformBundle\\Controller\\AdvertController::exitAction',  '_route' => 'bye_the_world',);
        }

        if (0 === strpos($pathinfo, '/jdm')) {
            // garad_jdm_home
            if ('/jdm' === $pathinfo) {
                return array (  '_controller' => 'OCPlatformBundle:Jdm:index',  '_route' => 'garad_jdm_home',);
            }

            // garad_jdm_search
            if (preg_match('#^/jdm/(?P<word>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'garad_jdm_search')), array (  '_controller' => 'OCPlatformBundle:Jdm:search',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
