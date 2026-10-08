<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/custom/ob/templates/block/block--ob-government-identity.html.twig */
class __TwigTemplate_d35047f4e697b8834b20778ab0508022 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 7
        yield "<div";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["government-identity"], "method", false, false, true, 7), "html", null, true);
        yield ">
  ";
        // line 8
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 9
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "
  ";
        // line 10
        $context["has_logo"] = (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_logo", [], "any", false, true, true, 10), "#items", [], "array", true, true, true, 10) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, (($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_logo", [], "any", false, false, true, 10)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#items"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_logo", [], "any", false, false, true, 10), "#items", [], "array", false, false, true, 10)), "isEmpty", [], "any", false, false, true, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 11
        yield "  <span class=\"government-bar__identity\">
    <span class=\"government-bar__mark";
        // line 12
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = ($context["has_logo"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" government-bar__mark--image") : ("")));
        yield "\" aria-hidden=\"true\">
      ";
        // line 13
        if ((($tmp = ($context["has_logo"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "        ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_logo", [], "any", false, false, true, 14), "html", null, true);
            yield "
      ";
        }
        // line 16
        yield "    </span>
    ";
        // line 17
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_label", [], "any", false, false, true, 17), "html", null, true);
        yield "
  </span>
  ";
        // line 19
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, true, true, 19), "#items", [], "array", true, true, true, 19) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, (($_v1 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 19)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["#items"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 19), "#items", [], "array", false, false, true, 19)), "isEmpty", [], "any", false, false, true, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 20
            yield "    <span class=\"government-identity__link\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 20), "html", null, true);
            yield "</span>
  ";
        }
        // line 22
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "title_prefix", "title_suffix", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/block/block--ob-government-identity.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  90 => 22,  84 => 20,  82 => 19,  77 => 17,  74 => 16,  68 => 14,  66 => 13,  62 => 12,  59 => 11,  57 => 10,  53 => 9,  49 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/block/block--ob-government-identity.html.twig", "/var/www/html/web/themes/custom/ob/templates/block/block--ob-government-identity.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 10, "if" => 13];
        static $filters = ["escape" => 7];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if"],
                [0 => "escape"],
                [],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            } elseif ($e instanceof SecurityNotAllowedTestError && isset($tests[$e->getTestName()])) {
                $e->setTemplateLine($tests[$e->getTestName()]);
            }

            throw $e;
        }

    }
}
