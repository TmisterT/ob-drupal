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

/* themes/custom/ob/templates/content/node--history-of-presidents.html.twig */
class __TwigTemplate_4cd663e0ec01cdb46e138bdbd0334a66 extends Template
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
        $context["has_image"] =  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_featured_image", [], "any", false, false, true, 7), "isEmpty", [], "any", false, false, true, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp);
        // line 8
        yield "<article";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["presidents-page"], "method", false, false, true, 8), "html", null, true);
        yield ">
  ";
        // line 9
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 10
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"menu-section-page__intro";
        // line 12
        if ((($tmp = ($context["has_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " menu-section-page__intro--with-media";
        }
        yield "\">
    <div class=\"menu-section-page__intro-copy\">
      <p class=\"menu-section-page__eyebrow\">";
        // line 14
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "title", [], "any", false, false, true, 14), "html", null, true);
        yield "</p>
      <div class=\"menu-section-page__lead\">";
        // line 15
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary", [], "any", false, false, true, 15), "html", null, true);
        yield "</div>
    </div>
    ";
        // line 17
        if ((($tmp = ($context["has_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "      <div class=\"menu-section-page__media\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 18), "html", null, true);
            yield "</div>
    ";
        }
        // line 20
        yield "  </header>

  <div class=\"menu-section-page__layout\">
    ";
        // line 23
        yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 23)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "presidents-section-navigation-heading"]));
        // line 26
        yield "
    <div class=\"menu-section-page__content\">
      <div class=\"presidents-page__introduction\">";
        // line 28
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 28), "html", null, true);
        yield "</div>

      <section class=\"presidents-directory\" aria-labelledby=\"presidents-directory-heading\">
        <div class=\"presidents-directory__heading\">
          <p>";
        // line 32
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("National leadership"));
        yield "</p>
          <h2 id=\"presidents-directory-heading\">";
        // line 33
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Presidents of Kiribati"));
        yield "</h2>
        </div>
        ";
        // line 35
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["presidents_history"] ?? null), "html", null, true);
        yield "
      </section>

      ";
        // line 38
        if (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 39
            yield "        <nav class=\"section-page-pager\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Government section pages"));
            yield "\">
          ";
            // line 40
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 41
                yield "            <div class=\"section-page-pager__item section-page-pager__item--previous\">
              <span>";
                // line 42
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous"));
                yield "</span>
              ";
                // line 43
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "previous", [], "any", false, false, true, 43), "link", [], "any", false, false, true, 43), "html", null, true);
                yield "
            </div>
          ";
            }
            // line 46
            yield "          ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 46)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 47
                yield "            <div class=\"section-page-pager__item section-page-pager__item--next\">
              <span>";
                // line 48
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next"));
                yield "</span>
              ";
                // line 49
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "next", [], "any", false, false, true, 49), "link", [], "any", false, false, true, 49), "html", null, true);
                yield "
            </div>
          ";
            }
            // line 52
            yield "        </nav>
      ";
        }
        // line 54
        yield "    </div>
  </div>

  ";
        // line 57
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "field_featured_image", "body", "field_documents", "field_related_links", "field_topics", "field_audience", "field_content_owner", "field_last_reviewed"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "attributes", "title_prefix", "title_suffix", "section_navigation", "content", "presidents_history"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--history-of-presidents.html.twig";
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
        return array (  164 => 57,  159 => 54,  155 => 52,  149 => 49,  145 => 48,  142 => 47,  139 => 46,  133 => 43,  129 => 42,  126 => 41,  124 => 40,  119 => 39,  117 => 38,  111 => 35,  106 => 33,  102 => 32,  95 => 28,  91 => 26,  89 => 23,  84 => 20,  78 => 18,  76 => 17,  71 => 15,  67 => 14,  60 => 12,  55 => 10,  51 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--history-of-presidents.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--history-of-presidents.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 12, "include" => 23];
        static $filters = ["escape" => 8, "t" => 32, "without" => 57];
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
