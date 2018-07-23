<?php 
namespace Supplier\Controller; 

use Supplier\Model\SupplierTable;
use Zend\Mvc\Controller\AbstractActionController; 
use Zend\View\Model\ViewModel; 

class SupplierController extends AbstractActionController { 

    private $table;

    public function __construct(SupplierTable $table)
    {
        $this->table = $table;
    }

    public function indexAction() { 
        return new ViewModel([
            'suppliers' => $this->table->fetchAll(),
        ]);
    } 

    public function addAction() { 

    } 

    public function editAction() { 

    } 

    public function deleteAction() { 

    } 
}