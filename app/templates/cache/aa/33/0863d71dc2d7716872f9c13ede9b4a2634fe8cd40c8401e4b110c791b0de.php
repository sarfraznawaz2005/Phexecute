<?php

/* layout/partials/menu.twig */
class __TwigTemplate_aa330863d71dc2d7716872f9c13ede9b4a2634fe8cd40c8401e4b110c791b0de extends Twig_Template
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
        echo "<div class=\"collapse navbar-collapse navbar-left\">
    <ul class=\"nav navbar-nav\">

        <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-cog\"></i> System
                <b class=\"caret\"></b></a>

            <ul class=\"dropdown-menu code_entry\">
                ";
        // line 9
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["system_entries"]) ? $context["system_entries"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 10
            echo "                    <li>
                        <a href=\"javascript:void(0);\">";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "name", array()), "html", null, true);
            echo "</a><span rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "autorun", array()), "html", null, true);
            echo "\" class=\"ph_code\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "code", array()), "html", null, true);
            echo "</span>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "            </ul>
        </li>

        <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-file-code-o\"></i> Packages
                <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu code_entry\">
                ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["package_entries"]) ? $context["package_entries"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 22
            echo "                    <li>
                        <a href=\"javascript:void(0);\">";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "name", array()), "html", null, true);
            echo "</a><span rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "autorun", array()), "html", null, true);
            echo "\" class=\"ph_code\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "code", array()), "html", null, true);
            echo "</span>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "            </ul>
        </li>

        <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-bookmark\"></i> Snippets
                <b class=\"caret\"></b></a>
            <ul class=\"dropdown-menu code_entry\">
                ";
        // line 33
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["snippet_entries"]) ? $context["snippet_entries"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 34
            echo "                    <li>
                        <a href=\"javascript:void(0);\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "name", array()), "html", null, true);
            echo "</a><span rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "autorun", array()), "html", null, true);
            echo "\" class=\"ph_code\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "code", array()), "html", null, true);
            echo "</span>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "            </ul>
        </li>

    </ul>
</div>";
    }

    public function getTemplateName()
    {
        return "layout/partials/menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 38,  94 => 35,  91 => 34,  87 => 33,  78 => 26,  65 => 23,  62 => 22,  58 => 21,  49 => 14,  36 => 11,  33 => 10,  29 => 9,  19 => 1,);
    }
}
