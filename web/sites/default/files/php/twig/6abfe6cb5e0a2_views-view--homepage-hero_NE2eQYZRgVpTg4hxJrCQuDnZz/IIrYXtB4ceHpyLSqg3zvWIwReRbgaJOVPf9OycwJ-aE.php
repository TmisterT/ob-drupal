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

/* themes/custom/ob/templates/views/views-view--homepage-hero-slider--block-1.html.twig */
class __TwigTemplate_f4303d8c5b0becbbe3d59a04d75b8853 extends Template
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
        $context["slide_count"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["view"] ?? null), "result", [], "any", false, false, true, 7));
        // line 8
        yield "
";
        // line 9
        if ((($tmp = ($context["slide_count"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "  <div
    id=\"homepage-hero-carousel\"
    class=\"homepage-slider homepage-slider--flex\" tabindex=\"0\"
    aria-roledescription=\"";
            // line 13
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("carousel"));
            yield "\"
    aria-label=\"";
            // line 14
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Featured government information"));
            yield "\"
  >
    <h1 class=\"visually-hidden\">";
            // line 16
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["site_name"] ?? null), "html", null, true);
            yield "</h1>
    ";
            // line 17
            if ((($context["slide_count"] ?? null) > 1)) {
                // line 18
                yield "      <div class=\"homepage-slider__indicators\">
        ";
                // line 19
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["view"] ?? null), "result", [], "any", false, false, true, 19));
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
                foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                    // line 20
                    yield "          <button
            type=\"button\"
            data-homepage-slide-to=\"";
                    // line 22
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 22), "html", null, true);
                    yield "\"
            class=\"";
                    // line 23
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("active") : ("")));
                    yield "\"
            ";
                    // line 24
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield "aria-current=\"true\"";
                    }
                    // line 25
                    yield "            aria-label=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to slide @number", ["@number" => CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 25)]));
                    yield "\"
          ></button>
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
                unset($context['_seq'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 28
                yield "      </div>
    ";
            }
            // line 30
            yield "
    <div class=\"homepage-slider__slides\">
      ";
            // line 32
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
            yield "
    </div>

    ";
            // line 35
            if ((($context["slide_count"] ?? null) > 1)) {
                // line 36
                yield "      <div class=\"homepage-slider__controls\">
        <button class=\"homepage-slider__control\" type=\"button\" data-homepage-direction=\"prev\">
          <span aria-hidden=\"true\">←</span>
          <span class=\"visually-hidden\">";
                // line 39
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous slide"));
                yield "</span>
        </button>
        <button
          class=\"homepage-slider__toggle\"
          type=\"button\"
          data-homepage-carousel-toggle
          data-label-pause=\"";
                // line 45
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pause slideshow"));
                yield "\"
          data-label-play=\"";
                // line 46
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Play slideshow"));
                yield "\"
          aria-pressed=\"false\"
        >
          <svg class=\"homepage-slider__pause-icon\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><path d=\"M8 5v14M16 5v14\"/></svg>
          <svg class=\"homepage-slider__play-icon\" viewBox=\"0 0 24 24\" aria-hidden=\"true\"><path d=\"m8 5 11 7-11 7z\"/></svg>
          <span class=\"visually-hidden\">";
                // line 51
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pause slideshow"));
                yield "</span>
        </button>
        <button class=\"homepage-slider__control\" type=\"button\" data-homepage-direction=\"next\">
          <span aria-hidden=\"true\">→</span>
          <span class=\"visually-hidden\">";
                // line 55
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next slide"));
                yield "</span>
        </button>
      </div>
    ";
            }
            // line 59
            yield "  </div>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["view", "site_name", "loop", "rows"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/views/views-view--homepage-hero-slider--block-1.html.twig";
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
        return array (  182 => 59,  175 => 55,  168 => 51,  160 => 46,  156 => 45,  147 => 39,  142 => 36,  140 => 35,  134 => 32,  130 => 30,  126 => 28,  107 => 25,  103 => 24,  99 => 23,  95 => 22,  91 => 20,  74 => 19,  71 => 18,  69 => 17,  65 => 16,  60 => 14,  56 => 13,  51 => 10,  49 => 9,  46 => 8,  44 => 7,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/views/views-view--homepage-hero-slider--block-1.html.twig", "/var/www/html/web/themes/custom/ob/templates/views/views-view--homepage-hero-slider--block-1.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 7, "if" => 9, "for" => 19];
        static $filters = ["length" => 7, "t" => 13, "escape" => 16];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "set", 1 => "if", 2 => "for"],
                [0 => "length", 1 => "t", 2 => "escape"],
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
