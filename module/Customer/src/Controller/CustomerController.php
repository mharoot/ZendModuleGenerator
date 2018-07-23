<?php 
namespace Customer\Controller; 

use Customer\Form\CustomerForm;
use Customer\Model\CustomerTable;
use Zend\Mvc\Controller\AbstractActionController; 
use Zend\View\Model\ViewModel; 

class CustomerController extends AbstractActionController { 

    private $table;

    public function __construct(CustomerTable $table)
    {
        $this->table = $table;
    }

    public function indexAction() { 
        return new ViewModel([
            'customers' => $this->table->fetchAll(),
        ]);
    } 

    public function addAction() { 

    } 

    public function editAction() { 

    } 

    public function deleteAction() { 

    } 
}