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

/* themes/custom/ob/templates/block/block--block-content--view-type--sitewide-alert--full.html.twig */
class __TwigTemplate_a62bfedb599392b36e20372844db91d1 extends Template
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
        // line 9
        $context["alert_enabled"] = false;
        // line 10
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_enabled", [], "any", false, true, true, 10), "#items", [], "array", true, true, true, 10)) {
            // line 11
            yield "  ";
            $context["alert_enabled"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v0 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_enabled", [], "any", false, false, true, 11)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["#items"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_enabled", [], "any", false, false, true, 11), "#items", [], "array", false, false, true, 11)), 0, [], "any", false, false, true, 11), "value", [], "any", false, false, true, 11);
        } else {
            // line 13
            yield "  ";
            $context["_enabled_render"] = Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_enabled", [], "any", false, false, true, 13)));
            // line 14
            yield "  ";
            $context["alert_enabled"] = CoreExtension::inFilter(($context["_enabled_render"] ?? null), ["1", "true", "True"]);
        }
        // line 16
        yield "
";
        // line 17
        $context["alert_level"] = Twig\Extension\CoreExtension::default(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_level", [], "any", false, true, true, 17), "#items", [], "array", true, true, true, 17)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v1 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_level", [], "any", false, false, true, 17)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["#items"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_level", [], "any", false, false, true, 17), "#items", [], "array", false, false, true, 17)), 0, [], "any", false, false, true, 17), "value", [], "any", false, false, true, 17)) : (Twig\Extension\CoreExtension::trim($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_level", [], "any", false, false, true, 17))))), "information");
        // line 18
        $context["alert_heading"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_heading", [], "any", false, true, true, 18), "#items", [], "array", true, true, true, 18)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (($_v2 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_heading", [], "any", false, false, true, 18)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2["#items"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_heading", [], "any", false, false, true, 18), "#items", [], "array", false, false, true, 18)), 0, [], "any", false, false, true, 18), "value", [], "any", false, false, true, 18)) : (Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_heading", [], "any", false, false, true, 18))))));
        // line 19
        $context["alert_id"] = \Drupal\Component\Utility\Html::getClass(((($context["alert_level"] ?? null) . "-") . ($context["alert_heading"] ?? null)));
        // line 20
        yield "
";
        // line 21
        if ((($tmp = ($context["alert_enabled"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 22
            yield "  <aside";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["site-alert", ("site-alert--" . ($context["alert_level"] ?? null))], "method", false, false, true, 22), "setAttribute", ["data-site-alert-id", ($context["alert_id"] ?? null)], "method", false, false, true, 22), "html", null, true);
            yield " role=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["alert_level"] ?? null) == "emergency")) ? ("alert") : ("status")));
            yield "\" aria-live=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["alert_level"] ?? null) == "emergency")) ? ("assertive") : ("polite")));
            yield "\">
    ";
            // line 23
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
            yield "
    ";
            // line 24
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
            yield "
    <div class=\"container site-alert__inner\">
      <div class=\"site-alert__content\">
        <span class=\"site-alert__icon\" aria-hidden=\"true\"></span>
        <div class=\"site-alert__copy\">
          <div class=\"site-alert__title\">
            <div class=\"site-alert__level\">";
            // line 30
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_alert_level", [], "any", false, false, true, 30), "html", null, true);
            yield "</div>
            <strong class=\"site-alert__heading\">";
            // line 31
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["alert_heading"] ?? null), "html", null, true);
            yield "</strong>
          </div>
          <details class=\"site-alert__details\"";
            // line 33
            if ((($context["alert_level"] ?? null) == "emergency")) {
                yield " open";
            }
            yield ">
            <summary>
              <span class=\"site-alert__details-label site-alert__details-label--closed\">";
            // line 35
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View full notice"));
            yield "</span>
              <span class=\"site-alert__details-label site-alert__details-label--open\">";
            // line 36
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Hide full notice"));
            yield "</span>
              <span class=\"site-alert__details-icon\" aria-hidden=\"true\"></span>
            </summary>
            <div class=\"site-alert__message\">";
            // line 39
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 39), "html", null, true);
            yield "</div>
          </details>
        </div>
      </div>
      ";
            // line 43
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, true, true, 43), "#items", [], "array", true, true, true, 43) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, (($_v3 = CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 43)) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3["#items"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 43), "#items", [], "array", false, false, true, 43)), "isEmpty", [], "any", false, false, true, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
                // line 44
                yield "        <div class=\"site-alert__link\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 44), "html", null, true);
                yield "</div>
      ";
            }
            // line 46
            yield "      ";
            if ((($context["alert_level"] ?? null) != "emergency")) {
                // line 47
                yield "        <button type=\"button\" class=\"site-alert__close\" data-site-alert-dismiss aria-label=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Dismiss alert"));
                yield "\">
          <span aria-hidden=\"true\"></span>
        </button>
      ";
            }
            // line 51
            yield "    </div>
  </aside>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "attributes", "title_prefix", "title_suffix"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/block/block--block-content--view-type--sitewide-alert--full.html.twig";
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
        return array (  147 => 51,  139 => 47,  136 => 46,  130 => 44,  128 => 43,  121 => 39,  115 => 36,  111 => 35,  104 => 33,  99 => 31,  95 => 30,  86 => 24,  82 => 23,  73 => 22,  71 => 21,  68 => 20,  66 => 19,  64 => 18,  62 => 17,  59 => 16,  55 => 14,  52 => 13,  48 => 11,  46 => 10,  44 => 9,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/block/block--block-content--view-type--sitewide-alert--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/block/block--block-content--view-type--sitewide-alert--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 9, "if" => 10];
        static $filters = ["trim" => 13, "render" => 13, "default" => 17, "striptags" => 18, "clean_class" => 19, "escape" => 22, "t" => 35];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if"],
                [0 => "trim", 1 => "render", 2 => "default", 3 => "striptags", 4 => "clean_class", 5 => "escape", 6 => "t"],
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
