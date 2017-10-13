<?php

/* GaradPlatformBundle:Advert:index.html.twig */
class __TwigTemplate_6bcf4f6dae2d1a340c2d7805da6930cdf1c44490bbbc769c6f134a1e1bebe36f extends Twig_Template
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
        $__internal_3ad2678e78fbb17783c6502294d40d4c11b5e9bbf96f8dacb00865f30fa74d71 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_3ad2678e78fbb17783c6502294d40d4c11b5e9bbf96f8dacb00865f30fa74d71->enter($__internal_3ad2678e78fbb17783c6502294d40d4c11b5e9bbf96f8dacb00865f30fa74d71_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Advert:index.html.twig"));

        $__internal_278ddde364ea99bbb5dca0d7cf9284536e35c46299240324bd26f4ed7ce22119 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_278ddde364ea99bbb5dca0d7cf9284536e35c46299240324bd26f4ed7ce22119->enter($__internal_278ddde364ea99bbb5dca0d7cf9284536e35c46299240324bd26f4ed7ce22119_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Advert:index.html.twig"));

        // line 2
        echo "
<!DOCTYPE html>
<html>
<head>
    <title>Bienvenue sur ma première page avec OpenClassrooms !</title>
</head>
<body>
<h1>Hello ";
        // line 9
        echo twig_escape_filter($this->env, ($context["nom"] ?? $this->getContext($context, "nom")), "html", null, true);
        echo "  !</h1>

<p>
    Le Hello World est un grand classique en programmation.
    Il signifie énormément, car cela veut dire que vous avez
    réussi à exécuter le programme pour accomplir une tâche simple :
    afficher ce hello world !
</p>
</body>
</html>
";
        
        $__internal_3ad2678e78fbb17783c6502294d40d4c11b5e9bbf96f8dacb00865f30fa74d71->leave($__internal_3ad2678e78fbb17783c6502294d40d4c11b5e9bbf96f8dacb00865f30fa74d71_prof);

        
        $__internal_278ddde364ea99bbb5dca0d7cf9284536e35c46299240324bd26f4ed7ce22119->leave($__internal_278ddde364ea99bbb5dca0d7cf9284536e35c46299240324bd26f4ed7ce22119_prof);

    }

    public function getTemplateName()
    {
        return "GaradPlatformBundle:Advert:index.html.twig";
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
    <title>Bienvenue sur ma première page avec OpenClassrooms !</title>
</head>
<body>
<h1>Hello {{ nom }}  !</h1>

<p>
    Le Hello World est un grand classique en programmation.
    Il signifie énormément, car cela veut dire que vous avez
    réussi à exécuter le programme pour accomplir une tâche simple :
    afficher ce hello world !
</p>
</body>
</html>
", "GaradPlatformBundle:Advert:index.html.twig", "/Users/adamgarcia/Sites/Symfony/src/Garad/PlatformBundle/Resources/views/Advert/index.html.twig");
    }
}
