<?php

/* layout/layout.twig */
class __TwigTemplate_d13765a7841e651c53f6d3c4cd3a7f9d324232606e4e3709a659331bcb595d9f extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">

";
        // line 4
        $this->loadTemplate("layout/partials/head.twig", "layout/layout.twig", 4)->display($context);
        // line 5
        echo "
<body>

<div id=\"wrapper\">

    <nav class=\"navbar navbar-default navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
        ";
        // line 11
        $this->loadTemplate("layout/partials/nav.twig", "layout/layout.twig", 11)->display($context);
        // line 12
        echo "    </nav>

    <div class=\"header_stips progress\" style=\"height: 2px;\">
        <div class=\"progress-bar progress-bar-info\" style=\"width: 25%;\"></div>
        <div class=\"progress-bar progress-bar-success\" style=\"width: 25%;\"></div>
        <div class=\"progress-bar progress-bar-warning\" style=\"width: 25%;\"></div>
        <div class=\"progress-bar progress-bar-danger\" style=\"width: 25%;\"></div>
    </div>

    <div id=\"page-wrapper\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-lg-12\" style=\"margin: 0; padding: 0;\">
                    <div class=\"content\">
                        ";
        // line 26
        $this->displayBlock("body", $context, $blocks);
        echo "
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- general modal start -->
<div id=\"modal-general\" class=\"modal fade\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span></button>

                <h3><i class=\"fa fa-info-circle\"></i> Info</h3>
            </div>
            <div class=\"modal-body text-center\" style=\"font-weight: bold; font-size: 14px;\"></div>
        </div>
    </div>
</div>
<!-- general modal end -->

<!-- general modal start -->
<div id=\"modal-save\" class=\"modal fade\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span></button>

                <h3><i class=\"fa fa-bookmark\"></i> Save Snippet</h3>
            </div>
            <div class=\"modal-body\">
                <label for=\"snippetName\">Snippet Name</label>
                <input autofocus type=\"text\" id=\"snippetName\" class=\"form-control\"/>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"><i class=\"fa fa-times\"></i> Close
                </button>
                <button type=\"button\" id=\"btnSaveModal\" class=\"btn btn-success\"><i class=\"fa fa-save\"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<!-- general modal end -->


";
        // line 75
        $this->loadTemplate("layout/partials/footer.twig", "layout/layout.twig", 75)->display($context);
        // line 76
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "layout/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 76,  104 => 75,  52 => 26,  36 => 12,  34 => 11,  26 => 5,  24 => 4,  19 => 1,);
    }
}
