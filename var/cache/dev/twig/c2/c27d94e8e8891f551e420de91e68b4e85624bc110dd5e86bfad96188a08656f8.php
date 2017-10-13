<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_627299fa42cfd848fd182d99a5255e474fc3368ddd730c0603fa8257bf337c23 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0acf67bb464a527e580425a2f81e5469f326dc18afb309e263abb03eec972e14 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0acf67bb464a527e580425a2f81e5469f326dc18afb309e263abb03eec972e14->enter($__internal_0acf67bb464a527e580425a2f81e5469f326dc18afb309e263abb03eec972e14_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        $__internal_bbb1cccb2d2db3e4ebdb31a1afab2b9a89b7b7a257781613feb6221c829e2e91 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bbb1cccb2d2db3e4ebdb31a1afab2b9a89b7b7a257781613feb6221c829e2e91->enter($__internal_bbb1cccb2d2db3e4ebdb31a1afab2b9a89b7b7a257781613feb6221c829e2e91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 8
        echo twig_include($this->env, $context, "@Twig/images/favicon.png.base64");
        echo "\">
        <style>";
        // line 9
        echo twig_include($this->env, $context, "@Twig/exception.css.twig");
        echo "</style>
        ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">";
        // line 15
        echo twig_include($this->env, $context, "@Twig/images/symfony-logo.svg");
        echo " Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">";
        // line 19
        echo twig_include($this->env, $context, "@Twig/images/icon-book.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">";
        // line 26
        echo twig_include($this->env, $context, "@Twig/images/icon-support.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 34
        echo "        ";
        echo twig_include($this->env, $context, "@Twig/base_js.html.twig");
        echo "
    </body>
</html>
";
        
        $__internal_0acf67bb464a527e580425a2f81e5469f326dc18afb309e263abb03eec972e14->leave($__internal_0acf67bb464a527e580425a2f81e5469f326dc18afb309e263abb03eec972e14_prof);

        
        $__internal_bbb1cccb2d2db3e4ebdb31a1afab2b9a89b7b7a257781613feb6221c829e2e91->leave($__internal_bbb1cccb2d2db3e4ebdb31a1afab2b9a89b7b7a257781613feb6221c829e2e91_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_c0ec557f367c4c311d5e559eeba1fc8eeb3e3128e7bb8459b97d8dab0751b85c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_c0ec557f367c4c311d5e559eeba1fc8eeb3e3128e7bb8459b97d8dab0751b85c->enter($__internal_c0ec557f367c4c311d5e559eeba1fc8eeb3e3128e7bb8459b97d8dab0751b85c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_52d2b0cc22ca37da7bc1415f94088c309c7384097fe60f97fc77895004a3346f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_52d2b0cc22ca37da7bc1415f94088c309c7384097fe60f97fc77895004a3346f->enter($__internal_52d2b0cc22ca37da7bc1415f94088c309c7384097fe60f97fc77895004a3346f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_52d2b0cc22ca37da7bc1415f94088c309c7384097fe60f97fc77895004a3346f->leave($__internal_52d2b0cc22ca37da7bc1415f94088c309c7384097fe60f97fc77895004a3346f_prof);

        
        $__internal_c0ec557f367c4c311d5e559eeba1fc8eeb3e3128e7bb8459b97d8dab0751b85c->leave($__internal_c0ec557f367c4c311d5e559eeba1fc8eeb3e3128e7bb8459b97d8dab0751b85c_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_1be0d35674c53fe6e02421792ddf2c5f25aa01f5eb71daf0fa39ba15f26b0c82 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1be0d35674c53fe6e02421792ddf2c5f25aa01f5eb71daf0fa39ba15f26b0c82->enter($__internal_1be0d35674c53fe6e02421792ddf2c5f25aa01f5eb71daf0fa39ba15f26b0c82_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_e870e65f446a275da2bef957eee6a2b70a853496e472c3eec0e71761e23aca18 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e870e65f446a275da2bef957eee6a2b70a853496e472c3eec0e71761e23aca18->enter($__internal_e870e65f446a275da2bef957eee6a2b70a853496e472c3eec0e71761e23aca18_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_e870e65f446a275da2bef957eee6a2b70a853496e472c3eec0e71761e23aca18->leave($__internal_e870e65f446a275da2bef957eee6a2b70a853496e472c3eec0e71761e23aca18_prof);

        
        $__internal_1be0d35674c53fe6e02421792ddf2c5f25aa01f5eb71daf0fa39ba15f26b0c82->leave($__internal_1be0d35674c53fe6e02421792ddf2c5f25aa01f5eb71daf0fa39ba15f26b0c82_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_8cf32ec8bae4df0b17df4ae943745a5954749e27308d43ad9abf5ae8b19e876d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_8cf32ec8bae4df0b17df4ae943745a5954749e27308d43ad9abf5ae8b19e876d->enter($__internal_8cf32ec8bae4df0b17df4ae943745a5954749e27308d43ad9abf5ae8b19e876d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_2237d56058b66f43d7681a16d54d79dc2a4f9dda737632ad7a274c7be8a73e31 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2237d56058b66f43d7681a16d54d79dc2a4f9dda737632ad7a274c7be8a73e31->enter($__internal_2237d56058b66f43d7681a16d54d79dc2a4f9dda737632ad7a274c7be8a73e31_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_2237d56058b66f43d7681a16d54d79dc2a4f9dda737632ad7a274c7be8a73e31->leave($__internal_2237d56058b66f43d7681a16d54d79dc2a4f9dda737632ad7a274c7be8a73e31_prof);

        
        $__internal_8cf32ec8bae4df0b17df4ae943745a5954749e27308d43ad9abf5ae8b19e876d->leave($__internal_8cf32ec8bae4df0b17df4ae943745a5954749e27308d43ad9abf5ae8b19e876d_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 33,  120 => 10,  103 => 7,  88 => 34,  86 => 33,  76 => 26,  66 => 19,  59 => 15,  53 => 11,  51 => 10,  47 => 9,  43 => 8,  39 => 7,  33 => 4,  28 => 1,);
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
<html>
    <head>
        <meta charset=\"{{ _charset }}\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>{% block title %}{% endblock %}</title>
        <link rel=\"icon\" type=\"image/png\" href=\"{{ include('@Twig/images/favicon.png.base64') }}\">
        <style>{{ include('@Twig/exception.css.twig') }}</style>
        {% block head %}{% endblock %}
    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">{{ include('@Twig/images/symfony-logo.svg') }} Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-book.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-support.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        {% block body %}{% endblock %}
        {{ include('@Twig/base_js.html.twig') }}
    </body>
</html>
", "@Twig/layout.html.twig", "/Users/adamgarcia/Sites/Symfony/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/layout.html.twig");
    }
}
