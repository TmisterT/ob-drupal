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

/* @ob/templates/page/site-shell.html.twig */
class __TwigTemplate_dfa36172b83d23a3eb5d3abf8ba4d938 extends Template
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
        yield "<div class=\"ob-site ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = ($context["is_front"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("ob-site--front") : ("ob-site--internal")));
        yield "\">
  <header class=\"site-header\">
    ";
        // line 9
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "utility", [], "any", false, false, true, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "      <div class=\"government-bar\">
        <div class=\"container government-bar__inner\">";
            // line 11
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "utility", [], "any", false, false, true, 11), "html", null, true);
            yield "</div>
      </div>
    ";
        }
        // line 14
        yield "
    <div class=\"identity-bar\">
      <div class=\"container identity-bar__inner\">
        ";
        // line 17
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 17), "html", null, true);
        yield "
        <nav class=\"primary-navigation navbar navbar-expand-xl\" aria-label=\"";
        // line 18
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Main navigation"));
        yield "\">
          <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#ob-main-navigation\" aria-controls=\"ob-main-navigation\" aria-expanded=\"false\" aria-label=\"";
        // line 19
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Toggle navigation"));
        yield "\">
            <span class=\"navbar-toggler-icon\"></span>
            <span class=\"primary-navigation__toggle-label\">";
        // line 21
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Menu"));
        yield "</span>
          </button>
          <div class=\"collapse navbar-collapse\" id=\"ob-main-navigation\">
            ";
        // line 24
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 24), "html", null, true);
        yield "
          </div>
        </nav>
      </div>
    </div>
  </header>

  ";
        // line 31
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "alerts", [], "any", false, false, true, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "    <div class=\"site-alerts\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "alerts", [], "any", false, false, true, 32), "html", null, true);
            yield "</div>
  ";
        }
        // line 34
        yield "
  ";
        // line 35
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "    <div class=\"site-system-region\">
      <div class=\"container\">";
            // line 37
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 37), "html", null, true);
            yield "</div>
    </div>
  ";
        }
        // line 40
        yield "
  <main id=\"main-content\" class=\"";
        // line 41
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = ($context["is_front"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("homepage-main") : ("site-main")));
        yield "\">
    ";
        // line 42
        if ((($tmp = ($context["is_front"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 43
            yield "      ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 43), "html", null, true);
            yield "
    ";
        } else {
            // line 45
            yield "      <div class=\"container site-main__inner\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 45), "html", null, true);
            yield "</div>
    ";
        }
        // line 47
        yield "  </main>

  <footer class=\"site-footer\">
    <div class=\"container site-footer__grid\">
      <div class=\"site-footer__about\">";
        // line 51
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_about", [], "any", false, false, true, 51), "html", null, true);
        yield "</div>
      <div class=\"site-footer__navigation\">";
        // line 52
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_navigation", [], "any", false, false, true, 52), "html", null, true);
        yield "</div>
      <div class=\"site-footer__contact\">";
        // line 53
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_contact", [], "any", false, false, true, 53), "html", null, true);
        yield "</div>
    </div>
    <div class=\"site-footer__base\">
      <div class=\"container site-footer__base-inner\">
        <span class=\"site-footer__copyright\">&copy; ";
        // line 57
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " ";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["site_name"] ?? null), "html", null, true);
        yield "</span>
        <div class=\"site-footer__bottom\">";
        // line 58
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 58), "html", null, true);
        yield "</div>
      </div>
    </div>
  </footer>

  ";
        // line 63
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "page_bottom", [], "any", false, false, true, 63), "html", null, true);
        yield "
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["is_front", "page", "site_name"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ob/templates/page/site-shell.html.twig";
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
        return array (  173 => 63,  165 => 58,  159 => 57,  152 => 53,  148 => 52,  144 => 51,  138 => 47,  132 => 45,  126 => 43,  124 => 42,  120 => 41,  117 => 40,  111 => 37,  108 => 36,  106 => 35,  103 => 34,  97 => 32,  95 => 31,  85 => 24,  79 => 21,  74 => 19,  70 => 18,  66 => 17,  61 => 14,  55 => 11,  52 => 10,  50 => 9,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ob/templates/page/site-shell.html.twig", "/var/www/html/web/themes/custom/ob/templates/page/site-shell.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 9];
        static $filters = ["escape" => 11, "t" => 18, "date" => 57];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if"],
                [0 => "escape", 1 => "t", 2 => "date"],
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
