<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_5de615a0208f2685a1eb05868ee35ffcca2bd97cf086fb0fe3f060e0bbbff1de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c4e5f49eef36d911ec85259bff24f7d84be0d82f320c6120e9051c8db1159b78 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c4e5f49eef36d911ec85259bff24f7d84be0d82f320c6120e9051c8db1159b78->enter($__internal_c4e5f49eef36d911ec85259bff24f7d84be0d82f320c6120e9051c8db1159b78_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_3eda3184190bd9c3633cce83dd8c389686fa1a054f29b7aaf57b09dad22863c2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3eda3184190bd9c3633cce83dd8c389686fa1a054f29b7aaf57b09dad22863c2->enter($__internal_3eda3184190bd9c3633cce83dd8c389686fa1a054f29b7aaf57b09dad22863c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c4e5f49eef36d911ec85259bff24f7d84be0d82f320c6120e9051c8db1159b78->leave($__internal_c4e5f49eef36d911ec85259bff24f7d84be0d82f320c6120e9051c8db1159b78_prof);

        
        $__internal_3eda3184190bd9c3633cce83dd8c389686fa1a054f29b7aaf57b09dad22863c2->leave($__internal_3eda3184190bd9c3633cce83dd8c389686fa1a054f29b7aaf57b09dad22863c2_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_67a14c5d3a5919e3ba5c82208cfb0d9f340dab1c7c8d4a5d6e9dea7ee0449ccf = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_67a14c5d3a5919e3ba5c82208cfb0d9f340dab1c7c8d4a5d6e9dea7ee0449ccf->enter($__internal_67a14c5d3a5919e3ba5c82208cfb0d9f340dab1c7c8d4a5d6e9dea7ee0449ccf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_784b81602d184d95b91461c5bda026e3865e9d267f31e2ef1f97b41f8a70be4f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_784b81602d184d95b91461c5bda026e3865e9d267f31e2ef1f97b41f8a70be4f->enter($__internal_784b81602d184d95b91461c5bda026e3865e9d267f31e2ef1f97b41f8a70be4f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_784b81602d184d95b91461c5bda026e3865e9d267f31e2ef1f97b41f8a70be4f->leave($__internal_784b81602d184d95b91461c5bda026e3865e9d267f31e2ef1f97b41f8a70be4f_prof);

        
        $__internal_67a14c5d3a5919e3ba5c82208cfb0d9f340dab1c7c8d4a5d6e9dea7ee0449ccf->leave($__internal_67a14c5d3a5919e3ba5c82208cfb0d9f340dab1c7c8d4a5d6e9dea7ee0449ccf_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_37b4f71154f556de8686e271b3220579983fb58f1dfd5a2adc3c7a3bea8e50f6 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_37b4f71154f556de8686e271b3220579983fb58f1dfd5a2adc3c7a3bea8e50f6->enter($__internal_37b4f71154f556de8686e271b3220579983fb58f1dfd5a2adc3c7a3bea8e50f6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_189e21fe1cd265192a8d6c16d63d497f1989792ecf3aace240207a525b20e35c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_189e21fe1cd265192a8d6c16d63d497f1989792ecf3aace240207a525b20e35c->enter($__internal_189e21fe1cd265192a8d6c16d63d497f1989792ecf3aace240207a525b20e35c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_189e21fe1cd265192a8d6c16d63d497f1989792ecf3aace240207a525b20e35c->leave($__internal_189e21fe1cd265192a8d6c16d63d497f1989792ecf3aace240207a525b20e35c_prof);

        
        $__internal_37b4f71154f556de8686e271b3220579983fb58f1dfd5a2adc3c7a3bea8e50f6->leave($__internal_37b4f71154f556de8686e271b3220579983fb58f1dfd5a2adc3c7a3bea8e50f6_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_8d1a2f1cd9f38ac7cf85b1d279a725d568cdc3c019459d5054d2d7e72ea8b8e3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8d1a2f1cd9f38ac7cf85b1d279a725d568cdc3c019459d5054d2d7e72ea8b8e3->enter($__internal_8d1a2f1cd9f38ac7cf85b1d279a725d568cdc3c019459d5054d2d7e72ea8b8e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_1bf97a27c2737efc4795c2093368a744e27e693dd409a442f920591f2ef3f208 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1bf97a27c2737efc4795c2093368a744e27e693dd409a442f920591f2ef3f208->enter($__internal_1bf97a27c2737efc4795c2093368a744e27e693dd409a442f920591f2ef3f208_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_1bf97a27c2737efc4795c2093368a744e27e693dd409a442f920591f2ef3f208->leave($__internal_1bf97a27c2737efc4795c2093368a744e27e693dd409a442f920591f2ef3f208_prof);

        
        $__internal_8d1a2f1cd9f38ac7cf85b1d279a725d568cdc3c019459d5054d2d7e72ea8b8e3->leave($__internal_8d1a2f1cd9f38ac7cf85b1d279a725d568cdc3c019459d5054d2d7e72ea8b8e3_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "/Users/adamgarcia/Sites/Symfony/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/exception.html.twig");
    }
}
