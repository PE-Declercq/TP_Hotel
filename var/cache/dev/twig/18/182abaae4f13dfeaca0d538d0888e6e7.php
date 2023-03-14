<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* managment/suite_card.html.twig */
class __TwigTemplate_a6d5e93e4324d740ade606ebd841bbd9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "managment/suite_card.html.twig"));

        // line 1
        echo "
<article>
    <h2>";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 3, $this->source); })()), "name", [], "any", false, false, false, 3), "html", null, true);
        echo "</h2>
    <p>";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatCurrency((twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 4, $this->source); })()), "price", [], "any", false, false, false, 4) / 100), "EUR", array(), "fr"), "html", null, true);
        echo "</p>
    <p>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 5, $this->source); })()), "hotel", [], "any", false, false, false, 5), "html", null, true);
        echo "</p>
    <a href=\"/managment/";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 6, $this->source); })()), "id", [], "any", false, false, false, 6), "html", null, true);
        echo "-reservations\">Voir les réservation</a>
    <a href=\"/managment/";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7), "html", null, true);
        echo "-suite\">Modifier</a>
</article>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "managment/suite_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 7,  56 => 6,  52 => 5,  48 => 4,  44 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<article>
    <h2>{{ suite.name }}</h2>
    <p>{{ (suite.price / 100) | format_currency('EUR', locale='fr') }}</p>
    <p>{{ suite.hotel }}</p>
    <a href=\"/managment/{{ suite.id }}-reservations\">Voir les réservation</a>
    <a href=\"/managment/{{ suite.id }}-suite\">Modifier</a>
</article>", "managment/suite_card.html.twig", "/Users/p-edeclercq/Documents/cours b3-dw/POO/Exo/templates/managment/suite_card.html.twig");
    }
}
