<?php

/* GaradPlatformBundle:Default:index.html.twig */
class __TwigTemplate_1d99f2aa6127b688598acce2979828b5c5b5394504a5fda399a62cad70b34784 extends Twig_Template
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
        $__internal_ccc29446448efac6c760b9da1ba2c4f10a4424f4159ac19cb4201408db381a01 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ccc29446448efac6c760b9da1ba2c4f10a4424f4159ac19cb4201408db381a01->enter($__internal_ccc29446448efac6c760b9da1ba2c4f10a4424f4159ac19cb4201408db381a01_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Default:index.html.twig"));

        $__internal_94ef18c6b7554e2a19a3182ab2e872e1534d20b0fceb3b1efa81bdac53414fb0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_94ef18c6b7554e2a19a3182ab2e872e1534d20b0fceb3b1efa81bdac53414fb0->enter($__internal_94ef18c6b7554e2a19a3182ab2e872e1534d20b0fceb3b1efa81bdac53414fb0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "GaradPlatformBundle:Default:index.html.twig"));

        // line 1
        echo "<html>
    <body>
        Hello World!
    </body>
</html>";
        
        $__internal_ccc29446448efac6c760b9da1ba2c4f10a4424f4159ac19cb4201408db381a01->leave($__internal_ccc29446448efac6c760b9da1ba2c4f10a4424f4159ac19cb4201408db381a01_prof);

        
        $__internal_94ef18c6b7554e2a19a3182ab2e872e1534d20b0fceb3b1efa81bdac53414fb0->leave($__internal_94ef18c6b7554e2a19a3182ab2e872e1534d20b0fceb3b1efa81bdac53414fb0_prof);

    }

    public function getTemplateName()
    {
        return "GaradPlatformBundle:Default:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
    <body>
        Hello World!
    </body>
</html>", "GaradPlatformBundle:Default:index.html.twig", "/Users/adamgarcia/Sites/Symfony/src/Garad/PlatformBundle/Resources/views/Default/index.html.twig");
    }
}
