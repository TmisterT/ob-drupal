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

/* themes/custom/ob/templates/views/views-view--updates--press-releases.html.twig */
class __TwigTemplate_a3aca3ffcdb9dcd37c69c156ac36cb1b extends Template
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
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["press_release_cache"] ?? null), "html", null, true);
        yield "
<div";
        // line 3
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["news-media-archive", "updates-archive", "press-releases-archive", (((($tmp = ($context["dom_id"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("js-view-dom-id-" . ($context["dom_id"] ?? null))) : (""))], "method", false, false, true, 3), "html", null, true);
        yield ">
  ";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 5
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"news-media-archive__intro\">
    <p class=\"news-media-archive__eyebrow\">";
        // line 8
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("News & Media"));
        yield "</p>
    ";
        // line 9
        if ((($tmp = ($context["header"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<div class=\"news-media-archive__lead\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["header"] ?? null), "html", null, true);
            yield "</div>";
        }
        // line 10
        yield "  </header>

  <div class=\"menu-section-page__layout news-media-archive__layout\">
    ";
        // line 13
        yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 13)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "press-releases-section-navigation-heading"]));
        // line 16
        yield "
    <div class=\"news-media-archive__main\">
      ";
        // line 18
        if ((($tmp = ($context["exposed"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "        <section class=\"news-media-archive__filters\" aria-labelledby=\"press-releases-filter-heading\">
          <h2 id=\"press-releases-filter-heading\">";
            // line 20
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Find a press release"));
            yield "</h2>
          ";
            // line 21
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["exposed"] ?? null), "html", null, true);
            yield "
        </section>
      ";
        }
        // line 24
        yield "
      ";
        // line 25
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_before"] ?? null), "html", null, true);
        yield "

      <div class=\"news-media-archive__results-heading\">
        <h2>";
        // line 28
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Press releases"));
        yield "</h2>
        <span aria-live=\"polite\">
          ";
        // line 30
        yield \Drupal::translation()->formatPlural(abs(        // line 32
($context["press_release_total"] ?? null)), "@press_release_total release", "@press_release_total releases", ["@press_release_total" => $this->env->getExtension(\Drupal\Core\Template\TwigExtension::class)->renderVar(        // line 31
($context["press_release_total"] ?? null)), "@press_release_total" => $this->env->getExtension(\Drupal\Core\Template\TwigExtension::class)->renderVar(        // line 33
($context["press_release_total"] ?? null)), ]);
        // line 35
        yield "        </span>
      </div>

      ";
        // line 38
        if ((($tmp = ($context["press_release_rows"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 39
            yield "        <div class=\"press-release-table-wrap\">
          <table class=\"press-release-table\">
            <caption class=\"visually-hidden\">";
            // line 41
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Press release search results"));
            yield "</caption>
            <thead>
              <tr>
                <th scope=\"col\">";
            // line 44
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Image"));
            yield "</th>
                <th scope=\"col\">";
            // line 45
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Title"));
            yield "</th>
                <th scope=\"col\">";
            // line 46
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Category"));
            yield "</th>
                <th scope=\"col\">";
            // line 47
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Details"));
            yield "</th>
              </tr>
            </thead>
            <tbody>
              ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["press_release_rows"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 52
                yield "                <tr>
                  <td data-label=\"";
                // line 53
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Image"));
                yield "\">
                    <a class=\"press-release-table__image\" href=\"";
                // line 54
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 54), "html", null, true);
                yield "\" tabindex=\"-1\" aria-hidden=\"true\">
                      ";
                // line 55
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 56
                    yield "                        ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 56), "html", null, true);
                    yield "
                      ";
                } else {
                    // line 58
                    yield "                        <span class=\"press-release-table__image-placeholder\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No image"));
                    yield "</span>
                      ";
                }
                // line 60
                yield "                    </a>
                  </td>
                  <td data-label=\"";
                // line 62
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Title"));
                yield "\">
                    <a class=\"press-release-table__title\" href=\"";
                // line 63
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 63), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 63), "html", null, true);
                yield "</a>
                    ";
                // line 64
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "summary", [], "any", false, false, true, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<p>";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "summary", [], "any", false, false, true, 64), "html", null, true);
                    yield "</p>";
                }
                // line 65
                yield "                    ";
                yield from $this->load("@ob/templates/content/update-language-links.html.twig", 65)->unwrap()->yield(CoreExtension::toArray(["languages" => CoreExtension::getAttribute($this->env, $this->source, $context["item"], "languages", [], "any", false, false, true, 65), "compact" => true]));
                // line 66
                yield "                  </td>
                  <td data-label=\"";
                // line 67
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Category"));
                yield "\">
                    ";
                // line 68
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "categories", [], "any", false, false, true, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 69
                    yield "                      <span class=\"press-release-table__category\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "categories", [], "any", false, false, true, 69), ", "), "html", null, true);
                    yield "</span>
                    ";
                } else {
                    // line 71
                    yield "                      <span class=\"press-release-table__muted\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Press release"));
                    yield "</span>
                    ";
                }
                // line 73
                yield "                  </td>
                  <td data-label=\"";
                // line 74
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Details"));
                yield "\">
                    <div class=\"press-release-table__details\">
                      ";
                // line 76
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 76)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 77
                    yield "                        <time datetime=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "datetime", [], "any", false, false, true, 77), "html", null, true);
                    yield "\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 77), "html", null, true);
                    yield "</time>
                      ";
                } else {
                    // line 79
                    yield "                        <span class=\"press-release-table__muted\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Not dated"));
                    yield "</span>
                      ";
                }
                // line 81
                yield "                      ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "topics", [], "any", false, false, true, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 82
                    yield "                        <span>";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "topics", [], "any", false, false, true, 82), ", "), "html", null, true);
                    yield "</span>
                      ";
                }
                // line 84
                yield "                      <a class=\"press-release-table__action\" href=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 84), "html", null, true);
                yield "\">
                        ";
                // line 85
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Read More"));
                yield "<span class=\"visually-hidden\">: ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 85), "html", null, true);
                yield "</span>
                      </a>
                    </div>
                  </td>
                </tr>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 91
            yield "            </tbody>
          </table>
        </div>
      ";
        } elseif ((($tmp =         // line 94
($context["empty"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 95
            yield "        <div class=\"news-media-archive__empty\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["empty"] ?? null), "html", null, true);
            yield "</div>
      ";
        }
        // line 97
        yield "
      <div class=\"archive-table-pagination\">
        ";
        // line 99
        if ((($tmp = ($context["press_release_rows"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 100
            yield "          <p class=\"archive-table-pagination__summary\" role=\"status\">
            ";
            // line 101
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Showing @first–@last of @total releases", ["@first" => CoreExtension::getAttribute($this->env, $this->source, ($context["table_result_range"] ?? null), "first", [], "any", false, false, true, 101), "@last" => CoreExtension::getAttribute($this->env, $this->source, ($context["table_result_range"] ?? null), "last", [], "any", false, false, true, 101), "@total" => ($context["press_release_total"] ?? null)]));
            yield "
          </p>
        ";
        }
        // line 104
        yield "        ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["pager"] ?? null), "html", null, true);
        yield "
      </div>
      ";
        // line 106
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_after"] ?? null), "html", null, true);
        yield "
      ";
        // line 107
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["more"] ?? null), "html", null, true);
        yield "
      ";
        // line 108
        if ((($tmp = ($context["footer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<footer>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["footer"] ?? null), "html", null, true);
            yield "</footer>";
        }
        // line 109
        yield "      ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["feed_icons"] ?? null), "html", null, true);
        yield "
    </div>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["press_release_cache", "attributes", "dom_id", "title_prefix", "title_suffix", "header", "exposed", "attachment_before", "press_release_total", "press_release_rows", "empty", "table_result_range", "pager", "attachment_after", "more", "footer", "feed_icons"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/views/views-view--updates--press-releases.html.twig";
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
        return array (  327 => 109,  321 => 108,  317 => 107,  313 => 106,  307 => 104,  301 => 101,  298 => 100,  296 => 99,  292 => 97,  286 => 95,  284 => 94,  279 => 91,  264 => 85,  259 => 84,  253 => 82,  250 => 81,  244 => 79,  236 => 77,  234 => 76,  229 => 74,  226 => 73,  220 => 71,  214 => 69,  212 => 68,  208 => 67,  205 => 66,  202 => 65,  196 => 64,  190 => 63,  186 => 62,  182 => 60,  176 => 58,  170 => 56,  168 => 55,  164 => 54,  160 => 53,  157 => 52,  153 => 51,  146 => 47,  142 => 46,  138 => 45,  134 => 44,  128 => 41,  124 => 39,  122 => 38,  117 => 35,  115 => 33,  114 => 31,  113 => 32,  112 => 30,  107 => 28,  101 => 25,  98 => 24,  92 => 21,  88 => 20,  85 => 19,  83 => 18,  79 => 16,  77 => 13,  72 => 10,  66 => 9,  62 => 8,  56 => 5,  52 => 4,  48 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/views/views-view--updates--press-releases.html.twig", "/var/www/html/web/themes/custom/ob/templates/views/views-view--updates--press-releases.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 9, "include" => 13, "trans" => 30, "for" => 51];
        static $filters = ["escape" => 2, "t" => 8, "join" => 69];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "include", 2 => "trans", 3 => "for"],
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
