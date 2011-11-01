<?php

namespace JaviAcei\PaginatorBundle\Twig\Extension;

use 
    Symfony\Component\DependencyInjection\ContainerInterface,
    JaviAcei\PaginatorBundle\Model\Paginator as Paginator
;

class PaginatorExtension extends \Twig_Extension
{
    protected $paginator;
    protected $container;

    public function __construct(Paginator $paginator, ContainerInterface $container)
    {
        $this->paginator = $paginator;
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array(
            'paginator_render'   => new \Twig_Function_Method($this, 'render', array('is_safe' => array('html')))
        );
    }

    public function render($route, $options = array(), $view = null)    
    {
        $view = (!is_null($view)) ? $view : 'JaviAceiPaginatorBundle:Paginator:simple-paginator-list-view.html.twig';

        $defaultOptions = array(
            'container_class'       => 'simple_paginator',
            'route'                 => $route,

            'previousPageText'      => 'previous',
            'previousEnabledClass'  => 'left',
            'previousDisabledClass' => 'left_disabled',

            'firstPageText'         => 'first',
            'firstEnabledClass'     => 'first',
            'firstDisabledClass'    => 'first_disabled',
            
            'limit'                 => $this->paginator->itemsPerPage,
            
            'firstPage'             => $this->paginator->getFirstPage(),

            'previousPage'          => $this->paginator->getPreviousPage(),

            'currentPage'           => $this->paginator->currentPage,
            'currentClass'          => 'current',

            'firstPage'             => $this->paginator->getFirstPage(),
            'lastPage'              => $this->paginator->getLastPage(),

            'nextPage'              => $this->paginator->getNextPage(),

            'lastPage'              => $this->paginator->getLastPage(),

            'lastPageText'          => 'last',
            'lastEnabledClass'      => 'last',
            'lastDisabledClass'     => 'last_disabled',
            
            'nextPageText'          => 'next',
            'nextEnabledClass'      => 'right',
            'nextDisabledClass'     => 'right_disabled',
        );

        $options = \array_merge($defaultOptions, $options);

        return $this->container->get('templating')->render($view, $options);
    }
    
    public function getName()
    {
        return 'paginator_extension';
    }

}

