<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_cb1a7cc564830439bd3f0d72399e2624cdf3cd1facaba6c48ae6f93c34d0943b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e3a4b39d6357849c3a05f420590eab875704beaa4026bd8731b68d79d1edcd09 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e3a4b39d6357849c3a05f420590eab875704beaa4026bd8731b68d79d1edcd09->enter($__internal_e3a4b39d6357849c3a05f420590eab875704beaa4026bd8731b68d79d1edcd09_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $__internal_dfa104f61af611a4e415a784164374a659708831ec41529b1203b2f80bb31337 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_dfa104f61af611a4e415a784164374a659708831ec41529b1203b2f80bb31337->enter($__internal_dfa104f61af611a4e415a784164374a659708831ec41529b1203b2f80bb31337_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e3a4b39d6357849c3a05f420590eab875704beaa4026bd8731b68d79d1edcd09->leave($__internal_e3a4b39d6357849c3a05f420590eab875704beaa4026bd8731b68d79d1edcd09_prof);

        
        $__internal_dfa104f61af611a4e415a784164374a659708831ec41529b1203b2f80bb31337->leave($__internal_dfa104f61af611a4e415a784164374a659708831ec41529b1203b2f80bb31337_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_d0c9a58459719107d1a933167faa3c33411c805d1516f32bcfced37dfbc10d5c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_d0c9a58459719107d1a933167faa3c33411c805d1516f32bcfced37dfbc10d5c->enter($__internal_d0c9a58459719107d1a933167faa3c33411c805d1516f32bcfced37dfbc10d5c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_bf5e746f39d2c2465153b0aba7c3fea4ac4fe13109fb8f46faa97100583350db = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bf5e746f39d2c2465153b0aba7c3fea4ac4fe13109fb8f46faa97100583350db->enter($__internal_bf5e746f39d2c2465153b0aba7c3fea4ac4fe13109fb8f46faa97100583350db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
";
        
        $__internal_bf5e746f39d2c2465153b0aba7c3fea4ac4fe13109fb8f46faa97100583350db->leave($__internal_bf5e746f39d2c2465153b0aba7c3fea4ac4fe13109fb8f46faa97100583350db_prof);

        
        $__internal_d0c9a58459719107d1a933167faa3c33411c805d1516f32bcfced37dfbc10d5c->leave($__internal_d0c9a58459719107d1a933167faa3c33411c805d1516f32bcfced37dfbc10d5c_prof);

    }

    // line 136
    public function block_title($context, array $blocks = array())
    {
        $__internal_db45054868995b29d692f497008a09e7a38f1b069c6d8a419c81a7ae45d94091 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_db45054868995b29d692f497008a09e7a38f1b069c6d8a419c81a7ae45d94091->enter($__internal_db45054868995b29d692f497008a09e7a38f1b069c6d8a419c81a7ae45d94091_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_abcf321fe20be64ae8f84b57d8d2283c8f9d489da341c4415c3409e1b3e9686c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_abcf321fe20be64ae8f84b57d8d2283c8f9d489da341c4415c3409e1b3e9686c->enter($__internal_abcf321fe20be64ae8f84b57d8d2283c8f9d489da341c4415c3409e1b3e9686c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 137
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["exception"] ?? $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, ($context["status_code"] ?? $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, ($context["status_text"] ?? $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_abcf321fe20be64ae8f84b57d8d2283c8f9d489da341c4415c3409e1b3e9686c->leave($__internal_abcf321fe20be64ae8f84b57d8d2283c8f9d489da341c4415c3409e1b3e9686c_prof);

        
        $__internal_db45054868995b29d692f497008a09e7a38f1b069c6d8a419c81a7ae45d94091->leave($__internal_db45054868995b29d692f497008a09e7a38f1b069c6d8a419c81a7ae45d94091_prof);

    }

    // line 140
    public function block_body($context, array $blocks = array())
    {
        $__internal_fc5eed7de2370f838ad131765d15c3cee1b28d63718af344df85fdb37ef386cb = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fc5eed7de2370f838ad131765d15c3cee1b28d63718af344df85fdb37ef386cb->enter($__internal_fc5eed7de2370f838ad131765d15c3cee1b28d63718af344df85fdb37ef386cb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_9cf0256bbb429a20d766abcdfea83d160b450a8d6a409c1e1324635fe858001f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9cf0256bbb429a20d766abcdfea83d160b450a8d6a409c1e1324635fe858001f->enter($__internal_9cf0256bbb429a20d766abcdfea83d160b450a8d6a409c1e1324635fe858001f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 141
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 141)->display($context);
        
        $__internal_9cf0256bbb429a20d766abcdfea83d160b450a8d6a409c1e1324635fe858001f->leave($__internal_9cf0256bbb429a20d766abcdfea83d160b450a8d6a409c1e1324635fe858001f_prof);

        
        $__internal_fc5eed7de2370f838ad131765d15c3cee1b28d63718af344df85fdb37ef386cb->leave($__internal_fc5eed7de2370f838ad131765d15c3cee1b28d63718af344df85fdb37ef386cb_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 141,  217 => 140,  200 => 137,  191 => 136,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <style>
        .sf-reset .traces {
            padding-bottom: 14px;
        }
        .sf-reset .traces li {
            font-size: 12px;
            color: #868686;
            padding: 5px 4px;
            list-style-type: decimal;
            margin-left: 20px;
        }
        .sf-reset #logs .traces li.error {
            font-style: normal;
            color: #AA3333;
            background: #f9ecec;
        }
        .sf-reset #logs .traces li.warning {
            font-style: normal;
            background: #ffcc00;
        }
        /* fix for Opera not liking empty <li> */
        .sf-reset .traces li:after {
            content: \"\\00A0\";
        }
        .sf-reset .trace {
            border: 1px solid #D3D3D3;
            padding: 10px;
            overflow: auto;
            margin: 10px 0 20px;
        }
        .sf-reset .block-exception {
            -moz-border-radius: 16px;
            -webkit-border-radius: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            border: 1px solid #dfdfdf;
            padding: 30px 28px;
            word-wrap: break-word;
            overflow: hidden;
        }
        .sf-reset .block-exception div {
            color: #313131;
            font-size: 10px;
        }
        .sf-reset .block-exception-detected .illustration-exception,
        .sf-reset .block-exception-detected .text-exception {
            float: left;
        }
        .sf-reset .block-exception-detected .illustration-exception {
            width: 152px;
        }
        .sf-reset .block-exception-detected .text-exception {
            width: 670px;
            padding: 30px 44px 24px 46px;
            position: relative;
        }
        .sf-reset .text-exception .open-quote,
        .sf-reset .text-exception .close-quote {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            color: #C9C9C9;
            font-size: 8em;
        }
        .sf-reset .open-quote {
            top: 0;
            left: 0;
        }
        .sf-reset .close-quote {
            bottom: -0.5em;
            right: 50px;
        }
        .sf-reset .block-exception p {
            font-family: Arial, Helvetica, sans-serif;
        }
        .sf-reset .block-exception p a,
        .sf-reset .block-exception p a:hover {
            color: #565656;
        }
        .sf-reset .logs h2 {
            float: left;
            width: 654px;
        }
        .sf-reset .error-count, .sf-reset .support {
            float: right;
            width: 170px;
            text-align: right;
        }
        .sf-reset .error-count span {
             display: inline-block;
             background-color: #aacd4e;
             -moz-border-radius: 6px;
             -webkit-border-radius: 6px;
             border-radius: 6px;
             padding: 4px;
             color: white;
             margin-right: 2px;
             font-size: 11px;
             font-weight: bold;
        }

        .sf-reset .support a {
            display: inline-block;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
            border-radius: 6px;
            padding: 4px;
            color: #000000;
            margin-right: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .sf-reset .toggle {
            vertical-align: middle;
        }
        .sf-reset .linked ul,
        .sf-reset .linked li {
            display: inline;
        }
        .sf-reset #output-content {
            color: #000;
            font-size: 12px;
        }
        .sf-reset #traces-text pre {
            white-space: pre;
            font-size: 12px;
            font-family: monospace;
        }
    </style>
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "@Twig/Exception/exception_full.html.twig", "/Users/adamgarcia/Sites/Symfony/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}
