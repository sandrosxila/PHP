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

/* E:\Projects\PHP\Laravel\OctoberCMS/themes/apolonia/layouts/default.htm */
class __TwigTemplate_8f9473c9e7ccf5011737633524fca586ff37db3010056b3bae494c8bf9e4acbe extends \Twig\Template
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
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta content=\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 5), "meta_description", [], "any", false, false, false, 5), "html", null, true);
        echo "\">
    <title>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["this"] ?? null), "page", [], "any", false, false, false, 6), "title", [], "any", false, false, false, 6), "html", null, true);
        echo "</title>
    <link rel=\"stylesheet\" href=\"https://bootswatch.com/4/pulse/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo $this->extensions['Cms\Twig\Extension']->themeFilter("assets/css/theme.css");
        echo "\">
    ";
        // line 9
        echo $this->env->getExtension('Cms\Twig\Extension')->assetsFunction('css');
        echo $this->env->getExtension('Cms\Twig\Extension')->displayBlock('styles');
        // line 10
        echo "</head>
<body>
    <header>
        ";
        // line 13
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("site/header"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 14
        echo "    </header>
    <div class=\"container\">
        ";
        // line 16
        echo $this->env->getExtension('Cms\Twig\Extension')->pageFunction();
        // line 17
        echo "    </div>
    <footer>
        ";
        // line 19
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('Cms\Twig\Extension')->partialFunction("site/footer"        , $context['__cms_partial_params']        , true        );
        unset($context['__cms_partial_params']);
        // line 20
        echo "    </footer>

    <script src=\"";
        // line 22
        echo "assets/vendor/jquery.js | theme";
        echo "\"></script>
    <script src=\"";
        // line 23
        echo "assets/vendor/bootstrap.js | theme";
        echo "\"></script>
    <script src=\"";
        // line 24
        echo "assets/javascript/app.js | theme";
        echo "\"></script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "E:\\Projects\\PHP\\Laravel\\OctoberCMS/themes/apolonia/layouts/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 24,  88 => 23,  84 => 22,  80 => 20,  76 => 19,  72 => 17,  70 => 16,  66 => 14,  62 => 13,  57 => 10,  54 => 9,  50 => 8,  45 => 6,  41 => 5,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta content=\"{{this.page.meta_description}}\">
    <title>{{this.page.title}}</title>
    <link rel=\"stylesheet\" href=\"https://bootswatch.com/4/pulse/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"{{ 'assets/css/theme.css'  | theme }}\">
    {% styles %}
</head>
<body>
    <header>
        {% partial 'site/header' %}
    </header>
    <div class=\"container\">
        {% page %}
    </div>
    <footer>
        {% partial 'site/footer' %}
    </footer>

    <script src=\"{{'assets/vendor/jquery.js | theme'}}\"></script>
    <script src=\"{{'assets/vendor/bootstrap.js | theme'}}\"></script>
    <script src=\"{{'assets/javascript/app.js | theme'}}\"></script>
</body>
</html>", "E:\\Projects\\PHP\\Laravel\\OctoberCMS/themes/apolonia/layouts/default.htm", "");
    }
}
