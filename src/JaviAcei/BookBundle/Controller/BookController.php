<?php

namespace JaviAcei\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BookController extends Controller
{
    /**
     * @Route("/books/list", name="javiacei_book_list")
     * @Template()
     */
    public function indexAction()
    {
        $request    = $this->getRequest();
        
        // Página a mostrar
        $page       = $request->query->get('page');
        $page       = ($page) ? $page : 1;
        
        // Límite de elementos
        $limit      = $request->query->get('limit'); 
        $limit      = ($limit) ? $limit : 3;
        
        $collection = array (
            'Libro 1', 'Libro 2', 'Libro 3', 'Libro 4', 'Libro 5', 'Libro 6'
        );
        
        $total = count($collection);
        
        $offset = $limit * ($page-1);
        $elementsToShow = \array_slice($collection, $offset, $limit);
        
        return array(
            'page'      => $page,
            'limit'     => $limit,
            'total'     => $total,
            'elements'  => $elementsToShow
        );
    }
}
