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

/* themes/custom/ob/templates/content/node--honours-awards--full.html.twig */
class __TwigTemplate_0c952c6e36b33962a5bab5f23f2b4b8c extends Template
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
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["menu-section-page", "service-page", "service-page--awards"], "method", false, false, true, 3), "html", null, true);
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
            yield from $this->load("@ob/templates/navigation/section-navigation.html.twig", 11)->unwrap()->yield(CoreExtension::merge($context, ["heading_id" => "awards-section-navigation-heading"]));
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
          <summary><span>";
            // line 19
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("About honours and awards"));
            yield "</span><span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span></summary>
          <div class=\"service-disclosure__content menu-section-page__body\">";
            // line 20
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "body", [], "any", false, false, true, 20), "html", null, true);
            yield "</div>
        </details>
      ";
        }
        // line 23
        yield "
      ";
        // line 24
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "groups", [], "any", false, false, true, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "        <section class=\"service-awards\" aria-labelledby=\"service-awards-heading\">
          <header class=\"service-page__section-heading\">
            <p>";
            // line 27
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Official criteria"));
            yield "</p>
            <h2 id=\"service-awards-heading\">";
            // line 28
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Award categories"));
            yield "</h2>
          </header>
          ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "groups", [], "any", false, false, true, 30));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 31
                yield "            <section class=\"award-group\" aria-labelledby=\"award-group-";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 31), "html", null, true);
                yield "\">
              <div class=\"award-group__heading\">
                <h3 id=\"award-group-";
                // line 33
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 33), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["group"], "title", [], "any", false, false, true, 33), "html", null, true);
                yield "</h3>
                ";
                // line 34
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["group"], "description", [], "any", false, false, true, 34)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<div>";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["group"], "description", [], "any", false, false, true, 34), "html", null, true);
                    yield "</div>";
                }
                // line 35
                yield "              </div>
              <div class=\"award-group__list\">
                ";
                // line 37
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["group"], "awards", [], "any", false, false, true, 37));
                foreach ($context['_seq'] as $context["_key"] => $context["award"]) {
                    // line 38
                    yield "                  <details class=\"award-criterion\">
                    <summary class=\"award-criterion__summary\">
                      <span class=\"award-criterion__number\" aria-hidden=\"true\">";
                    // line 40
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["award"], "number", [], "any", false, false, true, 40), "html", null, true);
                    yield "</span>
                      <span class=\"award-criterion__title\">
                        <span class=\"award-criterion__name\">";
                    // line 42
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["award"], "name", [], "any", false, false, true, 42), "html", null, true);
                    yield "</span>
                        ";
                    // line 43
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["award"], "code", [], "any", false, false, true, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<span class=\"award-criterion__code\">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["award"], "code", [], "any", false, false, true, 43), "html", null, true);
                        yield "</span>";
                    }
                    // line 44
                    yield "                      </span>
                      <span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span>
                    </summary>
                    ";
                    // line 47
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["award"], "criteria", [], "any", false, false, true, 47)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "<div class=\"award-criterion__text\">";
                        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["award"], "criteria", [], "any", false, false, true, 47), "html", null, true);
                        yield "</div>";
                    }
                    // line 48
                    yield "                  </details>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['award'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 50
                yield "              </div>
            </section>
          ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 53
            yield "        </section>
      ";
        }
        // line 55
        yield "
      ";
        // line 56
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "eligibility", [], "any", false, false, true, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 57
            yield "        <details class=\"service-disclosure service-page__section\">
          <summary><span>";
            // line 58
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Eligibility"));
            yield "</span><span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span></summary>
          <div class=\"service-disclosure__content\">";
            // line 59
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "eligibility", [], "any", false, false, true, 59), "html", null, true);
            yield "</div>
        </details>
      ";
        }
        // line 62
        yield "
      ";
        // line 63
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "requirements", [], "any", false, false, true, 63)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 64
            yield "        <details class=\"service-disclosure service-page__section\">
          <summary><span>";
            // line 65
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Nomination requirements"));
            yield "</span><span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span></summary>
          <div class=\"service-disclosure__content\">";
            // line 66
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "requirements", [], "any", false, false, true, 66), "html", null, true);
            yield "</div>
        </details>
      ";
        }
        // line 69
        yield "
      ";
        // line 70
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "steps", [], "any", false, false, true, 70)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 71
            yield "        <details class=\"service-disclosure service-page__section service-process\">
          <summary>
            <span>";
            // line 73
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Nomination process"));
            yield "</span>
            <span class=\"service-disclosure__count\">";
            // line 74
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "steps", [], "any", false, false, true, 74)), "html", null, true);
            yield " ";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("steps"));
            yield "</span>
            <span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span>
          </summary>
          <div class=\"service-disclosure__content\">
            <ol>
              ";
            // line 79
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "steps", [], "any", false, false, true, 79));
            foreach ($context['_seq'] as $context["_key"] => $context["step"]) {
                // line 80
                yield "                <li><span aria-hidden=\"true\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["step"], "number", [], "any", false, false, true, 80), "html", null, true);
                yield "</span><div>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["step"], "content", [], "any", false, false, true, 80), "html", null, true);
                yield "</div></li>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['step'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 82
            yield "            </ol>
          </div>
        </details>
      ";
        }
        // line 86
        yield "
      ";
        // line 87
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "processing", [], "any", false, false, true, 87)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 88
            yield "        <details class=\"service-disclosure service-page__section\">
          <summary><span>";
            // line 89
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Review and selection"));
            yield "</span><span class=\"service-disclosure__icon\" aria-hidden=\"true\"></span></summary>
          <div class=\"service-disclosure__content\">";
            // line 90
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "processing", [], "any", false, false, true, 90), "html", null, true);
            yield "</div>
        </details>
      ";
        }
        // line 93
        yield "
      ";
        // line 94
        yield from $this->load("@ob/templates/content/service-page--footer.html.twig", 94)->unwrap()->yield(CoreExtension::merge($context, ["documents_heading" => t("Nomination forms and official documents")]));
        // line 97
        yield "    </div>
  </div>

  ";
        // line 100
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "field_service_category", "field_audience", "field_application_status", "field_opening_date", "field_closing_date", "body", "field_award_categories", "field_eligibility", "field_requirements", "field_application_steps", "field_processing_info", "field_documents", "field_service_link", "field_contact_email", "field_content_owner", "field_last_reviewed"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["section_navigation", "attributes", "title_prefix", "title_suffix", "service_details", "loop", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--honours-awards--full.html.twig";
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
        return array (  327 => 100,  322 => 97,  320 => 94,  317 => 93,  311 => 90,  307 => 89,  304 => 88,  302 => 87,  299 => 86,  293 => 82,  281 => 80,  277 => 79,  267 => 74,  263 => 73,  259 => 71,  257 => 70,  254 => 69,  248 => 66,  244 => 65,  241 => 64,  239 => 63,  236 => 62,  230 => 59,  226 => 58,  223 => 57,  221 => 56,  218 => 55,  214 => 53,  197 => 50,  189 => 48,  183 => 47,  178 => 44,  172 => 43,  168 => 42,  163 => 40,  159 => 38,  155 => 37,  151 => 35,  145 => 34,  139 => 33,  133 => 31,  116 => 30,  111 => 28,  107 => 27,  103 => 25,  101 => 24,  98 => 23,  92 => 20,  88 => 19,  85 => 18,  83 => 17,  79 => 15,  76 => 14,  73 => 11,  71 => 10,  65 => 9,  62 => 8,  60 => 7,  55 => 5,  51 => 4,  46 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--honours-awards--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--honours-awards--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "include" => 7, "if" => 9, "for" => 30];
        static $filters = ["escape" => 3, "t" => 19, "length" => 74, "without" => 100];
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
