<?php

/* GaradPlatformBundle:Advert:exit.html.twig */
class __TwigTemplate_e91ac6d8dcb8dc559d4d50dbac08d6d87cbec12c9ba9b25e8bcdde90bb5ab745 extends Twig_Template
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
        $__internal_4fe0da51ff63e95caecb01806e2cc9d05b6b05bec2a99c31f065ca58e87cdfaf = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4fe0da51ff63e95caecb01806e2cc9d05b6b05bec2a99c31f065ca58e87cdfaf->enter($__internal_4fe0da51ff63e95caecb01806e2cc9d05b6b05bec2a99c31f065ca58e87cdfaf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Advert:exit.html.twig"));

        $__internal_285274ace4f45b939a272b3ef5fc66d4371785d63a275c0547333d88f4525c01 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_285274ace4f45b939a272b3ef5fc66d4371785d63a275c0547333d88f4525c01->enter($__internal_285274ace4f45b939a272b3ef5fc66d4371785d63a275c0547333d88f4525c01_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Advert:exit.html.twig"));

        // line 2
        echo "
<!DOCTYPE html>
<html>
<head>
    <title>Fin de la page qu'on a créé !</title>
</head>
<body>
<h1>Bye bye ";
        // line 9
        echo twig_escape_filter($this->env, ($context["nom"] ?? $this->getContext($context, "nom")), "html", null, true);
        echo "  !</h1>

<p>
    À la prochaine mec !
</p>
</body>
</html>
";
        
        $__internal_4fe0da51ff63e95caecb01806e2cc9d05b6b05bec2a99c31f065ca58e87cdfaf->leave($__internal_4fe0da51ff63e95caecb01806e2cc9d05b6b05bec2a99c31f065ca58e87cdfaf_prof);

        
        $__internal_285274ace4f45b939a272b3ef5fc66d4371785d63a275c0547333d88f4525c01->leave($__internal_285274ace4f45b939a272b3ef5fc66d4371785d63a275c0547333d88f4525c01_prof);

    }

    public function getTemplateName()
    {
        return "GaradPlatformBundle:Advert:exit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 9,  25 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# src/OC/PlatformBundle/Resources/views/Advert/index.html.twig #}

<!DOCTYPE html>
<html>
<head>
    <title>Fin de la page qu'on a créé !</title>
</head>
<body>
<h1>Bye bye {{ nom }}  !</h1>

<p>
    À la prochaine mec !
</p>
</body>
</html>
", "GaradPlatformBundle:Advert:exit.html.twig", "/Users/adamgarcia/Sites/Symfony/src/Garad/PlatformBundle/Resources/views/Advert/exit.html.twig");
    }
}
