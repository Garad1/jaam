<?php

/* GaradPlatformBundle:Jdm:result.html.twig */
class __TwigTemplate_db15e1e971edcb432f7868849f01665fc68d710971e0fb55d49c9bb14dc57a4d extends Twig_Template
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
        echo "

<!DOCTYPE html>
<html>
<head>
    <title>Résultats des recherches</title>
</head>
<body>
<h1>Jeu de mots</h1>
<h2>Extension réalisée part : A.Carmora, M.Pyz, J.Ramos, A.Garcia</h2>

<p>
    Résultat de la recherche.
</p>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "GaradPlatformBundle:Jdm:result.html.twig";
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
        return new Twig_Source("", "GaradPlatformBundle:Jdm:result.html.twig", "/Users/adamgarcia/Sites/Symfony/src/Garad/PlatformBundle/Resources/views/Jdm/result.html.twig");
    }
}
