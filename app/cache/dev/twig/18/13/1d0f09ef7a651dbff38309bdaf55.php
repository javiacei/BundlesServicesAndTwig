<?php

/* JaviAceiBookBundle:Book:index.html.twig */
class __TwigTemplate_18131d0f09ef7a651dbff38309bdaf55 extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = array();
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    public function getParent(array $context)
    {
        $parent = "::base.html.twig";
        if ($parent instanceof Twig_Template) {
            $name = $parent->getTemplateName();
            $this->parent[$name] = $parent;
            $parent = $name;
        } elseif (!isset($this->parent[$parent])) {
            $this->parent[$parent] = $this->env->loadTemplate($parent);
        }

        return $this->parent[$parent];
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Libros</h1>

<!-- Listado de libros paginados -->
<ul>
    ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, 'elements'));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context['_key'] => $context['book']) {
            // line 9
            echo "        <li>";
            echo twig_escape_filter($this->env, $this->getContext($context, 'book'), "html");
            echo "</li>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 11
            echo "        <li>No existen libros.</li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['book'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 13
        echo "</ul>

<!-- Paginador -->
<ul class=\"paginator\">
    ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, ($this->getContext($context, 'total') / twig_length_filter($this->env, $this->getContext($context, 'elements')))));
        foreach ($context['_seq'] as $context['_key'] => $context['i']) {
            // line 18
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("javiacei_book_list", array("page" => $this->getContext($context, 'i'), "limit" => $this->getContext($context, 'limit'))), "html");
            echo "\">Página ";
            echo twig_escape_filter($this->env, $this->getContext($context, 'i'), "html");
            echo "</a>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 20
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "JaviAceiBookBundle:Book:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
