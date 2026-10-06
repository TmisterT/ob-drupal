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

/* themes/custom/ob/templates/content/node--update--full.html.twig */
class __TwigTemplate_c2dd0b6bb1720fffe85b151014f16d16 extends Template
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
        yield "<article";
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["update-article"], "method", false, false, true, 2), "html", null, true);
        yield ">
  ";
        // line 3
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        // line 4
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

  <header class=\"update-article__header\">
    ";
        // line 7
        yield from $this->load("@ob/templates/content/update-language-links.html.twig", 7)->unwrap()->yield(CoreExtension::toArray(["languages" => ($context["update_languages"] ?? null), "compact" => false]));
        // line 8
        yield "    <div class=\"update-article__meta\">
      ";
        // line 9
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "types", [], "any", false, false, true, 9)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 10
            yield "        <span class=\"update-article__type\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "types", [], "any", false, false, true, 10), ", "), "html", null, true);
            yield "</span>
      ";
        }
        // line 12
        yield "      ";
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "date", [], "any", false, false, true, 12)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 13
            yield "        <time datetime=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "datetime", [], "any", false, false, true, 13), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "date", [], "any", false, false, true, 13), "html", null, true);
            yield "</time>
      ";
        }
        // line 15
        yield "    </div>

    ";
        // line 17
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "summary", [], "any", false, false, true, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "      <p class=\"update-article__summary\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "summary", [], "any", false, false, true, 18), "html", null, true);
            yield "</p>
    ";
        }
        // line 20
        yield "  </header>

  ";
        // line 22
        if ( !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_featured_image", [], "any", false, false, true, 22), "isEmpty", [], "any", false, false, true, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 23
            yield "    <figure class=\"update-article__media\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_featured_image", [], "any", false, false, true, 23), "html", null, true);
            yield "</figure>
  ";
        }
        // line 25
        yield "
  <div class=\"update-article__layout\">
    <div class=\"update-article__body\">";
        // line 27
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 27), "html", null, true);
        yield "</div>

    ";
        // line 29
        if ((((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "topics", [], "any", false, false, true, 29)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "content_owner", [], "any", false, false, true, 29)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "last_reviewed", [], "any", false, false, true, 29)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 30
            yield "      <aside class=\"update-article__details\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Article information"));
            yield "\">
        ";
            // line 31
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "topics", [], "any", false, false, true, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 32
                yield "          <div class=\"update-article__detail\">
            <h2>";
                // line 33
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Topics"));
                yield "</h2>
            <ul>
              ";
                // line 35
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "topics", [], "any", false, false, true, 35));
                foreach ($context['_seq'] as $context["_key"] => $context["topic"]) {
                    yield "<li>";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["topic"], "html", null, true);
                    yield "</li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['topic'], $context['_parent']);
                $context = array_intersect_key($context, $_parent);
                $context += $_parent;
                // line 36
                yield "            </ul>
          </div>
        ";
            }
            // line 39
            yield "        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "content_owner", [], "any", false, false, true, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 40
                yield "          <div class=\"update-article__detail\">
            <h2>";
                // line 41
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Content owner"));
                yield "</h2>
            <p>";
                // line 42
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "content_owner", [], "any", false, false, true, 42), "html", null, true);
                yield "</p>
          </div>
        ";
            }
            // line 45
            yield "        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "last_reviewed", [], "any", false, false, true, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 46
                yield "          <div class=\"update-article__detail\">
            <h2>";
                // line 47
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last reviewed"));
                yield "</h2>
            <p>";
                // line 48
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["update_details"] ?? null), "last_reviewed", [], "any", false, false, true, 48), "html", null, true);
                yield "</p>
          </div>
        ";
            }
            // line 51
            yield "      </aside>
    ";
        }
        // line 53
        yield "  </div>

  ";
        // line 55
        if (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "hasField", ["field_release_documents"], "method", false, false, true, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp) &&  !(($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["node"] ?? null), "field_release_documents", [], "any", false, false, true, 55), "isEmpty", [], "any", false, false, true, 55)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 56
            yield "    <section class=\"update-article__documents\" aria-labelledby=\"release-documents-heading\">
      <h2 id=\"release-documents-heading\">";
            // line 57
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Release documents"));
            yield "</h2>
      ";
            // line 58
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_release_documents", [], "any", false, false, true, 58), "html", null, true);
            yield "
    </section>
  ";
        }
        // line 61
        yield "
  ";
        // line 62
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_summary", "field_featured_image", "field_update_type", "field_update_date", "field_topics", "field_content_owner", "field_last_reviewed", "field_featured", "field_release_documents", "body", "links"), "html", null, true);
        yield "
</article>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "title_prefix", "title_suffix", "update_languages", "update_details", "node", "content"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/ob/templates/content/node--update--full.html.twig";
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
        return array (  208 => 62,  205 => 61,  199 => 58,  195 => 57,  192 => 56,  190 => 55,  186 => 53,  182 => 51,  176 => 48,  172 => 47,  169 => 46,  166 => 45,  160 => 42,  156 => 41,  153 => 40,  150 => 39,  145 => 36,  133 => 35,  128 => 33,  125 => 32,  123 => 31,  118 => 30,  116 => 29,  111 => 27,  107 => 25,  101 => 23,  99 => 22,  95 => 20,  89 => 18,  87 => 17,  83 => 15,  75 => 13,  72 => 12,  66 => 10,  64 => 9,  61 => 8,  59 => 7,  53 => 4,  49 => 3,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/ob/templates/content/node--update--full.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/node--update--full.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 7, "if" => 9, "for" => 35];
        static $filters = ["escape" => 2, "join" => 10, "t" => 30, "without" => 62];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "include", 1 => "if", 2 => "for"],
                [0 => "escape", 1 => "join", 2 => "t", 3 => "without"],
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
