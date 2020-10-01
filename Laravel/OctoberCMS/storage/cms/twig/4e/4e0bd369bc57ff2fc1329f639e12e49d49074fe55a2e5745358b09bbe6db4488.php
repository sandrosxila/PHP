<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* E:\Projects\PHP\Laravel\OctoberCMS/themes/apolonia/partials/site/header.htm */
class __TwigTemplate_ee80d73d5c502ebd8aef9ffda41188b19ffbbb9a911c6c540b14b9ed06c0b76f extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"bs-component\">
    <nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">
        <a class=\"navbar-brand\" href=\"#\">";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "theme", [], "any", false, false, false, 3), "site_name", [], "any", false, false, false, 3), "html", null, true);
        echo "</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarColor01\" aria-controls=\"navbarColor01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarColor01\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item ";
        // line 10
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 10), "id", [], "any", false, false, false, 10) == "home")) {
            echo "active";
        }
        echo "\">
                    <a class=\"nav-link\" href=\"";
        // line 11
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("home");
        echo "\">Home</a>
                </li>
                <li class=\"nav-item ";
        // line 13
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 13), "id", [], "any", false, false, false, 13) == "contact")) {
            echo "active";
        }
        echo "\">
                    <a class=\"nav-link\" href=\"";
        // line 14
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("contact");
        echo "\">Contact</a>
                </li>
                <li class=\"nav-item ";
        // line 16
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 16), "id", [], "any", false, false, false, 16) == "blog")) {
            echo "active";
        }
        echo "\">
                    <a class=\"nav-link\" href=\"";
        // line 17
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("blog");
        echo "\">Blog</a>
                </li>
                <li class=\"nav-item ";
        // line 19
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 19), "id", [], "any", false, false, false, 19) == "about")) {
            echo "active";
        }
        echo "\">
                    <a class=\"nav-link\" href=\"";
        // line 20
        echo $this->extensions['Cms\Twig\Extension']->pageFilter("about");
        echo "\">About</a>
                </li>
            </ul>
        </div>
    </nav>
</div>";
    }

    public function getTemplateName()
    {
        return "E:\\Projects\\PHP\\Laravel\\OctoberCMS/themes/apolonia/partials/site/header.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 20,  82 => 19,  77 => 17,  71 => 16,  66 => 14,  60 => 13,  55 => 11,  49 => 10,  39 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"bs-component\">
    <nav class=\"navbar navbar-expand-lg navbar-dark bg-primary\">
        <a class=\"navbar-brand\" href=\"#\">{{this.theme.site_name}}</a>
        <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarColor01\" aria-controls=\"navbarColor01\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarColor01\">
            <ul class=\"navbar-nav mr-auto\">
                <li class=\"nav-item {%if this.page.id == 'home'%}active{%endif%}\">
                    <a class=\"nav-link\" href=\"{{'home' | page}}\">Home</a>
                </li>
                <li class=\"nav-item {%if this.page.id == 'contact'%}active{%endif%}\">
                    <a class=\"nav-link\" href=\"{{'contact' | page}}\">Contact</a>
                </li>
                <li class=\"nav-item {%if this.page.id == 'blog'%}active{%endif%}\">
                    <a class=\"nav-link\" href=\"{{'blog' | page}}\">Blog</a>
                </li>
                <li class=\"nav-item {%if this.page.id == 'about'%}active{%endif%}\">
                    <a class=\"nav-link\" href=\"{{'about' | page}}\">About</a>
                </li>
            </ul>
        </div>
    </nav>
</div>", "E:\\Projects\\PHP\\Laravel\\OctoberCMS/themes/apolonia/partials/site/header.htm", "");
    }
}
