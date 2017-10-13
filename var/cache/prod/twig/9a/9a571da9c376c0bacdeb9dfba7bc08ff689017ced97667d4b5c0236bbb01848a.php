<?php

/* GaradPlatformBundle:Jdm:index.html.twig */
class __TwigTemplate_89e7e050e2dbc19e4f657fc3c0b1061fa0275b70aa7d982f5a6517f87eeba0f2 extends Twig_Template
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
        <?php
            if (isset(\$_GET[\"search\"]))
                echo(\$_GET[\"search\"]);
            else
                echo(\"Recherche du mot\") ?>
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
<form action=\"index.php\" method=\"get\">
    <input type=\"text\" name=\"search\" placeholder=\"Entrez le mot à rechercher\" id=\"search\"/>
    <input type=\"submit\" value=\"Rechercher\"/>
</form>





</body>
</html>";
    }

    public function getTemplateName()
    {
        return "GaradPlatformBundle:Jdm:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GaradPlatformBundle:Jdm:index.html.twig", "/Users/adamgarcia/Sites/Symfony/src/Garad/PlatformBundle/Resources/views/Jdm/index.html.twig");
    }
}
