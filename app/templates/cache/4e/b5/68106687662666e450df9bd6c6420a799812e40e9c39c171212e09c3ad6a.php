<?php

/* layout/partials/nav.twig */
class __TwigTemplate_4eb568106687662666e450df9bd6c6420a799812e40e9c39c171212e09c3ad6a extends Twig_Template
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
        echo "<style>
    .ph_code {
        display: none !important;
    }
</style>

<div class=\"navbar-header\">
    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
    </button>
    <span class=\"navbar-brand\"><i class=\"fa fa-code\"></i> Phexecute</span>
</div>
<!-- /.navbar-header -->

";
        // line 18
        $this->loadTemplate("layout/partials/menu.twig", "layout/partials/nav.twig", 18)->display($context);
        // line 19
        echo "
<div class=\"code-buttons clearfix pull-right\">
    <button id=\"btnRun\" data-placement=\"bottom\" data-toggle=\"tooltip\" data-original-title=\"Run Code (Ctrl + Shift)\" type=\"button\" class=\"btn btn-success pull-left\">
        <i class=\"fa fa-play\"></i> Run
    </button>
    <button id=\"btnCheck\" data-placement=\"bottom\" data-toggle=\"tooltip\" data-original-title=\"Run PHP CodeSniffer (Ctrl + Q)\" type=\"button\" class=\"btn btn-warning pull-left\">
        <i class=\"fa fa-check-circle\"></i> Check
    </button>
    <button id=\"btnSave\" data-placement=\"bottom\" data-toggle=\"tooltip\" data-original-title=\"Save Snippet\" type=\"button\" class=\"btn btn-info pull-left\">
        <i class=\"fa fa-heart\"></i> Save
    </button>
</div>
";
    }

    public function getTemplateName()
    {
        return "layout/partials/nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 19,  38 => 18,  19 => 1,);
    }
}
