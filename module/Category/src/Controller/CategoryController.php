<?php 
namespace Category\Controller; 

use Category\Model\CategoryTable;
use Zend\Mvc\Controller\AbstractActionController; 
use Zend\View\Model\ViewModel; 

class CategoryController extends AbstractActionController { 

    private $table;

    public function __construct(CategoryTable $table)
    {
        $this->table = $table;
    }

    public function indexAction() { 
        return new ViewModel([
            'categorys' => $this->table->fetchAll(),
        ]);
    } 

    public function addAction() { 

    } 

    public function editAction() { 

    } 

    public function deleteAction() { 

    } 
}