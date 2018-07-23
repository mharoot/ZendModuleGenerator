<?php 
namespace Employee\Controller; 

use Employee\Form\EmployeeForm;
use Employee\Model\EmployeeTable;
use Zend\Mvc\Controller\AbstractActionController; 
use Zend\View\Model\ViewModel; 

class EmployeeController extends AbstractActionController { 

    private $table;

    public function __construct(EmployeeTable $table)
    {
        $this->table = $table;
    }

    public function indexAction() { 
        return new ViewModel([
            'employees' => $this->table->fetchAll(),
        ]);
    } 

    public function addAction() { 

    } 

    public function editAction() { 

    } 

    public function deleteAction() { 

    } 
}