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

/* themes/custom/ob/templates/content/node--division--full.html.twig */
class __TwigTemplate_308ed6a665ed822046d586a0028bb6fb extends Template
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
        $context["in_menu_section"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "is_section", [], "any", true, true, true, 7) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "is_section", [], "any", false, false, true, 7)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "is_section", [], "any", false, false, true, 7)) : (false));
        // line 8
        $context["has_image"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_featured_image"], "method", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_featured_image", [], "any", false, false, true, 8), "isEmpty", [], "any", false, false, true, 8)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 9
        $context["has_summary"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_summary"], "method", false, false, true, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_summary", [], "any", false, false, true, 9), "isEmpty", [], "any", false, false, true, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 10
        $context["has_contact"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_contact_details"], "method", false, false, true, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_contact_details", [], "any", false, false, true, 10), "isEmpty", [], "any", false, false, true, 10)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 11
        $context["has_email"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_email"], "method", false, false, true, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_email", [], "any", false, false, true, 11), "isEmpty", [], "any", false, false, true, 11)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 12
        $context["has_phone"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_phone"], "method", false, false, true, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_phone", [], "any", false, false, true, 12), "isEmpty", [], "any", false, false, true, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 13
        $context["has_review_date"] = ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_last_reviewed"], "method", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_last_reviewed", [], "any", false, false, true, 13), "isEmpty", [], "any", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp));
        // line 14
        yield "
<article";
        // line 15
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["menu-section-page", "division-page"], "method", false, false, true, 15), "html", null, true);
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
        if ((($tmp = ($context["has_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " menu-section-page__intro--with-media";
        }
        yield "\">
    <div class=\"menu-section-page__intro-copy\">
      <p class=\"menu-section-page__eyebrow\">";
        // line 21
        yield (string) (((($tmp = ($context["in_menu_section"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["section_navigation"] ?? null), "title", [], "any", false, false, true, 21), "html", null, true)) : (t("Office division")));
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
        if ((($tmp = ($context["has_image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 27
            yield "      <div class=\"menu-section-page__media\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 27), "html", null, true);
            yield "</div>
    ";
        }
        // line 29
        yield "  </header>

  <div class=\"menu-section-page__layout";
        // line 31
        if ( !(($tmp = ($context["in_menu_section"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield " menu-section-page__layout--without-nav";
        }
        yield "\">
    ";
        // line 32
        if ((($tmp = ($context["in_menu_section"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 33
            yield "      ";
            yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 33)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "division-section-heading"]));
            // line 36
            yield "    ";
        }
        // line 37
        yield "
    <div class=\"menu-section-page__content\">
      <div class=\"menu-section-page__body\">";
        // line 39
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 39), "html", null, true);
        yield "</div>

      ";
        // line 41
        if ((((($tmp = ($context["has_contact"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = ($context["has_email"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) || (($tmp = ($context["has_phone"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 42
            yield "        <section class=\"division-contact\" aria-labelledby=\"division-contact-heading\">
          <h2 id=\"division-contact-heading\">";
            // line 43
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Contact @division", ["@division" => ($context["label"] ?? null)]));
            yield "</h2>
          ";
            // line 44
            if ((($tmp = ($context["has_contact"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 45
                yield "            <div class=\"division-contact__details\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_contact_details", [], "any", false, false, true, 45), "html", null, true);
                yield "</div>
          ";
            }
            // line 47
            yield "          <dl class=\"division-contact__list\">
            ";
            // line 48
            if ((($tmp = ($context["has_phone"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 49
                yield "              <div><dt>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Phone"));
                yield "</dt><dd>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_phone", [], "any", false, false, true, 49), "html", null, true);
                yield "</dd></div>
            ";
            }
            // line 51
            yield "            ";
            if ((($tmp = ($context["has_email"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "              <div><dt>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Email"));
                yield "</dt><dd>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_email", [], "any", false, false, true, 52), "html", null, true);
                yield "</dd></div>
            ";
            }
            // line 54
            yield "          </dl>
        </section>
      ";
        }
        // line 57
        yield "
      ";
        // line 58
        if ((($tmp = ($context["has_review_date"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 59
            yield "        <aside class=\"division-page__metadata\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Page information"));
            yield "\">
          <span>";
            // line 60
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last reviewed"));
            yield "</span>
          ";
            // line 61
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_last_reviewed", [], "any", false, false, true, 61), "html", null, true);
            yield "
        </aside>
      ";
        }
        // line 64
        yield "    </div>
  </div>

  ";
        // line 67
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "field_featured_image", "body", "field_contact_details", "field_email", "field_phone", "field_featured", "field_last_reviewed"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["section_navigation", "node", "attributes", "title_prefix", "title_suffix", "content", "label"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--division--full.html.twig";
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
        return array (  202 => 67,  197 => 64,  191 => 61,  187 => 60,  182 => 59,  180 => 58,  177 => 57,  172 => 54,  164 => 52,  161 => 51,  153 => 49,  151 => 48,  148 => 47,  142 => 45,  140 => 44,  136 => 43,  133 => 42,  131 => 41,  126 => 39,  122 => 37,  119 => 36,  116 => 33,  114 => 32,  108 => 31,  104 => 29,  98 => 27,  96 => 26,  93 => 25,  87 => 23,  85 => 22,  81 => 21,  74 => 19,  69 => 17,  65 => 16,  61 => 15,  58 => 14,  56 => 13,  54 => 12,  52 => 11,  50 => 10,  48 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--division--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--division--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 19, "include" => 33];
        static $filters = ["escape" => 15, "t" => 21, "without" => 67];
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
