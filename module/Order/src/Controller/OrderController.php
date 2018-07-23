<?php 
namespace Order\Controller; 

use Order\Model\OrderTable;
use Zend\Mvc\Controller\AbstractActionController; 
use Zend\View\Model\ViewModel; 

class OrderController extends AbstractActionController { 

    private $table;

    public function __construct(OrderTable $table)
    {
        $this->table = $table;
    }

    public function indexAction() { 
        return new ViewModel([
            'orders' => $this->table->fetchAll(),
        ]);
    } 

    public function addAction() { 

    } 

    public function editAction() { 

    } 

    public function deleteAction() { 

    } 
}