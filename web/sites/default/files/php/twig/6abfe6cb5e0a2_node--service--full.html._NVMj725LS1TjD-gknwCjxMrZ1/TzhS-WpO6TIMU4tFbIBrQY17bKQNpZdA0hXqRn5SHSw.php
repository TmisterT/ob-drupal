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

/* themes/custom/ob/templates/content/node--service--full.html.twig */
class __TwigTemplate_3823b1aeb8f1925f2b961029a261aac8 extends Template
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
        $context["has_section_nav"] =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "links", [], "any", false, false, true, 2));
        // line 3
        yield "<article";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["menu-section-page", "service-page", "service-page--standard"], "method", false, false, true, 3), "html", null, true);
        yield ">
  ";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 5
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  ";
        // line 7
        yield from $this->load("@ob/templates/content/service-page--header.html.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "
  <div class=\"menu-section-page__layout";
        // line 9
        if ( !(($tmp = ($context["has_section_nav"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " menu-section-page__layout--without-nav";
        }
        yield "\">
    ";
        // line 10
        if ((($tmp = ($context["has_section_nav"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 11
            yield "      ";
            yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 11)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "service-section-navigation-heading"]));
            // line 14
            yield "    ";
        }
        // line 15
        yield "
    <div class=\"menu-section-page__content service-page__content\">
      ";
        // line 17
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "body", [], "any", false, false, true, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "        <details class=\"service-disclosure service-page__overview\">
          <summary>
            <span>";
            // line 20
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("About this service"));
            yield "</span>
            <span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span>
          </summary>
          <div class=\"service-disclosure__content menu-section-page__body\">";
            // line 23
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "body", [], "any", false, false, true, 23), "html", null, true);
            yield "</div>
        </details>
      ";
        }
        // line 26
        yield "
      ";
        // line 27
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "eligibility", [], "any", false, false, true, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "        <details class=\"service-disclosure service-page__section\">
          <summary><span>";
            // line 29
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Who can apply"));
            yield "</span><span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span></summary>
          <div class=\"service-disclosure__content\">";
            // line 30
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "eligibility", [], "any", false, false, true, 30), "html", null, true);
            yield "</div>
        </details>
      ";
        }
        // line 33
        yield "
      ";
        // line 34
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "requirements", [], "any", false, false, true, 34)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "        <details class=\"service-disclosure service-page__section\">
          <summary><span>";
            // line 36
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("What you need"));
            yield "</span><span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span></summary>
          <div class=\"service-disclosure__content\">";
            // line 37
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "requirements", [], "any", false, false, true, 37), "html", null, true);
            yield "</div>
        </details>
      ";
        }
        // line 40
        yield "
      ";
        // line 41
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "steps", [], "any", false, false, true, 41)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 42
            yield "        <details class=\"service-disclosure service-page__section service-process\">
          <summary>
            <span>";
            // line 44
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("How to apply"));
            yield "</span>
            <span class=\"service-disclosure__count\">";
            // line 45
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "steps", [], "any", false, false, true, 45)), "html", null, true);
            yield " ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("steps"));
            yield "</span>
            <span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span>
          </summary>
          <div class=\"service-disclosure__content\">
            <ol>
              ";
            // line 50
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "steps", [], "any", false, false, true, 50));
            foreach ($context['_seq'] as $context["_key"] => $context["step"]) {
                // line 51
                yield "                <li><span aria-hidden=\"true\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["step"], "number", [], "any", false, false, true, 51), "html", null, true);
                yield "</span><div>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["step"], "content", [], "any", false, false, true, 51), "html", null, true);
                yield "</div></li>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['step'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 53
            yield "            </ol>
          </div>
        </details>
      ";
        }
        // line 57
        yield "
      ";
        // line 58
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "processing", [], "any", false, false, true, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "        <details class=\"service-disclosure service-page__section\">
          <summary><span>";
            // line 60
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("What happens next"));
            yield "</span><span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span></summary>
          <div class=\"service-disclosure__content\">";
            // line 61
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "processing", [], "any", false, false, true, 61), "html", null, true);
            yield "</div>
        </details>
      ";
        }
        // line 64
        yield "
      ";
        // line 65
        yield from $this->load("@ob/templates/content/service-page--footer.html.twig", 65)->unwrap()->yield($context);
        // line 66
        yield "    </div>
  </div>

  ";
        // line 69
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "field_service_category", "field_audience", "field_application_status", "field_opening_date", "field_closing_date", "body", "field_eligibility", "field_requirements", "field_application_steps", "field_processing_info", "field_documents", "field_service_link", "field_contact_email", "field_featured_image", "field_featured", "field_content_owner", "field_last_reviewed"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["section_navigation", "attributes", "title_prefix", "title_suffix", "service_details", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--service--full.html.twig";
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
        return array (  210 => 69,  205 => 66,  203 => 65,  200 => 64,  194 => 61,  190 => 60,  187 => 59,  185 => 58,  182 => 57,  176 => 53,  164 => 51,  160 => 50,  150 => 45,  146 => 44,  142 => 42,  140 => 41,  137 => 40,  131 => 37,  127 => 36,  124 => 35,  122 => 34,  119 => 33,  113 => 30,  109 => 29,  106 => 28,  104 => 27,  101 => 26,  95 => 23,  89 => 20,  85 => 18,  83 => 17,  79 => 15,  76 => 14,  73 => 11,  71 => 10,  65 => 9,  62 => 8,  60 => 7,  55 => 5,  51 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--service--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--service--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "include" => 7, "if" => 9, "for" => 50];
        static $filters = ["escape" => 3, "t" => 20, "length" => 45, "without" => 69];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "include", 2 => "if", 3 => "for"],
                [0 => "escape", 1 => "t", 2 => "length", 3 => "without"],
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
