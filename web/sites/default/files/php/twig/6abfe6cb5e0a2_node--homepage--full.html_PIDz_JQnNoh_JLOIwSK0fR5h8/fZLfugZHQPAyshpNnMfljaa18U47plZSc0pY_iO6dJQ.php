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

/* themes/custom/ob/templates/content/node--homepage--full.html.twig */
class __TwigTemplate_d334c1396bd107374c4d66e536816fdc extends Template
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
        $context["hero_link"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_link", [], "any", false, false, true, 7), 0, [], "any", false, false, true, 7);
        // line 8
        $context["quick_links"] = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_quick_links", [], "any", false, false, true, 8);
        // line 9
        $context["homepage_sections"] = [["id" => "updates", "number" => "01", "heading" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 13
($context["node"] ?? null), "field_updates_heading", [], "any", false, false, true, 13), "value", [], "any", false, false, true, 13), "intro" => CoreExtension::getAttribute($this->env, $this->source,         // line 14
($context["content"] ?? null), "field_updates_intro", [], "any", false, false, true, 14), "has_intro" =>  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 15
($context["node"] ?? null), "field_updates_intro", [], "any", false, false, true, 15), "isEmpty", [], "any", false, false, true, 15)) && $tmp instanceof Markup ? (string) $tmp : $tmp), "link" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 16
($context["node"] ?? null), "field_updates_link", [], "any", false, false, true, 16), 0, [], "any", false, false, true, 16)], ["id" => "services", "number" => "02", "heading" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 21
($context["node"] ?? null), "field_services_heading", [], "any", false, false, true, 21), "value", [], "any", false, false, true, 21), "intro" => CoreExtension::getAttribute($this->env, $this->source,         // line 22
($context["content"] ?? null), "field_services_intro", [], "any", false, false, true, 22), "has_intro" =>  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 23
($context["node"] ?? null), "field_services_intro", [], "any", false, false, true, 23), "isEmpty", [], "any", false, false, true, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp), "link" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 24
($context["node"] ?? null), "field_services_link", [], "any", false, false, true, 24), 0, [], "any", false, false, true, 24)], ["id" => "activities", "number" => "03", "heading" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 29
($context["node"] ?? null), "field_activities_heading", [], "any", false, false, true, 29), "value", [], "any", false, false, true, 29), "intro" => CoreExtension::getAttribute($this->env, $this->source,         // line 30
($context["content"] ?? null), "field_activities_intro", [], "any", false, false, true, 30), "has_intro" =>  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 31
($context["node"] ?? null), "field_activities_intro", [], "any", false, false, true, 31), "isEmpty", [], "any", false, false, true, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp), "link" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 32
($context["node"] ?? null), "field_activities_link", [], "any", false, false, true, 32), 0, [], "any", false, false, true, 32)], ["id" => "projects", "number" => "04", "heading" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 37
($context["node"] ?? null), "field_projects_heading", [], "any", false, false, true, 37), "value", [], "any", false, false, true, 37), "intro" => CoreExtension::getAttribute($this->env, $this->source,         // line 38
($context["content"] ?? null), "field_projects_intro", [], "any", false, false, true, 38), "has_intro" =>  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 39
($context["node"] ?? null), "field_projects_intro", [], "any", false, false, true, 39), "isEmpty", [], "any", false, false, true, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp), "link" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 40
($context["node"] ?? null), "field_projects_link", [], "any", false, false, true, 40), 0, [], "any", false, false, true, 40)]];
        // line 43
        yield "
<article";
        // line 44
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["homepage"], "method", false, false, true, 44), "html", null, true);
        yield ">
  ";
        // line 45
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 46
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  ";
        // line 48
        if ((($tmp = ($context["homepage_slider"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "    ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["homepage_slider"] ?? null), "html", null, true);
            yield "
  ";
        } else {
            // line 51
            yield "    <section class=\"homepage-hero\" aria-labelledby=\"homepage-hero-title\">
      <div class=\"container homepage-hero__inner\">
        <div class=\"homepage-hero__content\">
          ";
            // line 54
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_label", [], "any", false, false, true, 54), "value", [], "any", false, false, true, 54)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 55
                yield "            <div class=\"homepage-hero__eyebrow\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_label", [], "any", false, false, true, 55), "value", [], "any", false, false, true, 55), "html", null, true);
                yield "</div>
          ";
            }
            // line 57
            yield "          <h1 id=\"homepage-hero-title\" class=\"homepage-hero__title\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_title", [], "any", false, false, true, 57), "value", [], "any", false, false, true, 57), "html", null, true);
            yield "</h1>
          ";
            // line 58
            if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_summary", [], "any", false, false, true, 58), "isEmpty", [], "any", false, false, true, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 59
                yield "            <div class=\"homepage-hero__summary\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_hero_summary", [], "any", false, false, true, 59), "html", null, true);
                yield "</div>
          ";
            }
            // line 61
            yield "          ";
            if ((($tmp = ($context["hero_link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 62
                yield "            <a class=\"homepage-hero__action\" href=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["hero_link"] ?? null), "url", [], "any", false, false, true, 62), "html", null, true);
                yield "\">
              <span>";
                // line 63
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["hero_link"] ?? null), "title", [], "any", false, false, true, 63), "html", null, true);
                yield "</span>
              <svg viewBox=\"0 0 24 24\" aria-hidden=\"true\"><path d=\"M5 12h14M13 6l6 6-6 6\"/></svg>
            </a>
          ";
            }
            // line 67
            yield "        </div>

        <div class=\"homepage-hero__visual";
            // line 69
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_image", [], "any", false, false, true, 69), "isEmpty", [], "any", false, false, true, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield " homepage-hero__visual--graphic";
            }
            yield "\"";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_image", [], "any", false, false, true, 69), "isEmpty", [], "any", false, false, true, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield " aria-hidden=\"true\"";
            }
            yield ">
          ";
            // line 70
            if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_image", [], "any", false, false, true, 70), "isEmpty", [], "any", false, false, true, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 71
                yield "            ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_hero_image", [], "any", false, false, true, 71), "html", null, true);
                yield "
          ";
            } else {
                // line 73
                yield "            <div class=\"homepage-hero__sun\"></div>
            <div class=\"homepage-hero__bird\"></div>
            <div class=\"homepage-hero__waves\"></div>
          ";
            }
            // line 77
            yield "        </div>
      </div>
    </section>

  ";
        }
        // line 82
        yield "
  <section id=\"site-search\" class=\"homepage-search\" aria-labelledby=\"homepage-search-title\">
    <div class=\"container\">
      <div class=\"homepage-search__panel\">
        <div class=\"homepage-search__heading\">
          <span class=\"homepage-search__kicker\">";
        // line 87
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Government information and services"));
        yield "</span>
          <h2 id=\"homepage-search-title\">";
        // line 88
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_search_heading", [], "any", false, false, true, 88), "value", [], "any", false, false, true, 88), "html", null, true);
        yield "</h2>
        </div>
        <form id=\"homepage-search-form\" class=\"homepage-search__form\" action=\"";
        // line 90
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("search.view_node_search"));
        yield "\" method=\"get\" role=\"search\">
          <label class=\"visually-hidden\" for=\"homepage-search-input\">";
        // line 91
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_search_heading", [], "any", false, false, true, 91), "value", [], "any", false, false, true, 91), "html", null, true);
        yield "</label>
          <svg class=\"homepage-search__icon\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><path d=\"m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z\"/></svg>
          <input id=\"homepage-search-input\" name=\"keys\" type=\"search\" required placeholder=\"";
        // line 93
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_search_placeholder", [], "any", false, false, true, 93), "value", [], "any", false, false, true, 93), "html", null, true);
        yield "\">
          <label class=\"visually-hidden\" for=\"homepage-search-type\">";
        // line 94
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Filter by content type"));
        yield "</label>
          <select id=\"homepage-search-type\" name=\"f[]\" aria-label=\"";
        // line 95
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Filter by content type"));
        yield "\">
            <option value=\"\">";
        // line 96
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("All information"));
        yield "</option>
            <option value=\"type:service\">";
        // line 97
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Services"));
        yield "</option>
            <option value=\"type:publication\">";
        // line 98
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Publications and gazettes"));
        yield "</option>
            <option value=\"type:update\">";
        // line 99
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("News and press releases"));
        yield "</option>
            <option value=\"type:public_notice\">";
        // line 100
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Public notices"));
        yield "</option>
          </select>
          <button class=\"homepage-search__clear\" type=\"reset\" aria-label=\"";
        // line 102
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Clear search and filters"));
        yield "\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Clear"));
        yield "</button>
          <button type=\"submit\">";
        // line 103
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Search"));
        yield "</button>
        </form>
      </div>
      <section class=\"homepage-search__results\" data-homepage-search-results aria-labelledby=\"homepage-search-results-title\" hidden>
        <h2 id=\"homepage-search-results-title\" tabindex=\"-1\">";
        // line 107
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Search results"));
        yield "</h2>
        <p data-homepage-search-status role=\"status\" aria-live=\"polite\"></p>
        <div data-homepage-search-content></div>
        <a data-homepage-search-fallback hidden>";
        // line 110
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Open the search results page"));
        yield "</a>
      </section>
    </div>
  </section>

  ";
        // line 115
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["quick_links"] ?? null), "isEmpty", [], "any", false, false, true, 115)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 116
            yield "    ";
            $context["quick_link_icons"] = ["M7 3h8l4 4v14H7zM14 3v5h5M10 12h6M10 16h6", "M8 4h8a2 2 0 0 1 2 2v14l-3-2-3 2-3-2-3 2V6a2 2 0 0 1 2-2zM10 9h4M10 13h6", "M4 6h11v12H4zM15 9h5v6a3 3 0 0 1-3 3h-2zM7 10h5M7 14h5", "M4 20V9l8-5 8 5v11M8 20v-8h8v8M10 16h4"];
            // line 122
            yield "    <nav class=\"homepage-quick-links\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Popular government information"));
            yield "\">
      <div class=\"container\">
        <div class=\"homepage-quick-links__header\">
          <span>";
            // line 125
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Popular information"));
            yield "</span>
        </div>
        <div class=\"homepage-quick-links__grid\">
          ";
            // line 128
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["quick_links"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 129
                yield "            <a class=\"quick-link-card\" href=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 129), "html", null, true);
                yield "\">
              <span class=\"quick-link-card__icon\" aria-hidden=\"true\">
                <svg viewBox=\"0 0 24 24\"><path d=\"";
                // line 131
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((CoreExtension::getAttribute($this->env, $this->source, ($context["quick_link_icons"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 131), [], "array", true, true, true, 131)) ? (Twig\Extension\CoreExtension::default((($_v0 = ($context["quick_link_icons"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0[(($_v1 = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 131)) instanceof \Stringable ? (string) $_v1 : $_v1)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["quick_link_icons"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 131), [], "array", false, false, true, 131)), (($_v2 = ($context["quick_link_icons"] ?? null)) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["quick_link_icons"] ?? null), 0, [], "array", false, false, true, 131)))) : ((($_v3 = ($context["quick_link_icons"] ?? null)) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["quick_link_icons"] ?? null), 0, [], "array", false, false, true, 131)))), "html", null, true);
                yield "\"/></svg>
              </span>
              <span class=\"quick-link-card__label\">";
                // line 133
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 133), "html", null, true);
                yield "</span>
              <svg class=\"quick-link-card__arrow\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><path d=\"M5 12h14M13 6l6 6-6 6\"/></svg>
            </a>
          ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 137
            yield "        </div>
      </div>
    </nav>
  ";
        }
        // line 141
        yield "
  ";
        // line 142
        if ((($tmp = ($context["public_notices"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 143
            yield "    <section class=\"homepage-notices\" aria-labelledby=\"homepage-notices-title\">
      <div class=\"container\">
        <div class=\"homepage-notices__heading\">
          <div>
            <h2 id=\"homepage-notices-title\">";
            // line 147
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_notices_heading", [], "any", false, false, true, 147), "value", [], "any", false, false, true, 147), "html", null, true);
            yield "</h2>
          </div>
          <a class=\"homepage-notices__all\" href=\"";
            // line 149
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("view.public_notices.page_1"));
            yield "\">
            <span>";
            // line 150
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View all notices"));
            yield "</span>
            <span aria-hidden=\"true\">→</span>
          </a>
        </div>
        ";
            // line 154
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["public_notices"] ?? null), "html", null, true);
            yield "
      </div>
    </section>
  ";
        }
        // line 158
        yield "
  ";
        // line 159
        if ((($tmp = ($context["current_president"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 160
            yield "    <section class=\"homepage-president\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Current President"));
            yield "\">
      <div class=\"container\">";
            // line 161
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["current_president"] ?? null), "html", null, true);
            yield "</div>
    </section>
  ";
        }
        // line 164
        yield "
  <section class=\"homepage-explore\" aria-labelledby=\"homepage-explore-title\">
    <div class=\"container\">
      <div class=\"homepage-explore__heading\">
        <span class=\"homepage-section__eyebrow\">";
        // line 168
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Explore the Office"));
        yield "</span>
        <h2 id=\"homepage-explore-title\">";
        // line 169
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Information for the public"));
        yield "</h2>
      </div>
      <div class=\"homepage-explore__grid\">
        ";
        // line 172
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["homepage_sections"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 173
            yield "          ";
            if (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["section"], "heading", [], "any", false, false, true, 173)) && $tmp instanceof Markup ? (string) $tmp : $tmp) && ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["section"], "has_intro", [], "any", false, false, true, 173)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["section"], "link", [], "any", false, false, true, 173)) && $tmp instanceof Markup ? (string) $tmp : $tmp)))) {
                // line 174
                yield "            <article class=\"homepage-feature homepage-feature--";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["section"], "id", [], "any", false, false, true, 174), "html", null, true);
                yield "\">
              <div class=\"homepage-feature__top\">
                <span class=\"homepage-feature__number\" aria-hidden=\"true\">";
                // line 176
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["section"], "number", [], "any", false, false, true, 176), "html", null, true);
                yield "</span>
                <span class=\"homepage-feature__icon\" aria-hidden=\"true\">
                  ";
                // line 178
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["section"], "id", [], "any", false, false, true, 178) == "updates")) {
                    // line 179
                    yield "                    <svg viewBox=\"0 0 24 24\"><path d=\"M5 4h14v16H5zM8 8h8M8 12h8M8 16h5\"/></svg>
                  ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 180
$context["section"], "id", [], "any", false, false, true, 180) == "services")) {
                    // line 181
                    yield "                    <svg viewBox=\"0 0 24 24\"><path d=\"M4 21h16M6 18h12M7 9v9M12 9v9M17 9v9M5 9h14L12 3z\"/></svg>
                  ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 182
$context["section"], "id", [], "any", false, false, true, 182) == "activities")) {
                    // line 183
                    yield "                    <svg viewBox=\"0 0 24 24\"><path d=\"M12 3a5 5 0 0 0-5 5v3l-2 4h14l-2-4V8a5 5 0 0 0-5-5ZM9 19h6\"/></svg>
                  ";
                } else {
                    // line 185
                    yield "                    <svg viewBox=\"0 0 24 24\"><path d=\"M4 19V9l8-5 8 5v10M2 19h20M8 19v-6h8v6\"/></svg>
                  ";
                }
                // line 187
                yield "                </span>
              </div>
              <h3>";
                // line 189
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["section"], "heading", [], "any", false, false, true, 189), "html", null, true);
                yield "</h3>
              ";
                // line 190
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["section"], "has_intro", [], "any", false, false, true, 190)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 191
                    yield "                <div class=\"homepage-feature__summary\">";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["section"], "intro", [], "any", false, false, true, 191), "html", null, true);
                    yield "</div>
              ";
                }
                // line 193
                yield "              ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["section"], "link", [], "any", false, false, true, 193)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 194
                    yield "                <a class=\"homepage-feature__link\" href=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["section"], "link", [], "any", false, false, true, 194), "url", [], "any", false, false, true, 194), "html", null, true);
                    yield "\">
                  <span>";
                    // line 195
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["section"], "link", [], "any", false, false, true, 195), "title", [], "any", false, false, true, 195), "html", null, true);
                    yield "</span>
                  <svg viewBox=\"0 0 24 24\" aria-hidden=\"true\"><path d=\"M5 12h14M13 6l6 6-6 6\"/></svg>
                </a>
              ";
                }
                // line 199
                yield "            </article>
          ";
            }
            // line 201
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['section'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 202
        yield "      </div>
    </div>
  </section>

  ";
        // line 206
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_hero_label", "field_hero_title", "field_hero_summary", "field_hero_image", "field_hero_link", "field_search_heading", "field_search_placeholder", "field_quick_links", "field_notices_heading", "field_updates_heading", "field_updates_intro", "field_updates_link", "field_services_heading", "field_services_intro", "field_services_link", "field_activities_heading", "field_activities_intro", "field_activities_link", "field_projects_heading", "field_projects_intro", "field_projects_link"), "html", null, true);
        // line 228
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "content", "attributes", "title_prefix", "title_suffix", "homepage_slider", "loop", "public_notices", "current_president"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--homepage--full.html.twig";
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
        return array (  476 => 228,  474 => 206,  468 => 202,  461 => 201,  457 => 199,  450 => 195,  445 => 194,  442 => 193,  436 => 191,  434 => 190,  430 => 189,  426 => 187,  422 => 185,  418 => 183,  416 => 182,  413 => 181,  411 => 180,  408 => 179,  406 => 178,  401 => 176,  395 => 174,  392 => 173,  388 => 172,  382 => 169,  378 => 168,  372 => 164,  366 => 161,  361 => 160,  359 => 159,  356 => 158,  349 => 154,  342 => 150,  338 => 149,  333 => 147,  327 => 143,  325 => 142,  322 => 141,  316 => 137,  297 => 133,  292 => 131,  286 => 129,  269 => 128,  263 => 125,  256 => 122,  253 => 116,  251 => 115,  243 => 110,  237 => 107,  230 => 103,  224 => 102,  219 => 100,  215 => 99,  211 => 98,  207 => 97,  203 => 96,  199 => 95,  195 => 94,  191 => 93,  186 => 91,  182 => 90,  177 => 88,  173 => 87,  166 => 82,  159 => 77,  153 => 73,  147 => 71,  145 => 70,  135 => 69,  131 => 67,  124 => 63,  119 => 62,  116 => 61,  110 => 59,  108 => 58,  103 => 57,  97 => 55,  95 => 54,  90 => 51,  84 => 49,  82 => 48,  77 => 46,  73 => 45,  69 => 44,  66 => 43,  64 => 40,  63 => 39,  62 => 38,  61 => 37,  60 => 32,  59 => 31,  58 => 30,  57 => 29,  56 => 24,  55 => 23,  54 => 22,  53 => 21,  52 => 16,  51 => 15,  50 => 14,  49 => 13,  48 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--homepage--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--homepage--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 48, "for" => 128];
        static $filters = ["escape" => 44, "t" => 87, "default" => 131, "without" => 206];
        static $functions = ["path" => 90];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if", 2 => "for"],
                [0 => "escape", 1 => "t", 2 => "default", 3 => "without"],
                [0 => "path"],
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
