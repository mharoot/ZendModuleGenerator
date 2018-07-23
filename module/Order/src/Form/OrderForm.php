<?php
namespace Order\Form;

use Zend\Form\Form;

class OrderForm extends Form
{
	public function __construct($name = null) {
		// We will ignore the name provided to the constructor
		parent::__construct('order');

		$this->add([
			'name' => 'OrderID',
			'type' => 'hidden',
		]);
		$this->add([
			'name' => 'CustomerID',
			'type' => 'number',
			'options' => [
				'label' => 'CustomerID',
			],
		]);
		$this->add([
			'name' => 'EmployeeID',
			'type' => 'number',
			'options' => [
				'label' => 'EmployeeID',
			],
		]);
		$this->add([
			'name' => 'OrderDate',
			'type' => 'text',
			'options' => [
				'label' => 'OrderDate',
			],
		]);
		$this->add([
			'name' => 'ShipperID',
			'type' => 'number',
			'options' => [
				'label' => 'ShipperID',
			],
		]);
		$this->add([
			'name' => 'OrderStatus',
			'type' => 'number',
			'options' => [
				'label' => 'OrderStatus',
			],
		]);
		$this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
	}

}