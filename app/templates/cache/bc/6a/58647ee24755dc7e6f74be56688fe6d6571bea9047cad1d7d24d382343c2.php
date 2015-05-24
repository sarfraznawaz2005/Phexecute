<?php

/* home.twig */
class __TwigTemplate_bc6a58647ee24755dc7e6f74be56688fe6d6571bea9047cad1d7d24d382343c2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "home.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"progress code-wait\">
        <div class=\"active progress-bar progress-bar-striped progress-bar-success\" style=\"width: 100%;\"></div>
    </div>

    <div class=\"col-lg-12\" id=\"code\"></div>

    <div id=\"codeResult\" class=\"panel panel-green\">
        <div class=\"panel-heading\">
            <strong><i class=\"fa fa-flag\"></i> Result</strong> (<span id=\"timetaken\"></span>)
        </div>
        <div class=\"panel-body\"></div>
        <div class=\"panel-footer\">
            <button id=\"btnCSFix\" data-placement=\"right\" data-toggle=\"tooltip\" data-original-title=\"Fix CodeSniffer Suggested Problems\" type=\"button\" class=\"btn btn-success\">
                <i class=\"fa fa-arrow-right\"></i> Fix Code
            </button>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
