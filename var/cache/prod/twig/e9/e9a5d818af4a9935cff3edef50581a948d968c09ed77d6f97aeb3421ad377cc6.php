<?php

/* GaradPlatformBundle:Advert:exit.html.twig */
class __TwigTemplate_2a4b736a55d0829e969c0f9a78e63d9602763f5ebffaa046b4e68c90f671a283 extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["nom"]) ? $context["nom"] : null), "html", null, true);
        echo "  !</h1>

<p>
    À la prochaine mec !
</p>
</body>
</html>
";
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
        return array (  28 => 9,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GaradPlatformBundle:Advert:exit.html.twig", "/Users/adamgarcia/Sites/Symfony/src/Garad/PlatformBundle/Resources/views/Advert/exit.html.twig");
    }
}
