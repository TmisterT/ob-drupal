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

/* themes/custom/ob/templates/views/views-view--resource-library.html.twig */
class __TwigTemplate_e555c9e19ab2b17c5a9524e0a3ca0c64 extends Template
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
        // line 2
        yield "<div";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["resource-library", ("resource-library--" . CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "key", [], "any", false, false, true, 2)), (((($tmp = ($context["dom_id"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("js-view-dom-id-" . ($context["dom_id"] ?? null))) : (""))], "method", false, false, true, 2), "html", null, true);
        yield ">
  ";
        // line 3
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"resource-library__intro\">
    <p class=\"resource-library__eyebrow\">";
        // line 7
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "eyebrow", [], "any", false, false, true, 7), "html", null, true);
        yield "</p>
    <h2>";
        // line 8
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "heading", [], "any", false, false, true, 8), "html", null, true);
        yield "</h2>
    <p class=\"resource-library__summary\">";
        // line 9
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "summary", [], "any", false, false, true, 9), "html", null, true);
        yield "</p>
    <p class=\"resource-library__detail\">";
        // line 10
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "detail", [], "any", false, false, true, 10), "html", null, true);
        yield "</p>
  </header>

  <div class=\"menu-section-page__layout resource-library__layout\">
    ";
        // line 14
        yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 14)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "resource-section-navigation-heading"]));
        // line 17
        yield "
    <div class=\"resource-library__main\">
      ";
        // line 19
        if ((($tmp = ($context["exposed"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "        <section class=\"resource-library__filters\" aria-labelledby=\"resource-filter-heading\">
          <h2 id=\"resource-filter-heading\">";
            // line 21
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Search and filter"));
            yield "</h2>
          ";
            // line 22
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["exposed"] ?? null), "html", null, true);
            yield "
        </section>
      ";
        }
        // line 25
        yield "
      ";
        // line 26
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_before"] ?? null), "html", null, true);
        yield "

      <div class=\"resource-library__results-heading\">
        <h2>";
        // line 29
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "results_heading", [], "any", false, false, true, 29), "html", null, true);
        yield "</h2>
        <span aria-live=\"polite\">
          ";
        // line 31
        yield \Drupal::translation()->formatPlural(abs(        // line 33
($context["resource_result_count"] ?? null)), "@resource_result_count publication", "@resource_result_count publications", ["@resource_result_count" => $this->env->getExtension(\Drupal\Core\Template\TwigExtension::class)->renderVar(        // line 32
($context["resource_result_count"] ?? null)), "@resource_result_count" => $this->env->getExtension(\Drupal\Core\Template\TwigExtension::class)->renderVar(        // line 34
($context["resource_result_count"] ?? null)), ]);
        // line 36
        yield "        </span>
      </div>

      ";
        // line 39
        if ((($tmp = ($context["resource_rows"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "        <div class=\"resource-table-wrap\">
          <table class=\"resource-table\">
            <caption class=\"visually-hidden\">";
            // line 42
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Resource search results"));
            yield "</caption>
            <thead>
              <tr>
                <th scope=\"col\">";
            // line 45
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "title_label", [], "any", false, false, true, 45), "html", null, true);
            yield "</th>
                <th scope=\"col\">";
            // line 46
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Type"));
            yield "</th>
                <th scope=\"col\">";
            // line 47
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Year"));
            yield "</th>
                <th scope=\"col\">";
            // line 48
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Organisation"));
            yield "</th>
                <th scope=\"col\">";
            // line 49
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "document_label", [], "any", false, false, true, 49), "html", null, true);
            yield "</th>
              </tr>
            </thead>
            <tbody>
              ";
            // line 53
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["resource_rows"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 54
                yield "                <tr>
                  <td data-label=\"";
                // line 55
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "title_label", [], "any", false, false, true, 55), "html", null, true);
                yield "\">
                    <a class=\"resource-table__title\" href=\"";
                // line 56
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 56), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 56), "html", null, true);
                yield "</a>
                    ";
                // line 57
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "reference", [], "any", false, false, true, 57)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"resource-table__reference\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Reference"));
                    yield ": ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "reference", [], "any", false, false, true, 57), "html", null, true);
                    yield "</span>";
                }
                // line 58
                yield "                    ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "summary", [], "any", false, false, true, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<p>";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "summary", [], "any", false, false, true, 58), "html", null, true);
                    yield "</p>";
                }
                // line 59
                yield "                    ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "published", [], "any", false, false, true, 59)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"resource-table__published\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Published"));
                    yield ": ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "published", [], "any", false, false, true, 59), "html", null, true);
                    yield "</span>";
                }
                // line 60
                yield "                  </td>
                  <td data-label=\"";
                // line 61
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Type"));
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "types", [], "any", false, false, true, 61), ", "), "html", null, true);
                yield "</td>
                  <td data-label=\"";
                // line 62
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Year"));
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "year", [], "any", false, false, true, 62), "html", null, true);
                yield "</td>
                  <td data-label=\"";
                // line 63
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Organisation"));
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "organisations", [], "any", false, false, true, 63), ", "), "html", null, true);
                yield "</td>
                  <td data-label=\"";
                // line 64
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["resource_page"] ?? null), "document_label", [], "any", false, false, true, 64), "html", null, true);
                yield "\">
                    ";
                // line 65
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "documents", [], "any", false, false, true, 65));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["document"]) {
                    // line 66
                    yield "                      <div class=\"resource-document\">
                        <span class=\"resource-document__meta\">";
                    // line 67
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "type", [], "any", false, false, true, 67), "html", null, true);
                    yield " · ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "size", [], "any", false, false, true, 67), "html", null, true);
                    yield "</span>
                        <div class=\"resource-document__actions\">
                          <a href=\"";
                    // line 69
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "url", [], "any", false, false, true, 69), "html", null, true);
                    yield "\" target=\"_blank\" rel=\"noopener\">
                            <i class=\"bi bi-box-arrow-up-right\" aria-hidden=\"true\"></i>";
                    // line 70
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View"));
                    yield "<span class=\"visually-hidden\"> ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "title", [], "any", false, false, true, 70), "html", null, true);
                    yield "</span>
                          </a>
                          <a class=\"resource-document__download\" href=\"";
                    // line 72
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "url", [], "any", false, false, true, 72), "html", null, true);
                    yield "\" download>
                            <i class=\"bi bi-download\" aria-hidden=\"true\"></i>";
                    // line 73
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Download"));
                    yield "<span class=\"visually-hidden\"> ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "title", [], "any", false, false, true, 73), "html", null, true);
                    yield "</span>
                          </a>
                        </div>
                      </div>
                    ";
                    $context['_iterated'] = true;
                }
                // line 77
                if (!$context['_iterated']) {
                    // line 78
                    yield "                      <span class=\"resource-document__unavailable\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Contact the publishing organisation"));
                    yield "</span>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['document'], $context['_parent'], $context['_iterated']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 80
                yield "                  </td>
                </tr>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 83
            yield "            </tbody>
          </table>
        </div>
      ";
        } elseif ((($tmp =         // line 86
($context["empty"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 87
            yield "        <div class=\"resource-library__empty\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["empty"] ?? null), "html", null, true);
            yield "</div>
      ";
        }
        // line 89
        yield "
      <div class=\"archive-table-pagination\">
        ";
        // line 91
        if ((($tmp = ($context["resource_rows"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 92
            yield "          <p class=\"archive-table-pagination__summary\" role=\"status\">
            ";
            // line 93
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Showing @first–@last of @total publications", ["@first" => CoreExtension::getAttribute($this->env, $this->source, ($context["table_result_range"] ?? null), "first", [], "any", false, false, true, 93), "@last" => CoreExtension::getAttribute($this->env, $this->source, ($context["table_result_range"] ?? null), "last", [], "any", false, false, true, 93), "@total" => ($context["resource_result_count"] ?? null)]));
            yield "
          </p>
        ";
        }
        // line 96
        yield "        ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["pager"] ?? null), "html", null, true);
        yield "
      </div>
      ";
        // line 98
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_after"] ?? null), "html", null, true);
        yield "
      ";
        // line 99
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["more"] ?? null), "html", null, true);
        yield "
      ";
        // line 100
        if ((($tmp = ($context["footer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<footer>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["footer"] ?? null), "html", null, true);
            yield "</footer>";
        }
        // line 101
        yield "      ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["feed_icons"] ?? null), "html", null, true);
        yield "
    </div>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "resource_page", "dom_id", "title_prefix", "title_suffix", "exposed", "attachment_before", "resource_result_count", "resource_rows", "empty", "table_result_range", "pager", "attachment_after", "more", "footer", "feed_icons"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/views/views-view--resource-library.html.twig";
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
        return array (  334 => 101,  328 => 100,  324 => 99,  320 => 98,  314 => 96,  308 => 93,  305 => 92,  303 => 91,  299 => 89,  293 => 87,  291 => 86,  286 => 83,  277 => 80,  267 => 78,  265 => 77,  254 => 73,  250 => 72,  243 => 70,  239 => 69,  232 => 67,  229 => 66,  224 => 65,  220 => 64,  214 => 63,  208 => 62,  202 => 61,  199 => 60,  190 => 59,  183 => 58,  175 => 57,  169 => 56,  165 => 55,  162 => 54,  158 => 53,  151 => 49,  147 => 48,  143 => 47,  139 => 46,  135 => 45,  129 => 42,  125 => 40,  123 => 39,  118 => 36,  116 => 34,  115 => 32,  114 => 33,  113 => 31,  108 => 29,  102 => 26,  99 => 25,  93 => 22,  89 => 21,  86 => 20,  84 => 19,  80 => 17,  78 => 14,  71 => 10,  67 => 9,  63 => 8,  59 => 7,  53 => 4,  49 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/views/views-view--resource-library.html.twig", "/var/www/html/web/themes/custom/ob/templates/views/views-view--resource-library.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 14, "if" => 19, "trans" => 31, "for" => 53];
        static $filters = ["escape" => 2, "t" => 21, "join" => 61];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "include", 1 => "if", 2 => "trans", 3 => "for"],
                [0 => "escape", 1 => "t", 2 => "join"],
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
