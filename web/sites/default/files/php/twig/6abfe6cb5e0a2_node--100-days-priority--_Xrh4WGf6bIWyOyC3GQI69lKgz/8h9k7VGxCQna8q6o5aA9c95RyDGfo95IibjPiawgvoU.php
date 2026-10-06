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

/* themes/custom/ob/templates/content/node--100-days-priority--full.html.twig */
class __TwigTemplate_c5c45b2892d855b51c5353b307f487e7 extends Template
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
        $context["dashboard"] = ((array_key_exists("hundred_days_dashboard", $context)) ? (Twig\Extension\CoreExtension::default(($context["hundred_days_dashboard"] ?? null), [])) : ([]));
        // line 8
        $context["rows"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "rows", [], "any", true, true, true, 8)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "rows", [], "any", false, false, true, 8), [])) : ([]));
        // line 9
        yield "
<article";
        // line 10
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["hundred-days-page"], "method", false, false, true, 10), "html", null, true);
        yield ">
  ";
        // line 11
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 12
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"hundred-days-page__intro\">
    <p>";
        // line 15
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Tracking priority activities across divisions."));
        yield "</p>
  </header>

  <section class=\"hundred-days-summary\" aria-label=\"";
        // line 18
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("100 Days summary"));
        yield "\">
    <div class=\"hundred-days-summary__item\">
      <strong>";
        // line 20
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "total", [], "any", true, true, true, 20)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "total", [], "any", false, false, true, 20), 0)) : (0)), "html", null, true);
        yield "</strong>
      <span>";
        // line 21
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Number of Priorities"));
        yield "</span>
    </div>
    <div class=\"hundred-days-summary__item\">
      <strong>";
        // line 24
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "completed", [], "any", true, true, true, 24)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "completed", [], "any", false, false, true, 24), 0)) : (0)), "html", null, true);
        yield "</strong>
      <span>";
        // line 25
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Completed"));
        yield "</span>
    </div>
    <div class=\"hundred-days-summary__item\">
      <strong>";
        // line 28
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "not_completed", [], "any", true, true, true, 28)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "not_completed", [], "any", false, false, true, 28), 0)) : (0)), "html", null, true);
        yield "</strong>
      <span>";
        // line 29
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Not Yet Completed"));
        yield "</span>
    </div>
    <div class=\"hundred-days-summary__item\">
      <strong>";
        // line 32
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "completion_percentage", [], "any", true, true, true, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboard"] ?? null), "completion_percentage", [], "any", false, false, true, 32), 0)) : (0)), "html", null, true);
        yield "%</strong>
      <span>";
        // line 33
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Completion Percentage"));
        yield "</span>
    </div>
  </section>

  ";
        // line 37
        if ((($tmp = ($context["rows"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "    <div class=\"hundred-days-table-wrap\">
      <table class=\"hundred-days-table\">
        <thead>
          <tr>
            <th scope=\"col\">";
            // line 42
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Priority No"));
            yield "</th>
            <th scope=\"col\">";
            // line 43
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("100 Days Priorities Description"));
            yield "</th>
            <th scope=\"col\">";
            // line 44
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Division"));
            yield "</th>
            <th scope=\"col\">";
            // line 45
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Status"));
            yield "</th>
            <th scope=\"col\">";
            // line 46
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Progress (%)"));
            yield "</th>
          </tr>
        </thead>
        <tbody>
          ";
            // line 50
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 51
                yield "            <tr>
              <td data-label=\"";
                // line 52
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Priority No"));
                yield "\">
                <span class=\"hundred-days-table__number\">";
                // line 53
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "number", [], "any", false, false, true, 53), "html", null, true);
                yield "</span>
              </td>
              <td data-label=\"";
                // line 55
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Description"));
                yield "\">
                <p class=\"hundred-days-table__description\">";
                // line 56
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "description", [], "any", false, false, true, 56), "html", null, true);
                yield "</p>
              </td>
              <td data-label=\"";
                // line 58
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Division"));
                yield "\">";
                yield (string) (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["row"], "division", [], "any", false, false, true, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "division", [], "any", false, false, true, 58), "html", null, true)) : (t("Not assigned")));
                yield "</td>
              <td data-label=\"";
                // line 59
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Status"));
                yield "\">
                <span class=\"hundred-days-table__status hundred-days-table__status--";
                // line 60
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "status_key", [], "any", false, false, true, 60)), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, true, 60), "html", null, true);
                yield "</span>
              </td>
              <td data-label=\"";
                // line 62
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Progress (%)"));
                yield "\">
                <div class=\"hundred-days-table__progress\">
                  <strong>";
                // line 64
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "progress", [], "any", false, false, true, 64), "html", null, true);
                yield "%</strong>
                  <span class=\"hundred-days-table__progress-track\" aria-hidden=\"true\">
                    <span style=\"width: ";
                // line 66
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["row"], "progress", [], "any", false, false, true, 66), "html", null, true);
                yield "%\"></span>
                  </span>
                </div>
              </td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 72
            yield "        </tbody>
      </table>
    </div>
  ";
        } else {
            // line 76
            yield "    <div class=\"hundred-days-page__empty\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No 100 Days priorities have been published yet."));
            yield "</div>
  ";
        }
        // line 78
        yield "
  ";
        // line 79
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_priority_number", "field_description", "field_division", "field_100_days_priority", "field_progress", "field_status", "links"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["hundred_days_dashboard", "attributes", "title_prefix", "title_suffix", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--100-days-priority--full.html.twig";
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
        return array (  228 => 79,  225 => 78,  219 => 76,  213 => 72,  200 => 66,  195 => 64,  190 => 62,  183 => 60,  179 => 59,  173 => 58,  168 => 56,  164 => 55,  159 => 53,  155 => 52,  152 => 51,  148 => 50,  141 => 46,  137 => 45,  133 => 44,  129 => 43,  125 => 42,  119 => 38,  117 => 37,  110 => 33,  106 => 32,  100 => 29,  96 => 28,  90 => 25,  86 => 24,  80 => 21,  76 => 20,  71 => 18,  65 => 15,  59 => 12,  55 => 11,  51 => 10,  48 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--100-days-priority--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--100-days-priority--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 37, "for" => 50];
        static $filters = ["default" => 7, "escape" => 10, "t" => 15, "clean_class" => 60, "without" => 79];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if", 2 => "for"],
                [0 => "default", 1 => "escape", 2 => "t", 3 => "clean_class", 4 => "without"],
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
