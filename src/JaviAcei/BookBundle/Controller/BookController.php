<?php

namespace JaviAcei\BookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use JaviAcei\BookBundle\Paginator;

class BookController extends Controller
{
    /**
     * @Route("/books/list", name="javiacei_book_list")
     * @Template()
     */
    public function indexAction()
    {
        $request    = $this->getRequest();
        $paginator  = new Paginator($request);
        
        $collection = array (
            'Libro 1', 'Libro 2', 'Libro 3', 'Libro 4', 'Libro 5', 'Libro 6'
        );
        
        $elementsToShow = $paginator->paginate($collection);
        
        return array(
            'paginator'  => $paginator,
            'elements'  => $elementsToShow
        );
    }
}
