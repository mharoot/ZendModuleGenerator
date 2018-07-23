<?php
namespace Orderdetail\Form;

use Zend\Form\Form;

class OrderdetailForm extends Form
{
	public function __construct($name = null) {
		// We will ignore the name provided to the constructor
		parent::__construct('orderdetail');

		$this->add([
			'name' => 'OrderDetailID',
			'type' => 'hidden',
		]);
		$this->add([
			'name' => 'OrderID',
			'type' => 'number',
			'options' => [
				'label' => 'OrderID',
			],
		]);
		$this->add([
			'name' => 'ProductID',
			'type' => 'number',
			'options' => [
				'label' => 'ProductID',
			],
		]);
		$this->add([
			'name' => 'Quantity',
			'type' => 'number',
			'options' => [
				'label' => 'Quantity',
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