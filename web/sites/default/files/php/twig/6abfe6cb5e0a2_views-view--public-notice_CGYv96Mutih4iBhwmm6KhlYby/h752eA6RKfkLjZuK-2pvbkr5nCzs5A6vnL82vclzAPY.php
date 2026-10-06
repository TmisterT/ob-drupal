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

/* themes/custom/ob/templates/views/views-view--public-notices.html.twig */
class __TwigTemplate_294cb297d8a5d7baa506094b70b41803 extends Template
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
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["news-media-archive", "public-notices-archive", (((($tmp = ($context["dom_id"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("js-view-dom-id-" . ($context["dom_id"] ?? null))) : (""))], "method", false, false, true, 2), "html", null, true);
        yield ">
  ";
        // line 3
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"news-media-archive__intro\">
    <p class=\"news-media-archive__eyebrow\">";
        // line 7
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("News & Media"));
        yield "</p>
    ";
        // line 8
        if ((($tmp = ($context["header"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<div class=\"news-media-archive__lead\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["header"] ?? null), "html", null, true);
            yield "</div>";
        }
        // line 9
        yield "  </header>

  <div class=\"menu-section-page__layout news-media-archive__layout\">
    ";
        // line 12
        yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 12)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "notices-section-navigation-heading"]));
        // line 15
        yield "
    <div class=\"news-media-archive__main\">
      ";
        // line 17
        if ((($tmp = ($context["exposed"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "        <section class=\"news-media-archive__filters\" aria-labelledby=\"notices-filter-heading\">
          <h2 id=\"notices-filter-heading\">";
            // line 19
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Find a notice"));
            yield "</h2>
          ";
            // line 20
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["exposed"] ?? null), "html", null, true);
            yield "
        </section>
      ";
        }
        // line 23
        yield "
      ";
        // line 24
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_before"] ?? null), "html", null, true);
        yield "

      <div class=\"news-media-archive__results-heading\">
        <h2>";
        // line 27
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Current notices"));
        yield "</h2>
        <span aria-live=\"polite\">
          ";
        // line 29
        yield \Drupal::translation()->formatPlural(abs(CoreExtension::getAttribute($this->env, $this->source,         // line 31
($context["view"] ?? null), "total_rows", [], "any", false, false, true, 31)), "@view.total_rows notice", "@view.total_rows notices", ["@view.total_rows" => $this->env->getExtension(\Drupal\Core\Template\TwigExtension::class)->renderVar(CoreExtension::getAttribute($this->env, $this->source,         // line 30
($context["view"] ?? null), "total_rows", [], "any", false, false, true, 30)), "@view.total_rows" => $this->env->getExtension(\Drupal\Core\Template\TwigExtension::class)->renderVar(CoreExtension::getAttribute($this->env, $this->source,         // line 32
($context["view"] ?? null), "total_rows", [], "any", false, false, true, 32)), ]);
        // line 34
        yield "        </span>
      </div>

      ";
        // line 37
        if ((($tmp = ($context["rows"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "        <div class=\"public-notices-archive__list\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
            yield "</div>
      ";
        } elseif ((($tmp =         // line 39
($context["empty"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 40
            yield "        <div class=\"news-media-archive__empty\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["empty"] ?? null), "html", null, true);
            yield "</div>
      ";
        }
        // line 42
        yield "
      ";
        // line 43
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["pager"] ?? null), "html", null, true);
        yield "
      ";
        // line 44
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_after"] ?? null), "html", null, true);
        yield "
      ";
        // line 45
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["more"] ?? null), "html", null, true);
        yield "
      ";
        // line 46
        if ((($tmp = ($context["footer"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "<footer>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["footer"] ?? null), "html", null, true);
            yield "</footer>";
        }
        // line 47
        yield "      ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["feed_icons"] ?? null), "html", null, true);
        yield "
    </div>
  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "dom_id", "title_prefix", "title_suffix", "header", "exposed", "attachment_before", "view", "rows", "empty", "pager", "attachment_after", "more", "footer", "feed_icons"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/views/views-view--public-notices.html.twig";
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
        return array (  155 => 47,  149 => 46,  145 => 45,  141 => 44,  137 => 43,  134 => 42,  128 => 40,  126 => 39,  121 => 38,  119 => 37,  114 => 34,  112 => 32,  111 => 30,  110 => 31,  109 => 29,  104 => 27,  98 => 24,  95 => 23,  89 => 20,  85 => 19,  82 => 18,  80 => 17,  76 => 15,  74 => 12,  69 => 9,  63 => 8,  59 => 7,  53 => 4,  49 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/views/views-view--public-notices.html.twig", "/var/www/html/web/themes/custom/ob/templates/views/views-view--public-notices.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 8, "include" => 12, "trans" => 29];
        static $filters = ["escape" => 2, "t" => 7];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "include", 2 => "trans"],
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
