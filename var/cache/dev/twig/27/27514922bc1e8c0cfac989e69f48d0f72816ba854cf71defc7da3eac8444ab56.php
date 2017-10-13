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
        $__internal_bc2f25f248988a158bbed6600397b164d9bd1c9a405f7be0e6e15e0f093a6402 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bc2f25f248988a158bbed6600397b164d9bd1c9a405f7be0e6e15e0f093a6402->enter($__internal_bc2f25f248988a158bbed6600397b164d9bd1c9a405f7be0e6e15e0f093a6402_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Jdm:index.html.twig"));

        $__internal_70144c8c37b4ebbba2626e6b0d86fb0328a361cfd5de7393e7d0ec58877db69b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_70144c8c37b4ebbba2626e6b0d86fb0328a361cfd5de7393e7d0ec58877db69b->enter($__internal_70144c8c37b4ebbba2626e6b0d86fb0328a361cfd5de7393e7d0ec58877db69b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Jdm:index.html.twig"));

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
<form action=\"jdm\" method=\"post\">
    <input type=\"text\" name=\"search\" placeholder=\"Entrez le mot à rechercher\" id=\"search\"/>
    <input type=\"submit\" value=\"Rechercher\"/>
</form>





</body>
</html>";
        
        $__internal_bc2f25f248988a158bbed6600397b164d9bd1c9a405f7be0e6e15e0f093a6402->leave($__internal_bc2f25f248988a158bbed6600397b164d9bd1c9a405f7be0e6e15e0f093a6402_prof);

        
        $__internal_70144c8c37b4ebbba2626e6b0d86fb0328a361cfd5de7393e7d0ec58877db69b->leave($__internal_70144c8c37b4ebbba2626e6b0d86fb0328a361cfd5de7393e7d0ec58877db69b_prof);

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
<form action=\"jdm\" method=\"post\">
    <input type=\"text\" name=\"search\" placeholder=\"Entrez le mot à rechercher\" id=\"search\"/>
    <input type=\"submit\" value=\"Rechercher\"/>
</form>





</body>
</html>", "GaradPlatformBundle:Jdm:index.html.twig", "/Users/adamgarcia/Sites/Symfony/src/Garad/PlatformBundle/Resources/views/Jdm/index.html.twig");
    }
}
