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

/* themes/custom/ob/templates/content/node--basic-page--full.html.twig */
class __TwigTemplate_ae93b808cacdaf6058a5a26ce78d26f1 extends Template
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
        yield "<article";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["content-page", "basic-page"], "method", false, false, true, 7), "html", null, true);
        yield ">
  ";
        // line 8
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 9
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"content-page__intro";
        // line 11
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_featured_image", [], "any", false, false, true, 11), "isEmpty", [], "any", false, false, true, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " content-page__intro--with-media";
        }
        yield "\">
    <div class=\"content-page__lead\">";
        // line 12
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary", [], "any", false, false, true, 12), "html", null, true);
        yield "</div>
    ";
        // line 13
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_featured_image", [], "any", false, false, true, 13), "isEmpty", [], "any", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "      <div class=\"content-page__media\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 14), "html", null, true);
            yield "</div>
    ";
        }
        // line 16
        yield "  </header>

  <div class=\"content-page__body\">";
        // line 18
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 18), "html", null, true);
        yield "</div>

  ";
        // line 20
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_documents", [], "any", false, false, true, 20), "isEmpty", [], "any", false, false, true, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 21
            yield "    <section class=\"content-page__section\" aria-labelledby=\"page-documents-heading\">
      <h2 id=\"page-documents-heading\">";
            // line 22
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Documents"));
            yield "</h2>
      ";
            // line 23
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_documents", [], "any", false, false, true, 23), "html", null, true);
            yield "
    </section>
  ";
        }
        // line 26
        yield "
  ";
        // line 27
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_related_links", [], "any", false, false, true, 27), "isEmpty", [], "any", false, false, true, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "    <section class=\"content-page__section content-page__section--links\" aria-labelledby=\"related-links-heading\">
      <h2 id=\"related-links-heading\">";
            // line 29
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Related links"));
            yield "</h2>
      ";
            // line 30
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_related_links", [], "any", false, false, true, 30), "html", null, true);
            yield "
    </section>
  ";
        }
        // line 33
        yield "
  <aside class=\"content-page__metadata\" aria-label=\"";
        // line 34
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Page information"));
        yield "\">
    ";
        // line 35
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_topics", [], "any", false, false, true, 35), "isEmpty", [], "any", false, false, true, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "      <div>
        <h2>";
            // line 37
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Topics"));
            yield "</h2>
        ";
            // line 38
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_topics", [], "any", false, false, true, 38), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 41
        yield "    ";
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_audience", [], "any", false, false, true, 41), "isEmpty", [], "any", false, false, true, 41)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 42
            yield "      <div>
        <h2>";
            // line 43
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Audience"));
            yield "</h2>
        ";
            // line 44
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_audience", [], "any", false, false, true, 44), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 47
        yield "    <div>
      <h2>";
        // line 48
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Content owner"));
        yield "</h2>
      ";
        // line 49
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_content_owner", [], "any", false, false, true, 49), "html", null, true);
        yield "
    </div>
    <div>
      <h2>";
        // line 52
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last reviewed"));
        yield "</h2>
      ";
        // line 53
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_last_reviewed", [], "any", false, false, true, 53), "html", null, true);
        yield "
    </div>
  </aside>

  ";
        // line 57
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "field_featured_image", "body", "field_documents", "field_related_links", "field_topics", "field_audience", "field_content_owner", "field_last_reviewed"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "title_prefix", "title_suffix", "node", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--basic-page--full.html.twig";
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
        return array (  180 => 57,  173 => 53,  169 => 52,  163 => 49,  159 => 48,  156 => 47,  150 => 44,  146 => 43,  143 => 42,  140 => 41,  134 => 38,  130 => 37,  127 => 36,  125 => 35,  121 => 34,  118 => 33,  112 => 30,  108 => 29,  105 => 28,  103 => 27,  100 => 26,  94 => 23,  90 => 22,  87 => 21,  85 => 20,  80 => 18,  76 => 16,  70 => 14,  68 => 13,  64 => 12,  58 => 11,  53 => 9,  49 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--basic-page--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--basic-page--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 11];
        static $filters = ["escape" => 7, "t" => 22, "without" => 57];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if"],
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
