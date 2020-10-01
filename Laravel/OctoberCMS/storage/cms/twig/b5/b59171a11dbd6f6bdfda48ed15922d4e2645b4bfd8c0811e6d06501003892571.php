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

/* E:\Projects\PHP\Laravel\OctoberCMS/themes/apolonia/partials/site/footer.htm */
class __TwigTemplate_e214f53afca494d08ada0ca5a5e4fae48da2cfd50c2990a6e2f9ba503e5f3d7e extends \Twig\Template
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
        echo "<p class=\"text-center\">
    copyright &copy; 2020
</p>";
    }

    public function getTemplateName()
    {
        return "E:\\Projects\\PHP\\Laravel\\OctoberCMS/themes/apolonia/partials/site/footer.htm";
    }

    public function getDebugInfo()
    {
        return array (  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p class=\"text-center\">
    copyright &copy; 2020
</p>", "E:\\Projects\\PHP\\Laravel\\OctoberCMS/themes/apolonia/partials/site/footer.htm", "");
    }
}
