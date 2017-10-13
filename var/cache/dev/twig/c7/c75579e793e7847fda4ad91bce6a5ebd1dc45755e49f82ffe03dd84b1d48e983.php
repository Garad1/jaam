<?php

/* @WebProfiler/Profiler/open.html.twig */
class __TwigTemplate_00d473b1bc5ec8a1fce5cf7751332a771fa11b4b98ff1980c3827c2b5e3734a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/base.html.twig", "@WebProfiler/Profiler/open.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_bb89b57d2e83717869d44b1fe1679131c96966364dbc4ae94999ae72e63c4600 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bb89b57d2e83717869d44b1fe1679131c96966364dbc4ae94999ae72e63c4600->enter($__internal_bb89b57d2e83717869d44b1fe1679131c96966364dbc4ae94999ae72e63c4600_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/open.html.twig"));

        $__internal_84275d645101fd75225e1e0536459d83ac3ffdfd35ea0d6c44337ebd4b1b755e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_84275d645101fd75225e1e0536459d83ac3ffdfd35ea0d6c44337ebd4b1b755e->enter($__internal_84275d645101fd75225e1e0536459d83ac3ffdfd35ea0d6c44337ebd4b1b755e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/open.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bb89b57d2e83717869d44b1fe1679131c96966364dbc4ae94999ae72e63c4600->leave($__internal_bb89b57d2e83717869d44b1fe1679131c96966364dbc4ae94999ae72e63c4600_prof);

        
        $__internal_84275d645101fd75225e1e0536459d83ac3ffdfd35ea0d6c44337ebd4b1b755e->leave($__internal_84275d645101fd75225e1e0536459d83ac3ffdfd35ea0d6c44337ebd4b1b755e_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_417112ce4c37bb35ca37f9068ec21d6e264b1f22f31e08bf8b74bff1be975f3c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_417112ce4c37bb35ca37f9068ec21d6e264b1f22f31e08bf8b74bff1be975f3c->enter($__internal_417112ce4c37bb35ca37f9068ec21d6e264b1f22f31e08bf8b74bff1be975f3c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_169b7b668c42663b4d591b48449bb729dbb4ab6ab4bf1e434fe1259415076f8d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_169b7b668c42663b4d591b48449bb729dbb4ab6ab4bf1e434fe1259415076f8d->enter($__internal_169b7b668c42663b4d591b48449bb729dbb4ab6ab4bf1e434fe1259415076f8d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <style>
        ";
        // line 5
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/open.css.twig");
        echo "
    </style>
";
        
        $__internal_169b7b668c42663b4d591b48449bb729dbb4ab6ab4bf1e434fe1259415076f8d->leave($__internal_169b7b668c42663b4d591b48449bb729dbb4ab6ab4bf1e434fe1259415076f8d_prof);

        
        $__internal_417112ce4c37bb35ca37f9068ec21d6e264b1f22f31e08bf8b74bff1be975f3c->leave($__internal_417112ce4c37bb35ca37f9068ec21d6e264b1f22f31e08bf8b74bff1be975f3c_prof);

    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        $__internal_4b1670d367b5a12fce899581dfaeb6eef53f1ae26e6b17ff50c60c7328f8ef8a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4b1670d367b5a12fce899581dfaeb6eef53f1ae26e6b17ff50c60c7328f8ef8a->enter($__internal_4b1670d367b5a12fce899581dfaeb6eef53f1ae26e6b17ff50c60c7328f8ef8a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_9e96fbc38ff4c9a341d61c3f95fe9ba33c96e9f5a3adfc93e6ac764210c669db = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9e96fbc38ff4c9a341d61c3f95fe9ba33c96e9f5a3adfc93e6ac764210c669db->enter($__internal_9e96fbc38ff4c9a341d61c3f95fe9ba33c96e9f5a3adfc93e6ac764210c669db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 10
        echo "<div class=\"header\">
    <h1>";
        // line 11
        echo twig_escape_filter($this->env, ($context["file"] ?? $this->getContext($context, "file")), "html", null, true);
        echo " <small>line ";
        echo twig_escape_filter($this->env, ($context["line"] ?? $this->getContext($context, "line")), "html", null, true);
        echo "</small></h1>
    <a class=\"doc\" href=\"https://symfony.com/doc/";
        // line 12
        echo twig_escape_filter($this->env, twig_constant("Symfony\\Component\\HttpKernel\\Kernel::VERSION"), "html", null, true);
        echo "/reference/configuration/framework.html#ide\" rel=\"help\">Open in your IDE?</a>
</div>
<div class=\"source\">
    ";
        // line 15
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\CodeExtension')->fileExcerpt(($context["filename"] ?? $this->getContext($context, "filename")), ($context["line"] ?? $this->getContext($context, "line")),  -1);
        echo "
</div>
";
        
        $__internal_9e96fbc38ff4c9a341d61c3f95fe9ba33c96e9f5a3adfc93e6ac764210c669db->leave($__internal_9e96fbc38ff4c9a341d61c3f95fe9ba33c96e9f5a3adfc93e6ac764210c669db_prof);

        
        $__internal_4b1670d367b5a12fce899581dfaeb6eef53f1ae26e6b17ff50c60c7328f8ef8a->leave($__internal_4b1670d367b5a12fce899581dfaeb6eef53f1ae26e6b17ff50c60c7328f8ef8a_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/open.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 15,  84 => 12,  78 => 11,  75 => 10,  66 => 9,  53 => 5,  50 => 4,  41 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/base.html.twig' %}

{% block head %}
    <style>
        {{ include('@WebProfiler/Profiler/open.css.twig') }}
    </style>
{% endblock %}

{% block body %}
<div class=\"header\">
    <h1>{{ file }} <small>line {{ line }}</small></h1>
    <a class=\"doc\" href=\"https://symfony.com/doc/{{ constant('Symfony\\\\Component\\\\HttpKernel\\\\Kernel::VERSION') }}/reference/configuration/framework.html#ide\" rel=\"help\">Open in your IDE?</a>
</div>
<div class=\"source\">
    {{ filename|file_excerpt(line, -1) }}
</div>
{% endblock %}
", "@WebProfiler/Profiler/open.html.twig", "/Users/adamgarcia/Sites/Symfony/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/open.html.twig");
    }
}
