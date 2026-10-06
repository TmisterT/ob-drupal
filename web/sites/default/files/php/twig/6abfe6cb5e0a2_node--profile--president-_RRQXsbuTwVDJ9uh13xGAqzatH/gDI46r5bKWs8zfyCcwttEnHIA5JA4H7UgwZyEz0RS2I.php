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

/* themes/custom/ob/templates/content/node--profile--president-history.html.twig */
class __TwigTemplate_4ec62948f046a1d11e24d769210bbe21 extends Template
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
        $context["current"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_is_current", [], "any", false, false, true, 7), "value", [], "any", false, false, true, 7);
        // line 8
        $context["presidential_title"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_president_label"], "method", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_president_label", [], "any", false, false, true, 8), "value", [], "any", false, false, true, 8)) : (null));
        // line 9
        $context["start_year"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_term_start_year", [], "any", false, false, true, 9), "value", [], "any", false, false, true, 9);
        // line 10
        $context["end_year"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_term_end_year", [], "any", false, false, true, 10), "value", [], "any", false, false, true, 10);
        // line 11
        yield "<article";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["president-record", (((($tmp = ($context["current"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("president-record--current") : (""))], "method", false, false, true, 11), "html", null, true);
        yield ">
  <div class=\"president-record__portrait\">
    ";
        // line 13
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_profile_image", [], "any", false, false, true, 13), "isEmpty", [], "any", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "      <a href=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["url"] ?? null), "html", null, true);
            yield "\" tabindex=\"-1\" aria-hidden=\"true\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_profile_image", [], "any", false, false, true, 14), "html", null, true);
            yield "</a>
    ";
        } else {
            // line 16
            yield "      <div class=\"president-record__portrait-placeholder\" aria-hidden=\"true\"></div>
    ";
        }
        // line 18
        yield "  </div>

  <div class=\"president-record__content\">
    <div class=\"president-record__context\">
      ";
        // line 22
        if ((($tmp = ($context["current"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "        <span class=\"president-record__current\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Current President"));
            yield "</span>
      ";
        }
        // line 25
        yield "      ";
        if ((($tmp = ($context["presidential_title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "        <span>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["presidential_title"] ?? null), "html", null, true);
            yield "</span>
      ";
        } elseif ( !(($tmp =         // line 27
($context["current"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "        <span>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Former President"));
            yield "</span>
      ";
        }
        // line 30
        yield "    </div>

    <h3><a href=\"";
        // line 32
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["url"] ?? null), "html", null, true);
        yield "\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["label"] ?? null), "html", null, true);
        yield "</a></h3>

    ";
        // line 34
        if ((($tmp = ($context["start_year"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "      <p class=\"president-record__term\">
        <span>";
            // line 36
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Term in office"));
            yield "</span>
        <strong>";
            // line 37
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["start_year"] ?? null), "html", null, true);
            yield "&ndash;";
            yield (string) (((($tmp = ($context["end_year"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["end_year"], "html", null, true)) : (t("Present")));
            yield "</strong>
      </p>
    ";
        }
        // line 40
        yield "
    <div class=\"president-record__position\">";
        // line 41
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_position", [], "any", false, false, true, 41), "html", null, true);
        yield "</div>
    <div class=\"president-record__summary\">";
        // line 42
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_profile_summary", [], "any", false, false, true, 42), "html", null, true);
        yield "</div>

    <a class=\"president-record__profile-link\" href=\"";
        // line 44
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["url"] ?? null), "html", null, true);
        yield "\">
      ";
        // line 45
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View presidential profile"));
        yield "
      <span aria-hidden=\"true\">-&gt;</span>
    </a>
  </div>
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "attributes", "url", "content", "label"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--profile--president-history.html.twig";
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
        return array (  146 => 45,  142 => 44,  137 => 42,  133 => 41,  130 => 40,  122 => 37,  118 => 36,  115 => 35,  113 => 34,  106 => 32,  102 => 30,  96 => 28,  94 => 27,  89 => 26,  86 => 25,  80 => 23,  78 => 22,  72 => 18,  68 => 16,  60 => 14,  58 => 13,  52 => 11,  50 => 10,  48 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--profile--president-history.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--profile--president-history.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 13];
        static $filters = ["escape" => 11, "t" => 23];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if"],
                [0 => "escape", 1 => "t"],
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
