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

/* themes/custom/ob/templates/content/node--kv20.html.twig */
class __TwigTemplate_95a6c7a245ce8b846eed29e8a21b93cf extends Template
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
        $context["has_hero"] =  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_hero_image", [], "any", false, false, true, 2), "isEmpty", [], "any", false, false, true, 2)) && $tmp instanceof Markup ? (string) $tmp : $tmp);
        // line 3
        $context["has_gallery"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_gallery_images"], "method", false, false, true, 3)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_gallery_images", [], "any", false, false, true, 3), "isEmpty", [], "any", false, false, true, 3)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 4
        $context["has_owner"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_content_owner"], "method", false, false, true, 4)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_content_owner", [], "any", false, false, true, 4), "isEmpty", [], "any", false, false, true, 4)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 5
        $context["has_review_date"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_last_reviewed"], "method", false, false, true, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_last_reviewed", [], "any", false, false, true, 5), "isEmpty", [], "any", false, false, true, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 6
        yield "
<article";
        // line 7
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["menu-section-page", "kv20-page"], "method", false, false, true, 7), "html", null, true);
        yield ">
  ";
        // line 8
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 9
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"menu-section-page__intro";
        // line 11
        if ((($tmp = ($context["has_hero"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " menu-section-page__intro--with-media";
        }
        yield "\">
    <div class=\"menu-section-page__intro-copy\">
      <p class=\"menu-section-page__eyebrow\">";
        // line 13
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "title", [], "any", false, false, true, 13), "html", null, true);
        yield "</p>
      <div class=\"menu-section-page__lead\">";
        // line 14
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary", [], "any", false, false, true, 14), "html", null, true);
        yield "</div>
      <dl class=\"kv20-page__facts\">
        <div><dt>";
        // line 16
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Vision period"));
        yield "</dt><dd>";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_vision_period", [], "any", false, false, true, 16), "html", null, true);
        yield "</dd></div>
        ";
        // line 17
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_document_version", [], "any", false, false, true, 17), "isEmpty", [], "any", false, false, true, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "          <div><dt>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Edition"));
            yield "</dt><dd>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_document_version", [], "any", false, false, true, 18), "html", null, true);
            yield "</dd></div>
        ";
        }
        // line 20
        yield "      </dl>
    </div>
    ";
        // line 22
        if ((($tmp = ($context["has_hero"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "      <div class=\"menu-section-page__media kv20-page__cover\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_hero_image", [], "any", false, false, true, 23), "html", null, true);
            yield "</div>
    ";
        }
        // line 25
        yield "  </header>

  <div class=\"menu-section-page__layout\">
    ";
        // line 28
        yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 28)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "kv20-section-navigation-heading"]));
        // line 31
        yield "
    <div class=\"menu-section-page__content\">
      <div class=\"menu-section-page__body kv20-page__body\">";
        // line 33
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 33), "html", null, true);
        yield "</div>

      ";
        // line 35
        if ((($tmp = ($context["kv20_documents"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "        <section class=\"kv20-documents\" aria-labelledby=\"kv20-documents-heading\">
          <div class=\"kv20-documents__heading\">
            <p>";
            // line 38
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Official publication"));
            yield "</p>
            <h2 id=\"kv20-documents-heading\">";
            // line 39
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Read the KV20"));
            yield "</h2>
          </div>
          ";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["kv20_documents"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["document"]) {
                // line 42
                yield "            <article class=\"kv20-document\">
              <div class=\"kv20-document__icon\" aria-hidden=\"true\"><i class=\"bi bi-file-earmark-pdf\"></i></div>
              <div class=\"kv20-document__details\">
                <h3>";
                // line 45
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "title", [], "any", false, false, true, 45), "html", null, true);
                yield "</h3>
                <p>
                  <span>";
                // line 47
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "type", [], "any", false, false, true, 47), "html", null, true);
                yield "</span>
                  <span>";
                // line 48
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "size", [], "any", false, false, true, 48), "html", null, true);
                yield "</span>
                  ";
                // line 49
                if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_language", [], "any", false, false, true, 49), "isEmpty", [], "any", false, false, true, 49)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span>";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_language", [], "any", false, false, true, 49), "html", null, true);
                    yield "</span>";
                }
                // line 50
                yield "                </p>
                ";
                // line 51
                if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_publication_date", [], "any", false, false, true, 51), "isEmpty", [], "any", false, false, true, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 52
                    yield "                  <div class=\"kv20-document__date\"><strong>";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Published"));
                    yield ":</strong> ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_publication_date", [], "any", false, false, true, 52), "html", null, true);
                    yield "</div>
                ";
                }
                // line 54
                yield "              </div>
              <div class=\"kv20-document__actions\">
                <a class=\"kv20-document__view\" href=\"";
                // line 56
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "url", [], "any", false, false, true, 56), "html", null, true);
                yield "\" target=\"_blank\" rel=\"noopener\">
                  <i class=\"bi bi-box-arrow-up-right\" aria-hidden=\"true\"></i>";
                // line 57
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("View PDF"));
                yield "
                </a>
                <a class=\"kv20-document__download\" href=\"";
                // line 59
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "url", [], "any", false, false, true, 59), "html", null, true);
                yield "\" download>
                  <i class=\"bi bi-download\" aria-hidden=\"true\"></i>";
                // line 60
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Download PDF"));
                yield "
                </a>
              </div>
            </article>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['document'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 65
            yield "        </section>
      ";
        }
        // line 67
        yield "
      ";
        // line 68
        if ((($tmp = ($context["has_gallery"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 69
            yield "        <section class=\"kv20-gallery\" aria-labelledby=\"kv20-gallery-heading\">
          <h2 id=\"kv20-gallery-heading\">";
            // line 70
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("KV20 in focus"));
            yield "</h2>
          ";
            // line 71
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_gallery_images", [], "any", false, false, true, 71), "html", null, true);
            yield "
        </section>
      ";
        }
        // line 74
        yield "
      ";
        // line 75
        if (((($tmp = ($context["has_owner"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = ($context["has_review_date"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 76
            yield "        <aside class=\"kv20-page__metadata\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Page information"));
            yield "\">
          ";
            // line 77
            if ((($tmp = ($context["has_owner"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<div><span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Content owner"));
                yield "</span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_content_owner", [], "any", false, false, true, 77), "html", null, true);
                yield "</div>";
            }
            // line 78
            yield "          ";
            if ((($tmp = ($context["has_review_date"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<div><span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last reviewed"));
                yield "</span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_last_reviewed", [], "any", false, false, true, 78), "html", null, true);
                yield "</div>";
            }
            // line 79
            yield "        </aside>
      ";
        }
        // line 81
        yield "
      ";
        // line 82
        if (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 82)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 83
            yield "        <nav class=\"section-page-pager\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Resources section pages"));
            yield "\">
          ";
            // line 84
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 84)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 85
                yield "            <div class=\"section-page-pager__item section-page-pager__item--previous\"><span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous"));
                yield "</span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 85), "link", [], "any", false, false, true, 85), "html", null, true);
                yield "</div>
          ";
            }
            // line 87
            yield "          ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 87)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 88
                yield "            <div class=\"section-page-pager__item section-page-pager__item--next\"><span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next"));
                yield "</span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 88), "link", [], "any", false, false, true, 88), "html", null, true);
                yield "</div>
          ";
            }
            // line 90
            yield "        </nav>
      ";
        }
        // line 92
        yield "    </div>
  </div>

  ";
        // line 95
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "field_hero_image", "body", "field_documents", "field_gallery_images", "field_vision_period", "field_publication_date", "field_document_version", "field_language", "field_content_owner", "field_last_reviewed", "field_featured_links", "field_call_to_action", "field_topics", "field_audience"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "attributes", "title_prefix", "title_suffix", "section_navigation", "content", "kv20_documents"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--kv20.html.twig";
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
        return array (  306 => 95,  301 => 92,  297 => 90,  289 => 88,  286 => 87,  278 => 85,  276 => 84,  271 => 83,  269 => 82,  266 => 81,  262 => 79,  253 => 78,  245 => 77,  240 => 76,  238 => 75,  235 => 74,  229 => 71,  225 => 70,  222 => 69,  220 => 68,  217 => 67,  213 => 65,  201 => 60,  197 => 59,  192 => 57,  188 => 56,  184 => 54,  176 => 52,  174 => 51,  171 => 50,  165 => 49,  161 => 48,  157 => 47,  152 => 45,  147 => 42,  143 => 41,  138 => 39,  134 => 38,  130 => 36,  128 => 35,  123 => 33,  119 => 31,  117 => 28,  112 => 25,  106 => 23,  104 => 22,  100 => 20,  92 => 18,  90 => 17,  84 => 16,  79 => 14,  75 => 13,  68 => 11,  63 => 9,  59 => 8,  55 => 7,  52 => 6,  50 => 5,  48 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--kv20.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--kv20.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "if" => 11, "include" => 28, "for" => 41];
        static $filters = ["escape" => 7, "t" => 16, "without" => 95];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if", 2 => "include", 3 => "for"],
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
