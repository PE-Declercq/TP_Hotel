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

/* hotel/suite_card.html.twig */
class __TwigTemplate_c77fc5d8bbef407ed7e32ebe2a668a34 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "hotel/suite_card.html.twig"));

        // line 1
        echo "
<article>
    ";
        // line 3
        echo "
    <div><img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 4, $this->source); })()), "img", [], "any", false, false, false, 4)), "html", null, true);
        echo "\" width=\"400\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 4, $this->source); })()), "img", [], "any", false, false, false, 4), "html", null, true);
        echo "\"></div>
    <h2>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5), "html", null, true);
        echo "</h2>
    <p>";
        // line 6
        echo twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 6, $this->source); })()), "description", [], "any", false, false, false, 6);
        echo "</p>
    <p>";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatCurrency((twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 7, $this->source); })()), "price", [], "any", false, false, false, 7) / 100), "EUR", array(), "fr"), "html", null, true);
        echo "</p>
    <p>";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 8, $this->source); })()), "hotel", [], "any", false, false, false, 8), "html", null, true);
        echo "</p>
    ";
        // line 9
        if ((twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 9, $this->source); })()), "available", [], "any", false, false, false, 9) == "0")) {
            // line 10
            echo "        <p>Indisponible</p>
    ";
        } elseif ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_USER")) {
            // line 12
            echo "        <a href=\"/hotel/reservation/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["suite"]) || array_key_exists("suite", $context) ? $context["suite"] : (function () { throw new RuntimeError('Variable "suite" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
            echo "\">Réservez moi!</a>
    ";
        } else {
            // line 14
            echo "        <p>Vous devez vous connecter si vous souhaitez réserver.</p>
    ";
        }
        // line 16
        echo "</article>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "hotel/suite_card.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 16,  81 => 14,  75 => 12,  71 => 10,  69 => 9,  65 => 8,  61 => 7,  57 => 6,  53 => 5,  47 => 4,  44 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<article>
    {#'uploads/img/' ~#}
    <div><img src=\"{{ asset(suite.img) }}\" width=\"400\" alt=\"{{ suite.img }}\"></div>
    <h2>{{ suite.name }}</h2>
    <p>{{ suite.description | raw }}</p>
    <p>{{ (suite.price / 100) | format_currency('EUR', locale='fr') }}</p>
    <p>{{ suite.hotel }}</p>
    {% if suite.available == \"0\" %}
        <p>Indisponible</p>
    {% elseif is_granted(\"ROLE_USER\") %}
        <a href=\"/hotel/reservation/{{ suite.id }}\">Réservez moi!</a>
    {% else %}
        <p>Vous devez vous connecter si vous souhaitez réserver.</p>
    {% endif %}
</article>", "hotel/suite_card.html.twig", "/Users/p-edeclercq/Documents/cours b3-dw/POO/Exo/templates/hotel/suite_card.html.twig");
    }
}
