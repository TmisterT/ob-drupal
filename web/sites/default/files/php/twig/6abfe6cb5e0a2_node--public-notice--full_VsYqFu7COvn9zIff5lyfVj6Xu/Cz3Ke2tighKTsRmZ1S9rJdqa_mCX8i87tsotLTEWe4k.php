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

/* themes/custom/ob/templates/content/node--public-notice--full--public-holiday.html.twig */
class __TwigTemplate_330e229e958285e7e3f6a708cac0128b extends Template
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
        $context["notice_link"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_notice_link", [], "any", false, false, true, 2), 0, [], "any", false, false, true, 2);
        // line 3
        yield "<article";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["content-page", "public-notice-page", "public-holiday"], "method", false, false, true, 3), "html", null, true);
        yield ">
  ";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "
  <header class=\"public-notice-page__header public-holiday__header\">
    ";
        // line 6
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_notice_summary", [], "any", false, false, true, 6), "isEmpty", [], "any", false, false, true, 6)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "      <div class=\"content-page__lead public-holiday__summary\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_notice_summary", [], "any", false, false, true, 7), "html", null, true);
            yield "</div>
    ";
        }
        // line 9
        yield "  </header>

  <section class=\"public-holiday__schedule\" aria-label=\"";
        // line 11
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Public holidays"));
        yield "\">
    <div class=\"content-page__body public-holiday__table-wrap\">";
        // line 12
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 12), "html", null, true);
        yield "</div>
  </section>

  ";
        // line 15
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_notice_category", "field_notice_date", "field_notice_summary", "field_notice_urgent", "field_notice_link", "body", "links"), "html", null, true);
        yield "

  ";
        // line 17
        if ((($tmp = ($context["notice_link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "    <div class=\"public-holiday__related\">
      <h2>";
            // line 19
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Related information"));
            yield "</h2>
      <a href=\"";
            // line 20
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["notice_link"] ?? null), "url", [], "any", false, false, true, 20), "html", null, true);
            yield "\">";
            yield (string) (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["notice_link"] ?? null), "title", [], "any", false, false, true, 20)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["notice_link"] ?? null), "title", [], "any", false, false, true, 20), "html", null, true)) : (t("View related information")));
            yield "</a>
    </div>
  ";
        }
        // line 23
        yield "
  <footer class=\"public-holiday__footer\">
    <a href=\"";
        // line 25
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("view.public_notices.page_1"));
        yield "\">";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("All public notices"));
        yield "</a>
  </footer>
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "attributes", "title_prefix", "title_suffix", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--public-notice--full--public-holiday.html.twig";
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
        return array (  105 => 25,  101 => 23,  93 => 20,  89 => 19,  86 => 18,  84 => 17,  79 => 15,  73 => 12,  69 => 11,  65 => 9,  59 => 7,  57 => 6,  51 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--public-notice--full--public-holiday.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--public-notice--full--public-holiday.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "if" => 6];
        static $filters = ["escape" => 3, "t" => 11, "without" => 15];
        static $functions = ["path" => 25];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if"],
                [0 => "escape", 1 => "t", 2 => "without"],
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
