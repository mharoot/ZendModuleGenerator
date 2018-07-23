<?php 
namespace Orderdetail\Controller; 

use Orderdetail\Model\OrderdetailTable;
use Zend\Mvc\Controller\AbstractActionController; 
use Zend\View\Model\ViewModel; 

class OrderdetailController extends AbstractActionController { 

    private $table;

    public function __construct(OrderdetailTable $table)
    {
        $this->table = $table;
    }

    public function indexAction() { 
        return new ViewModel([
            'orderdetails' => $this->table->fetchAll(),
        ]);
    } 

    public function addAction() { 

    } 

    public function editAction() { 

    } 

    public function deleteAction() { 

    } 
}