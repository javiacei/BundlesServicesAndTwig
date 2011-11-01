<?php

namespace JaviAcei\PaginatorBundle\Model;

use 
    Symfony\Component\HttpFoundation\Request
;

/**
 * Paginator
 *
 * @package JaviAcei
 * @subpackage Paginator
 * @author Francisco Javier Aceituno <javier.aceituno@ideup.com>
 */
class Paginator 
{
    public $currentPage;
    
    public $itemsPerPage;
   
    public $maxPagerItems;
    
    public $totalItems;

    /**
     * @param Symfony\Component\HttpFoundation\Request $request
     */
    public function __construct(Request $request, $nItems)
    {      
        // Página actual
        $page = (int) $request->get('page');
        $this->currentPage = ($page > 0) ? $page : $this->getFirstPage();

        // Elementos por página
        $itemsPerPage = (int) $request->get('limit');
        $this->itemsPerPage = ($itemsPerPage > 0) ? $itemsPerPage : $nItems;
        
        // Número total de elementos
        $this->totalItems = 0;
    }

    
    /**
     * Transforms the given Doctrine DQL into a paginated query
     * If you need to paginate various queries in the same controller, you need to specify an $id
     *
     * @param array $collection
     * @param string $id
     * @return array
     */
    public function paginate(array $collection) 
    {
        $this->totalItems = count($collection);
        $offset = ($this->currentPage - 1) * $this->itemsPerPage;

        return array_slice($collection, $offset, $this->itemsPerPage);
    }

   

    /**
     * Get the next page number
     *
     * @return int
     */
    public function getNextPage() 
    {
        return $this->currentPage + 1;
    }

    /**
     * Get the previous page number
     * 
     * @return int
     */
    public function getPreviousPage() 
    {
        return $this->currentPage + 1;
    }

    /**
     * Gets the last page number
     *
     * @param string $id
     * @return int
     */
    public function getLastPage() 
    {
        return (int) ceil($this->totalItems / $this->itemsPerPage);
    }

    /**
     * @return int
     */
    public function getFirstPage() 
    {
        return 1;
    }
}
