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

/* @ob/templates/content/node--menu-section-page.html.twig */
class __TwigTemplate_8ed984a87e202769e327cb118ace4b4e extends Template
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
        $context["has_featured_image"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_featured_image"], "method", false, false, true, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_featured_image"], "method", false, false, true, 7), "isEmpty", [], "method", false, false, true, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 8
        $context["has_hero_image"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_hero_image"], "method", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_hero_image"], "method", false, false, true, 8), "isEmpty", [], "method", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 9
        $context["has_summary"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_summary"], "method", false, false, true, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_summary"], "method", false, false, true, 9), "isEmpty", [], "method", false, false, true, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 10
        $context["has_documents"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_documents"], "method", false, false, true, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_documents"], "method", false, false, true, 10), "isEmpty", [], "method", false, false, true, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 11
        $context["has_related_links"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_related_links"], "method", false, false, true, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_related_links"], "method", false, false, true, 11), "isEmpty", [], "method", false, false, true, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 12
        $context["has_featured_links"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_featured_links"], "method", false, false, true, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_featured_links"], "method", false, false, true, 12), "isEmpty", [], "method", false, false, true, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 13
        $context["has_call_to_action"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_call_to_action"], "method", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "get", ["field_call_to_action"], "method", false, false, true, 13), "isEmpty", [], "method", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 14
        yield "
<article";
        // line 15
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["menu-section-page", ("menu-section-page--" . CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "section_key", [], "any", false, false, true, 15))], "method", false, false, true, 15), "html", null, true);
        yield ">
  ";
        // line 16
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 17
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"menu-section-page__intro";
        // line 19
        if (((($tmp = ($context["has_featured_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = ($context["has_hero_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            yield " menu-section-page__intro--with-media";
        }
        yield "\">
    <div class=\"menu-section-page__intro-copy\">
      <p class=\"menu-section-page__eyebrow\">";
        // line 21
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "title", [], "any", false, false, true, 21), "html", null, true);
        yield "</p>
      ";
        // line 22
        if ((($tmp = ($context["has_summary"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "        <div class=\"menu-section-page__lead\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary", [], "any", false, false, true, 23), "html", null, true);
            yield "</div>
      ";
        }
        // line 25
        yield "    </div>
    ";
        // line 26
        if (((($tmp = ($context["has_featured_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = ($context["has_hero_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 27
            yield "      <div class=\"menu-section-page__media\">
        ";
            // line 28
            yield (string) (((($tmp = ($context["has_featured_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 28), "html", null, true)) : ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_hero_image", [], "any", false, false, true, 28), "html", null, true)));
            yield "
      </div>
    ";
        }
        // line 31
        yield "  </header>

  <div class=\"menu-section-page__layout\">
    ";
        // line 34
        yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 34)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "section-navigation-heading"]));
        // line 37
        yield "
    <div class=\"menu-section-page__content\">
      <div class=\"menu-section-page__body\">";
        // line 39
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 39), "html", null, true);
        yield "</div>

      ";
        // line 41
        if ((($tmp = ($context["has_featured_links"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 42
            yield "        <section class=\"menu-section-page__section menu-section-page__section--links\" aria-labelledby=\"section-featured-links-heading\">
          <h2 id=\"section-featured-links-heading\">";
            // line 43
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("In this section"));
            yield "</h2>
          ";
            // line 44
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_links", [], "any", false, false, true, 44), "html", null, true);
            yield "
        </section>
      ";
        }
        // line 47
        yield "
      ";
        // line 48
        if ((($tmp = ($context["has_documents"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "        <section class=\"menu-section-page__section\" aria-labelledby=\"section-documents-heading\">
          <h2 id=\"section-documents-heading\">";
            // line 50
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Documents"));
            yield "</h2>
          ";
            // line 51
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_documents", [], "any", false, false, true, 51), "html", null, true);
            yield "
        </section>
      ";
        }
        // line 54
        yield "
      ";
        // line 55
        if ((($tmp = ($context["has_related_links"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 56
            yield "        <section class=\"menu-section-page__section menu-section-page__section--links\" aria-labelledby=\"section-related-links-heading\">
          <h2 id=\"section-related-links-heading\">";
            // line 57
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Related links"));
            yield "</h2>
          ";
            // line 58
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_related_links", [], "any", false, false, true, 58), "html", null, true);
            yield "
        </section>
      ";
        }
        // line 61
        yield "
      ";
        // line 62
        if ((($tmp = ($context["has_call_to_action"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 63
            yield "        <div class=\"menu-section-page__action\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_call_to_action", [], "any", false, false, true, 63), "html", null, true);
            yield "</div>
      ";
        }
        // line 65
        yield "
      ";
        // line 66
        if (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 67
            yield "        <nav class=\"section-page-pager\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Section pages"));
            yield "\">
          ";
            // line 68
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 68)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 69
                yield "            <div class=\"section-page-pager__item section-page-pager__item--previous\">
              <span>";
                // line 70
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous"));
                yield "</span>
              ";
                // line 71
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 71), "link", [], "any", false, false, true, 71), "html", null, true);
                yield "
            </div>
          ";
            }
            // line 74
            yield "          ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 74)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 75
                yield "            <div class=\"section-page-pager__item section-page-pager__item--next\">
              <span>";
                // line 76
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next"));
                yield "</span>
              ";
                // line 77
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 77), "link", [], "any", false, false, true, 77), "html", null, true);
                yield "
            </div>
          ";
            }
            // line 80
            yield "        </nav>
      ";
        }
        // line 82
        yield "    </div>
  </div>

  ";
        // line 85
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "field_featured_image", "field_hero_image", "body", "field_featured_links", "field_documents", "field_related_links", "field_call_to_action"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "attributes", "section_navigation", "title_prefix", "title_suffix", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ob/templates/content/node--menu-section-page.html.twig";
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
        return array (  235 => 85,  230 => 82,  226 => 80,  220 => 77,  216 => 76,  213 => 75,  210 => 74,  204 => 71,  200 => 70,  197 => 69,  195 => 68,  190 => 67,  188 => 66,  185 => 65,  179 => 63,  177 => 62,  174 => 61,  168 => 58,  164 => 57,  161 => 56,  159 => 55,  156 => 54,  150 => 51,  146 => 50,  143 => 49,  141 => 48,  138 => 47,  132 => 44,  128 => 43,  125 => 42,  123 => 41,  118 => 39,  114 => 37,  112 => 34,  107 => 31,  101 => 28,  98 => 27,  96 => 26,  93 => 25,  87 => 23,  85 => 22,  81 => 21,  74 => 19,  69 => 17,  65 => 16,  61 => 15,  58 => 14,  56 => 13,  54 => 12,  52 => 11,  50 => 10,  48 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ob/templates/content/node--menu-section-page.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--menu-section-page.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 19, "include" => 34];
        static $filters = ["escape" => 15, "t" => 43, "without" => 85];
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
