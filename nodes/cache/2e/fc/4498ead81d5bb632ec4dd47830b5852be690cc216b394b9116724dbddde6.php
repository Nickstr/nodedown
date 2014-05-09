<?php

/* image.html */
class __TwigTemplate_2efc4498ead81d5bb632ec4dd47830b5852be690cc216b394b9116724dbddde6 extends Twig_Template
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
        echo "<img alt=\"";
        echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : null), "html", null, true);
        echo "\" src=\"";
        echo twig_escape_filter($this->env, (isset($context["src"]) ? $context["src"] : null), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "\">
";
    }

    public function getTemplateName()
    {
        return "image.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
