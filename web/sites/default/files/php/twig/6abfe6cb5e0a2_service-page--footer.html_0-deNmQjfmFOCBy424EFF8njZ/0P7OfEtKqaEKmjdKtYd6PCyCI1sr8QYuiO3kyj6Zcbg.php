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

/* @ob/templates/content/service-page--footer.html.twig */
class __TwigTemplate_214cd4ec81f609f67af44312b478bdff extends Template
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
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "documents", [], "any", false, false, true, 1)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 2
            yield "  <section class=\"service-page__section service-documents\" aria-labelledby=\"service-documents-heading\">
    <h2 id=\"service-documents-heading\">";
            // line 3
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("documents_heading", $context)) ? (Twig\Extension\CoreExtension::default(($context["documents_heading"] ?? null), t("Forms and official documents"))) : (t("Forms and official documents"))), "html", null, true);
            yield "</h2>
    ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "documents", [], "any", false, false, true, 4));
            foreach ($context['_seq'] as $context["_key"] => $context["document"]) {
                // line 5
                yield "      <div class=\"service-document\">
        <div>
          <strong>";
                // line 7
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "title", [], "any", false, false, true, 7), "html", null, true);
                yield "</strong>
          <span>";
                // line 8
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "type", [], "any", false, false, true, 8), "html", null, true);
                yield " · ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "size", [], "any", false, false, true, 8), "html", null, true);
                yield "</span>
        </div>
        <a href=\"";
                // line 10
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["document"], "url", [], "any", false, false, true, 10), "html", null, true);
                yield "\" download>
          <i class=\"bi bi-download\" aria-hidden=\"true\"></i>";
                // line 11
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Download"));
                yield "
        </a>
      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['document'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 15
            yield "  </section>
";
        }
        // line 17
        yield "
";
        // line 18
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "action", [], "any", false, false, true, 18)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 19
            yield "  <div class=\"service-page__action\">
    <a href=\"";
            // line 20
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "action", [], "any", false, false, true, 20), "url", [], "any", false, false, true, 20), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "action", [], "any", false, false, true, 20), "title", [], "any", false, false, true, 20), "html", null, true);
            yield "</a>
  </div>
";
        }
        // line 23
        yield "
";
        // line 24
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "contact_email", [], "any", false, false, true, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "  <section class=\"service-page__contact\" aria-labelledby=\"service-contact-heading\">
    <h2 id=\"service-contact-heading\">";
            // line 26
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Contact"));
            yield "</h2>
    <a href=\"mailto:";
            // line 27
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "contact_email", [], "any", false, false, true, 27), "html", null, true);
            yield "\">";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "contact_email", [], "any", false, false, true, 27), "html", null, true);
            yield "</a>
  </section>
";
        }
        // line 30
        yield "
";
        // line 31
        if (((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "content_owner", [], "any", false, false, true, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp) || (($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "last_reviewed", [], "any", false, false, true, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp))) {
            // line 32
            yield "  <aside class=\"service-page__metadata\" aria-label=\"";
            yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Page information"));
            yield "\">
    ";
            // line 33
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "content_owner", [], "any", false, false, true, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<div><span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Content owner"));
                yield "</span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "content_owner", [], "any", false, false, true, 33), "html", null, true);
                yield "</div>";
            }
            // line 34
            yield "    ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "last_reviewed", [], "any", false, false, true, 34)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "<div><span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last reviewed"));
                yield "</span>";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["service_details"] ?? null), "last_reviewed", [], "any", false, false, true, 34), "html", null, true);
                yield "</div>";
            }
            // line 35
            yield "  </aside>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["service_details", "documents_heading"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@ob/templates/content/service-page--footer.html.twig";
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
        return array (  154 => 35,  145 => 34,  137 => 33,  132 => 32,  130 => 31,  127 => 30,  119 => 27,  115 => 26,  112 => 25,  110 => 24,  107 => 23,  99 => 20,  96 => 19,  94 => 18,  91 => 17,  87 => 15,  76 => 11,  72 => 10,  65 => 8,  61 => 7,  57 => 5,  53 => 4,  49 => 3,  46 => 2,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@ob/templates/content/service-page--footer.html.twig", "/var/www/html/web/themes/custom/ob/templates/content/service-page--footer.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 1, "for" => 4];
        static $filters = ["escape" => 3, "default" => 3, "t" => 3];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "if", 1 => "for"],
                [0 => "escape", 1 => "default", 2 => "t"],
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
