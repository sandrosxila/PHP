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

/* E:\Projects\PHP\Laravel\OctoberCMS/themes/apolonia/pages/about.htm */
class __TwigTemplate_7e540ab2e72d472cefd913705e3c32f19ad51061da131e8234dac41f253b984b extends \Twig\Template
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
        echo "<h1>about</h1>
";
        // line 2
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->componentFunction("resourcesLinks"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
    }

    public function getTemplateName()
    {
        return "E:\\Projects\\PHP\\Laravel\\OctoberCMS/themes/apolonia/pages/about.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h1>about</h1>
{% component 'resourcesLinks' %}", "E:\\Projects\\PHP\\Laravel\\OctoberCMS/themes/apolonia/pages/about.htm", "");
    }
}
