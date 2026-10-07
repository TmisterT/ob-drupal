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

/* @ob/templates/content/homepage-official-updates.html.twig */
class __TwigTemplate_12b671f4fc6efd866bdc85b686a2df29 extends Template
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
        yield "<section class=\"official-board\" id=\"official-updates\" aria-labelledby=\"official-updates-title\" data-official-board>
  <div class=\"container\">
    <header class=\"official-board__heading\">
      <span class=\"official-board__eyebrow\">";
        // line 5
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("From the Office of Te Beretitenti"));
        yield "</span>
      <h2 id=\"official-updates-title\">";
        // line 6
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Official updates"));
        yield "</h2>
      <p>";
        // line 7
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Public notices, announcements, news and press releases."));
        yield "</p>
    </header>
    <div class=\"official-board__layout\">
      <div class=\"official-board__features\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 12
            yield "          <article class=\"official-board__feature";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("") : (" official-board__feature--text")));
            yield "\" id=\"official-update-";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 12), "html", null, true);
            yield "\" data-board-panel>
            ";
            // line 13
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<div class=\"official-board__media\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 13), "html", null, true);
                yield "</div>";
            }
            // line 14
            yield "            <div class=\"official-board__content\">
              <div class=\"official-board__meta\">
                ";
            // line 16
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "urgent", [], "any", false, false, true, 16)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<span class=\"official-board__urgent\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Urgent"));
                yield "</span>";
            }
            // line 17
            yield "                <span>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "category", [], "any", false, false, true, 17), "html", null, true);
            yield "</span>
                ";
            // line 18
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 18)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<time datetime=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "datetime", [], "any", false, false, true, 18), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 18), "html", null, true);
                yield "</time>";
            }
            // line 19
            yield "              </div>
              <h3>";
            // line 20
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 20), "html", null, true);
            yield "</h3>
              ";
            // line 21
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "summary", [], "any", false, false, true, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<p class=\"official-board__summary\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "summary", [], "any", false, false, true, 21), "html", null, true);
                yield "</p>";
            }
            // line 22
            yield "              ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<a class=\"official-board__read\" href=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 22), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link_label", [], "any", false, false, true, 22), "html", null, true);
                yield "<span class=\"visually-hidden\">: ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 22), "html", null, true);
                yield "</span><span aria-hidden=\"true\"> →</span></a>";
            }
            // line 23
            yield "            </div>
          </article>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 26
        yield "      </div>
      <div class=\"official-board__side\">
        <h3 class=\"official-board__list-heading\">";
        // line 28
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("On the notice board"));
        yield "</h3>
        <ul class=\"official-board__list\">
          ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 31
            yield "            <li>
              <a class=\"official-board__fallback\" href=\"#official-update-";
            // line 32
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 32), "html", null, true);
            yield "\" data-board-fallback>";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 32), "html", null, true);
            yield "</a>
              <button type=\"button\" class=\"official-board__item\" data-board-select=\"";
            // line 33
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, true, 33), "html", null, true);
            yield "\" aria-controls=\"official-update-";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 33), "html", null, true);
            yield "\" aria-pressed=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false")));
            yield "\" hidden>
                <span class=\"official-board__thumbnail\" aria-hidden=\"true\">
                  ";
            // line 35
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, true, 35), "html", null, true);
            } else {
                yield "<svg viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" focusable=\"false\"><path d=\"M5 3h14v18H5zM8 7h8M8 11h8M8 15h5\"/></svg>";
            }
            // line 36
            yield "                </span>
                <span class=\"official-board__item-copy\">
                  <span class=\"official-board__item-meta\">";
            // line 38
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "urgent", [], "any", false, false, true, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<span class=\"official-board__urgent\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Urgent"));
                yield "</span>";
            }
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "category", [], "any", false, false, true, 38), "html", null, true);
            yield "</span>
                  <strong>";
            // line 39
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 39), "html", null, true);
            yield "</strong>
                  ";
            // line 40
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<time datetime=\"";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "datetime", [], "any", false, false, true, 40), "html", null, true);
                yield "\">";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "date", [], "any", false, false, true, 40), "html", null, true);
                yield "</time>";
            }
            // line 41
            yield "                </span>
              </button>
            </li>
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
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 45
        yield "        </ul>
        <div class=\"official-board__controls\" data-board-controls hidden>
          <span><span data-board-current>1</span> / ";
        // line 47
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["items"] ?? null)), "html", null, true);
        yield "</span>
          <div>
            <button type=\"button\" data-board-prev aria-label=\"";
        // line 49
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous update"));
        yield "\">←</button>
            <button type=\"button\" data-board-next aria-label=\"";
        // line 50
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next update"));
        yield "\">→</button>
          </div>
        </div>
        <p class=\"visually-hidden\" data-board-status role=\"status\" aria-live=\"polite\" aria-atomic=\"true\" data-status-template=\"";
        // line 53
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Update @current of @total: @title"));
        yield "\"></p>
      </div>
    </div>
  </div>
</section>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["items", "loop"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ob/templates/content/homepage-official-updates.html.twig";
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
        return array (  249 => 53,  243 => 50,  239 => 49,  234 => 47,  230 => 45,  212 => 41,  204 => 40,  200 => 39,  191 => 38,  187 => 36,  181 => 35,  172 => 33,  166 => 32,  163 => 31,  146 => 30,  141 => 28,  137 => 26,  128 => 23,  117 => 22,  111 => 21,  107 => 20,  104 => 19,  96 => 18,  91 => 17,  85 => 16,  81 => 14,  75 => 13,  68 => 12,  64 => 11,  57 => 7,  53 => 6,  49 => 5,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ob/templates/content/homepage-official-updates.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/homepage-official-updates.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["for" => 11, "if" => 13];
        static $filters = ["t" => 5, "escape" => 12, "length" => 47];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "for", 1 => "if"],
                [0 => "t", 1 => "escape", 2 => "length"],
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
