<?php

namespace JaviAcei\PaginatorBundle\Twig\Extension;

use 
    JaviAcei\PaginatorBundle\Templating\Helper\PaginatorHelper,
    JaviAcei\PaginatorBundle\Model\Paginator as Paginator
;

class PaginatorExtension extends \Twig_Extension
{

    protected $pagebar;

    public function __construct(PaginatorHelper $pagebar)
    {
        $this->pagebar = $pagebar;
    }

    public function getFunctions()
    {
        return array(
            'simple_paginator_render'   => new \Twig_Function_Method($this, 'render', array('is_safe' => array('html')))
        );
    }

    public function render($route, $id = null, $options = array(), $view = null)
    {
        return $this->pagebar->render($route, $id, $options, $view);
    }
    
    public function getName()
    {
        return 'simple_paginator_extension';
    }

}

