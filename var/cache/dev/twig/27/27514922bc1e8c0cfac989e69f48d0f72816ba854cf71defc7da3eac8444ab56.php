<?php

/* GaradPlatformBundle:Jdm:index.html.twig */
class __TwigTemplate_742cd1ce71015ea92a5fb8ea1620665f107a81426a568409f36f1bd28516ef13 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e8facd3e6c3a38d69d5218cf11b11c6ce82b16f2f33b81186cb975b047758a3c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e8facd3e6c3a38d69d5218cf11b11c6ce82b16f2f33b81186cb975b047758a3c->enter($__internal_e8facd3e6c3a38d69d5218cf11b11c6ce82b16f2f33b81186cb975b047758a3c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Jdm:index.html.twig"));

        $__internal_11c426db83e0c12a76c555a2399d84526b55da9cc1ca0c26aa1a6964064bb423 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_11c426db83e0c12a76c555a2399d84526b55da9cc1ca0c26aa1a6964064bb423->enter($__internal_11c426db83e0c12a76c555a2399d84526b55da9cc1ca0c26aa1a6964064bb423_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Jdm:index.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>
        Recherche
    </title>
    <style>
        body{
            margin:50px 50px;
        }
        form{
            display:flex;
            justify-content: center;
        }
        form input[type=\"text\"]{
            width: 1000px;
            height: 27px;
            margin-right: 10px;
        }

        form input[type=\"submit\"]{
            background-color: rgb(100,200,100);
            color:white;
            font-weight: bold;
            border: none;
        }
    </style>
</head>
<body>
<!--action doit etre vide pour refaire appel a la meme page <form action=\"jdm\" method=\"post\">-->

<form action=\"\" method=\"post\">
    <input type=\"text\" name=\"search\" placeholder=\"Entrez le mot à rechercher\" id=\"search\"/>
    <input type=\"submit\" value=\"Rechercher\"/>
</form>





</body>
</html>";
        
        $__internal_e8facd3e6c3a38d69d5218cf11b11c6ce82b16f2f33b81186cb975b047758a3c->leave($__internal_e8facd3e6c3a38d69d5218cf11b11c6ce82b16f2f33b81186cb975b047758a3c_prof);

        
        $__internal_11c426db83e0c12a76c555a2399d84526b55da9cc1ca0c26aa1a6964064bb423->leave($__internal_11c426db83e0c12a76c555a2399d84526b55da9cc1ca0c26aa1a6964064bb423_prof);

    }

    public function getTemplateName()
    {
        return "GaradPlatformBundle:Jdm:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>
        Recherche
    </title>
    <style>
        body{
            margin:50px 50px;
        }
        form{
            display:flex;
            justify-content: center;
        }
        form input[type=\"text\"]{
            width: 1000px;
            height: 27px;
            margin-right: 10px;
        }

        form input[type=\"submit\"]{
            background-color: rgb(100,200,100);
            color:white;
            font-weight: bold;
            border: none;
        }
    </style>
</head>
<body>
<!--action doit etre vide pour refaire appel a la meme page <form action=\"jdm\" method=\"post\">-->

<form action=\"\" method=\"post\">
    <input type=\"text\" name=\"search\" placeholder=\"Entrez le mot à rechercher\" id=\"search\"/>
    <input type=\"submit\" value=\"Rechercher\"/>
</form>





</body>
</html>", "GaradPlatformBundle:Jdm:index.html.twig", "/Users/adamgarcia/Sites/jaam/src/Garad/PlatformBundle/Resources/views/Jdm/index.html.twig");
    }
}
