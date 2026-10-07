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

/* themes/custom/ob/templates/content/node--landing-page--projects.html.twig */
class __TwigTemplate_d8b92a63753d55c7470bb6dfef8b0106 extends Template
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
        // line 1
        yield "<article";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["projects-archive", "menu-section-page"], "method", false, false, true, 1), "html", null, true);
        yield ">
  ";
        // line 2
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "
  <header class=\"menu-section-page__intro\">
    <p class=\"projects-archive__eyebrow\">";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Projects & initiatives"));
        yield "</p>
    ";
        // line 5
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_summary", [], "any", false, false, true, 5), "html", null, true);
        yield "
  </header>
  <div class=\"menu-section-page__layout";
        // line 7
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "links", [], "any", false, false, true, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (" projects-archive__layout--without-navigation") : ("")));
        yield "\">
    ";
        // line 8
        yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 8)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "projects-section-navigation-heading"]));
        // line 9
        yield "    <div class=\"projects-archive__main\">
      <div class=\"projects-archive__intro\">";
        // line 10
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 10), "html", null, true);
        yield "</div>
      <h2>";
        // line 11
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Explore projects and initiatives"));
        yield "</h2>
      ";
        // line 12
        if ((($tmp = ($context["project_cards"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 13
            yield "        <div class=\"projects-archive__grid\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["project_cards"] ?? null), "html", null, true);
            yield "</div>
        ";
            // line 14
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["project_pager"] ?? null), "html", null, true);
            yield "
      ";
        } else {
            // line 16
            yield "        <p class=\"projects-archive__empty\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No projects or initiatives have been published yet. Please check back for updates."));
            yield "</p>
        ";
            // line 17
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["project_pager"] ?? null), "html", null, true);
            yield "
      ";
        }
        // line 19
        yield "    </div>
  </div>
  ";
        // line 21
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "body", "links"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "title_prefix", "title_suffix", "content", "section_navigation", "project_cards", "project_pager"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--landing-page--projects.html.twig";
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
        return array (  107 => 21,  103 => 19,  98 => 17,  93 => 16,  88 => 14,  83 => 13,  81 => 12,  77 => 11,  73 => 10,  70 => 9,  68 => 8,  64 => 7,  59 => 5,  55 => 4,  49 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--landing-page--projects.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--landing-page--projects.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 8, "if" => 12];
        static $filters = ["escape" => 1, "t" => 4, "without" => 21];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "include", 1 => "if"],
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
