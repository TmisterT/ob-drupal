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

/* themes/custom/ob/templates/content/node--profile--full.html.twig */
class __TwigTemplate_0e63354904b7f57240a36af5b562f212 extends Template
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
        $context["in_menu_section"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "is_section", [], "any", true, true, true, 7) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "is_section", [], "any", false, false, true, 7)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "is_section", [], "any", false, false, true, 7)) : (false));
        // line 8
        $context["is_president"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_is_president"], "method", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp) && (($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_is_president", [], "any", false, false, true, 8), "value", [], "any", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 9
        $context["presidential_title"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_president_label"], "method", false, false, true, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_president_label", [], "any", false, false, true, 9), "value", [], "any", false, false, true, 9)) : (null));
        // line 10
        $context["start_year"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_term_start_year"], "method", false, false, true, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_term_start_year", [], "any", false, false, true, 10), "value", [], "any", false, false, true, 10)) : (null));
        // line 11
        $context["end_year"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_term_end_year"], "method", false, false, true, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_term_end_year", [], "any", false, false, true, 11), "value", [], "any", false, false, true, 11)) : (null));
        // line 12
        $context["has_related_links"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_related_links"], "method", false, false, true, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_related_links", [], "any", false, false, true, 12), "isEmpty", [], "any", false, false, true, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 13
        yield "<article";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["content-page", "profile-page", (((($tmp = ($context["in_menu_section"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("section-profile") : (""))], "method", false, false, true, 13), "html", null, true);
        yield ">
  ";
        // line 14
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 15
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  ";
        // line 17
        if ((($tmp = ($context["in_menu_section"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "    <p class=\"menu-section-page__eyebrow\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "title", [], "any", false, false, true, 18), "html", null, true);
            yield "</p>
    <div class=\"menu-section-page__layout\">
      ";
            // line 20
            yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 20)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "profile-section-heading"]));
            // line 23
            yield "      <div class=\"menu-section-page__content\">
  ";
        }
        // line 25
        yield "
  <header class=\"profile-page__header\">
    ";
        // line 27
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_profile_image", [], "any", false, false, true, 27), "isEmpty", [], "any", false, false, true, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "      <div class=\"profile-page__portrait\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_profile_image", [], "any", false, false, true, 28), "html", null, true);
            yield "</div>
    ";
        }
        // line 30
        yield "    <div>
      ";
        // line 31
        if ((($tmp = ($context["is_president"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "        <div class=\"profile-page__presidential-record\">
          <span>
            ";
            // line 34
            yield (string) (((($tmp = ($context["presidential_title"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["presidential_title"], "html", null, true)) : ((((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_is_current", [], "any", false, false, true, 34), "value", [], "any", false, false, true, 34)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (t("Current President")) : (t("Former President")))));
            yield "
          </span>
          ";
            // line 36
            if ((($tmp = ($context["start_year"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["start_year"] ?? null), "html", null, true);
                yield "&ndash;";
                yield (string) (((($tmp = ($context["end_year"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["end_year"], "html", null, true)) : (t("Present")));
                yield "</span>";
            }
            // line 37
            yield "        </div>
      ";
        }
        // line 39
        yield "      <div class=\"profile-page__position\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_position", [], "any", false, false, true, 39), "html", null, true);
        yield "</div>
      <div class=\"content-page__lead\">";
        // line 40
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_profile_summary", [], "any", false, false, true, 40), "html", null, true);
        yield "</div>
    </div>
  </header>

  <div class=\"content-page__body\">";
        // line 44
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 44), "html", null, true);
        yield "</div>

  ";
        // line 46
        if ((($tmp = ($context["has_related_links"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 47
            yield "    <section class=\"content-page__section content-page__section--links\" aria-labelledby=\"profile-sources-heading\">
      <h2 id=\"profile-sources-heading\">";
            // line 48
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Sources and related links"));
            yield "</h2>
      ";
            // line 49
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_related_links", [], "any", false, false, true, 49), "html", null, true);
            yield "
    </section>
  ";
        }
        // line 52
        yield "
  <aside class=\"content-page__metadata\" aria-label=\"";
        // line 53
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Profile information"));
        yield "\">
    <div>
      <h2>";
        // line 55
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Content owner"));
        yield "</h2>
      ";
        // line 56
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_content_owner", [], "any", false, false, true, 56), "html", null, true);
        yield "
    </div>
    <div>
      <h2>";
        // line 59
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last reviewed"));
        yield "</h2>
      ";
        // line 60
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_last_reviewed", [], "any", false, false, true, 60), "html", null, true);
        yield "
    </div>
  </aside>

  ";
        // line 64
        if (((($tmp = ($context["in_menu_section"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp) && ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)))) {
            // line 65
            yield "    <nav class=\"section-page-pager\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Section pages"));
            yield "\">
      ";
            // line 66
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 67
                yield "        <div class=\"section-page-pager__item section-page-pager__item--previous\">
          <span>";
                // line 68
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous"));
                yield "</span>
          ";
                // line 69
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 69), "link", [], "any", false, false, true, 69), "html", null, true);
                yield "
        </div>
      ";
            }
            // line 72
            yield "      ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 72)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 73
                yield "        <div class=\"section-page-pager__item section-page-pager__item--next\">
          <span>";
                // line 74
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next"));
                yield "</span>
          ";
                // line 75
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 75), "link", [], "any", false, false, true, 75), "html", null, true);
                yield "
        </div>
      ";
            }
            // line 78
            yield "    </nav>
  ";
        }
        // line 80
        yield "
  ";
        // line 81
        if ((($tmp = ($context["in_menu_section"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 82
            yield "      </div>
    </div>
  ";
        }
        // line 85
        yield "
  ";
        // line 86
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_profile_image", "field_position", "field_profile_summary", "body", "field_is_current", "field_is_president", "field_presidential_number", "field_presidential_title", "field_president_label", "field_term_start_year", "field_term_end_year", "field_related_links", "field_content_owner", "field_last_reviewed"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["section_navigation", "node", "attributes", "title_prefix", "title_suffix", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--profile--full.html.twig";
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
        return array (  238 => 86,  235 => 85,  230 => 82,  228 => 81,  225 => 80,  221 => 78,  215 => 75,  211 => 74,  208 => 73,  205 => 72,  199 => 69,  195 => 68,  192 => 67,  190 => 66,  185 => 65,  183 => 64,  176 => 60,  172 => 59,  166 => 56,  162 => 55,  157 => 53,  154 => 52,  148 => 49,  144 => 48,  141 => 47,  139 => 46,  134 => 44,  127 => 40,  122 => 39,  118 => 37,  110 => 36,  105 => 34,  101 => 32,  99 => 31,  96 => 30,  90 => 28,  88 => 27,  84 => 25,  80 => 23,  78 => 20,  72 => 18,  70 => 17,  65 => 15,  61 => 14,  56 => 13,  54 => 12,  52 => 11,  50 => 10,  48 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--profile--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--profile--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 17, "include" => 20];
        static $filters = ["escape" => 13, "t" => 34, "without" => 86];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if", 2 => "include"],
                [0 => "escape", 1 => "t", 2 => "without"],
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
