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

/* @ob/templates/content/service-page--header.html.twig */
class __TwigTemplate_050f7f2087e13060012117cba5ff7043 extends Template
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
        $context["has_section_nav"] =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "links", [], "any", false, false, true, 1));
        // line 2
        yield "<header class=\"service-page__intro\">
  <div class=\"service-page__intro-copy\">
    <p class=\"menu-section-page__eyebrow\">";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "title", [], "any", false, false, true, 4), "html", null, true);
        yield "</p>
    <p class=\"service-page__summary\">";
        // line 5
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "summary", [], "any", false, false, true, 5), "html", null, true);
        yield "</p>
    ";
        // line 6
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "status", [], "any", false, false, true, 6)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 7
            yield "      <div class=\"service-page__availability\">
        <span class=\"service-status service-status--";
            // line 8
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "status_key", [], "any", false, false, true, 8)), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "status", [], "any", false, false, true, 8), "html", null, true);
            yield "</span>
        ";
            // line 9
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "opening_date", [], "any", false, false, true, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<span><strong>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Opens"));
                yield ":</strong> ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "opening_date", [], "any", false, false, true, 9), "html", null, true);
                yield "</span>";
            }
            // line 10
            yield "        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "closing_date", [], "any", false, false, true, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<span><strong>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Closes"));
                yield ":</strong> ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "closing_date", [], "any", false, false, true, 10), "html", null, true);
                yield "</span>";
            }
            // line 11
            yield "      </div>
    ";
        }
        // line 13
        yield "  </div>
</header>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["section_navigation", "service_details"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ob/templates/content/service-page--header.html.twig";
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
        return array (  90 => 13,  86 => 11,  77 => 10,  69 => 9,  63 => 8,  60 => 7,  58 => 6,  54 => 5,  50 => 4,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ob/templates/content/service-page--header.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/service-page--header.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 1, "if" => 6];
        static $filters = ["escape" => 4, "clean_class" => 8, "t" => 9];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if"],
                [0 => "escape", 1 => "clean_class", 2 => "t"],
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
