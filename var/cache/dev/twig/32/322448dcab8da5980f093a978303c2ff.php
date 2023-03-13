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

/* managment/reservation_card.html.twig */
class __TwigTemplate_f41f24c0b47b17ffa9d37a6cff94fb8c extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "managment/reservation_card.html.twig"));

        // line 1
        echo "<article>
    <h2>";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 2, $this->source); })()), "suiteName", [], "any", false, false, false, 2), "html", null, true);
        echo "</h2>
    <p>Réservé par ";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 3, $this->source); })()), "userEmail", [], "any", false, false, false, 3), "html", null, true);
        echo "</p>
    <p>Du : ";
        // line 4
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 4, $this->source); })()), "startDate", [], "any", false, false, false, 4), "d/m/Y H:i"), "html", null, true);
        echo "</p>
    <p>Au : ";
        // line 5
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 5, $this->source); })()), "endDate", [], "any", false, false, false, 5), "d/m/Y H:i"), "html", null, true);
        echo "</p>
    <p>Créé le : ";
        // line 6
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["reservation"]) || array_key_exists("reservation", $context) ? $context["reservation"] : (function () { throw new RuntimeError('Variable "reservation" does not exist.', 6, $this->source); })()), "creationDate", [], "any", false, false, false, 6), "d/m/Y H:i"), "html", null, true);
        echo "</p>
    <a href=\"#\">Modifier</a>
</article>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "managment/reservation_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 6,  55 => 5,  51 => 4,  47 => 3,  43 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<article>
    <h2>{{ reservation.suiteName }}</h2>
    <p>Réservé par {{ reservation.userEmail }}</p>
    <p>Du : {{ reservation.startDate|date('d/m/Y H:i') }}</p>
    <p>Au : {{ reservation.endDate|date('d/m/Y H:i') }}</p>
    <p>Créé le : {{ reservation.creationDate|date('d/m/Y H:i') }}</p>
    <a href=\"#\">Modifier</a>
</article>", "managment/reservation_card.html.twig", "/Users/p-edeclercq/Documents/cours b3-dw/POO/Exo/templates/managment/reservation_card.html.twig");
    }
}
