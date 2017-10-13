<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_b0972ea85d093d38911027a775a817705c22243169e9b5875e4b3eceefab67c5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_17c92576ce83531c93ddaee9f964940b00ebdcd6beed8c617fa8cfb389835871 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_17c92576ce83531c93ddaee9f964940b00ebdcd6beed8c617fa8cfb389835871->enter($__internal_17c92576ce83531c93ddaee9f964940b00ebdcd6beed8c617fa8cfb389835871_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_b0d91f8c07d955837a264688238926fcf8f37424717a9564f4734ef31a744b7c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b0d91f8c07d955837a264688238926fcf8f37424717a9564f4734ef31a744b7c->enter($__internal_b0d91f8c07d955837a264688238926fcf8f37424717a9564f4734ef31a744b7c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_17c92576ce83531c93ddaee9f964940b00ebdcd6beed8c617fa8cfb389835871->leave($__internal_17c92576ce83531c93ddaee9f964940b00ebdcd6beed8c617fa8cfb389835871_prof);

        
        $__internal_b0d91f8c07d955837a264688238926fcf8f37424717a9564f4734ef31a744b7c->leave($__internal_b0d91f8c07d955837a264688238926fcf8f37424717a9564f4734ef31a744b7c_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_1d65749c1078c09b2183485ee0332bb8700d08b8e3b78285d1f8e2d0bd02196a = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1d65749c1078c09b2183485ee0332bb8700d08b8e3b78285d1f8e2d0bd02196a->enter($__internal_1d65749c1078c09b2183485ee0332bb8700d08b8e3b78285d1f8e2d0bd02196a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_78821bab33bec87610260205ea98a871c3e687310db071549db020b16d2d4fa3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_78821bab33bec87610260205ea98a871c3e687310db071549db020b16d2d4fa3->enter($__internal_78821bab33bec87610260205ea98a871c3e687310db071549db020b16d2d4fa3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_78821bab33bec87610260205ea98a871c3e687310db071549db020b16d2d4fa3->leave($__internal_78821bab33bec87610260205ea98a871c3e687310db071549db020b16d2d4fa3_prof);

        
        $__internal_1d65749c1078c09b2183485ee0332bb8700d08b8e3b78285d1f8e2d0bd02196a->leave($__internal_1d65749c1078c09b2183485ee0332bb8700d08b8e3b78285d1f8e2d0bd02196a_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_b80028168a2a28de5df0adaa9e60c91b013a62ddead0223472f3c3a3ebe61f97 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_b80028168a2a28de5df0adaa9e60c91b013a62ddead0223472f3c3a3ebe61f97->enter($__internal_b80028168a2a28de5df0adaa9e60c91b013a62ddead0223472f3c3a3ebe61f97_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_6a15c7b2e206570e26faffc11dc7e4d6d44819bbf5b73cad9cfff7fcca9afcf9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6a15c7b2e206570e26faffc11dc7e4d6d44819bbf5b73cad9cfff7fcca9afcf9->enter($__internal_6a15c7b2e206570e26faffc11dc7e4d6d44819bbf5b73cad9cfff7fcca9afcf9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_6a15c7b2e206570e26faffc11dc7e4d6d44819bbf5b73cad9cfff7fcca9afcf9->leave($__internal_6a15c7b2e206570e26faffc11dc7e4d6d44819bbf5b73cad9cfff7fcca9afcf9_prof);

        
        $__internal_b80028168a2a28de5df0adaa9e60c91b013a62ddead0223472f3c3a3ebe61f97->leave($__internal_b80028168a2a28de5df0adaa9e60c91b013a62ddead0223472f3c3a3ebe61f97_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_9c090f192082457066bf56872fc94c276d4b8ef814a83a548551f77c33138ad0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9c090f192082457066bf56872fc94c276d4b8ef814a83a548551f77c33138ad0->enter($__internal_9c090f192082457066bf56872fc94c276d4b8ef814a83a548551f77c33138ad0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_45f450dd7035a3aed7400bc102511556ab88fc2e3db8ad70bdd7c22bfd2eb9d0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_45f450dd7035a3aed7400bc102511556ab88fc2e3db8ad70bdd7c22bfd2eb9d0->enter($__internal_45f450dd7035a3aed7400bc102511556ab88fc2e3db8ad70bdd7c22bfd2eb9d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_45f450dd7035a3aed7400bc102511556ab88fc2e3db8ad70bdd7c22bfd2eb9d0->leave($__internal_45f450dd7035a3aed7400bc102511556ab88fc2e3db8ad70bdd7c22bfd2eb9d0_prof);

        
        $__internal_9c090f192082457066bf56872fc94c276d4b8ef814a83a548551f77c33138ad0->leave($__internal_9c090f192082457066bf56872fc94c276d4b8ef814a83a548551f77c33138ad0_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
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

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/Users/adamgarcia/Sites/Symfony/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
