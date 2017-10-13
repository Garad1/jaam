<?php

/* GaradPlatformBundle:Jdm:result.html.twig */
class __TwigTemplate_f8723efdcfba1e0a28045e9376f06236d5a831ddb05da6972c609ee0b7d736fb extends Twig_Template
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
        $__internal_f3cb6af7970de4432c82812ecf6ee4c68d2987193a554c6aba860a518be49a7f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f3cb6af7970de4432c82812ecf6ee4c68d2987193a554c6aba860a518be49a7f->enter($__internal_f3cb6af7970de4432c82812ecf6ee4c68d2987193a554c6aba860a518be49a7f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Jdm:result.html.twig"));

        $__internal_bc8b3171c4914295d7b2c451af0540724f37ac79bfe8ca1dde98db2e17de4417 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bc8b3171c4914295d7b2c451af0540724f37ac79bfe8ca1dde98db2e17de4417->enter($__internal_bc8b3171c4914295d7b2c451af0540724f37ac79bfe8ca1dde98db2e17de4417_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Jdm:result.html.twig"));

        // line 1
        echo "

<!DOCTYPE html>
<html>
<head>
    <title>Résultats du mot ";
        // line 6
        echo twig_escape_filter($this->env, ($context["word"] ?? $this->getContext($context, "word")), "html", null, true);
        echo "</title>
</head>
<body>
<h1>Jeu de mots</h1>
<h2>Extension réalisée part : A.Carmona, M.Pyz, J.Ramos, A.Garcia</h2>
<h3>
    ";
        // line 12
        if (($context["isNewWord"] ?? $this->getContext($context, "isNewWord"))) {
            // line 13
            echo "        Ce mot n'a pas était recherché, il a était mis en cache
    ";
        } else {
            // line 15
            echo "        Mot déjà en cache
    ";
        }
        // line 17
        echo "</h3>
<p>

    Résultat de la recherche.
    <pre>";
        // line 21
        echo twig_escape_filter($this->env, ($context["result"] ?? $this->getContext($context, "result")), "html", null, true);
        echo "</pre>

</p>
</body>
</html>
";
        
        $__internal_f3cb6af7970de4432c82812ecf6ee4c68d2987193a554c6aba860a518be49a7f->leave($__internal_f3cb6af7970de4432c82812ecf6ee4c68d2987193a554c6aba860a518be49a7f_prof);

        
        $__internal_bc8b3171c4914295d7b2c451af0540724f37ac79bfe8ca1dde98db2e17de4417->leave($__internal_bc8b3171c4914295d7b2c451af0540724f37ac79bfe8ca1dde98db2e17de4417_prof);

    }

    public function getTemplateName()
    {
        return "GaradPlatformBundle:Jdm:result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 21,  51 => 17,  47 => 15,  43 => 13,  41 => 12,  32 => 6,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("

<!DOCTYPE html>
<html>
<head>
    <title>Résultats du mot {{ word }}</title>
</head>
<body>
<h1>Jeu de mots</h1>
<h2>Extension réalisée part : A.Carmona, M.Pyz, J.Ramos, A.Garcia</h2>
<h3>
    {% if isNewWord %}
        Ce mot n'a pas était recherché, il a était mis en cache
    {% else %}
        Mot déjà en cache
    {% endif %}
</h3>
<p>

    Résultat de la recherche.
    <pre>{{ result }}</pre>

</p>
</body>
</html>
", "GaradPlatformBundle:Jdm:result.html.twig", "/Users/adamgarcia/Sites/Symfony/src/Garad/PlatformBundle/Resources/views/Jdm/result.html.twig");
    }
}
