<?php 
namespace Shipper\Controller; 

use Shipper\Model\ShipperTable;
use Zend\Mvc\Controller\AbstractActionController; 
use Zend\View\Model\ViewModel; 

class ShipperController extends AbstractActionController { 

    private $table;

    public function __construct(ShipperTable $table)
    {
        $this->table = $table;
    }

    public function indexAction() { 
        return new ViewModel([
            'shippers' => $this->table->fetchAll(),
        ]);
    } 

    public function addAction() { 

    } 

    public function editAction() { 

    } 

    public function deleteAction() { 

    } 
}