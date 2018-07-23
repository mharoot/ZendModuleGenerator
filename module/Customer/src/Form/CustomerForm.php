<?php
namespace Customer\Form;

use Zend\Form\Form;

class CustomerForm extends Form
{
	public function __construct($name = null) {
		// We will ignore the name provided to the constructor
		parent::_construct('customer');

		$this->add([
			'name' => 'CustomerID',
			'type' => 'hidden',
		]);
		$this->add([
			'name' => 'UserID',
			'type' => 'number',
			'options' => [
				'label' => 'UserID',
			],
		]);
		$this->add([
			'name' => 'CustomerName',
			'type' => 'text',
			'options' => [
				'label' => 'CustomerName',
			],
		]);
		$this->add([
			'name' => 'ContactName',
			'type' => 'text',
			'options' => [
				'label' => 'ContactName',
			],
		]);
		$this->add([
			'name' => 'Address',
			'type' => 'text',
			'options' => [
				'label' => 'Address',
			],
		]);
		$this->add([
			'name' => 'City',
			'type' => 'text',
			'options' => [
				'label' => 'City',
			],
		]);
		$this->add([
			'name' => 'PostalCode',
			'type' => 'text',
			'options' => [
				'label' => 'PostalCode',
			],
		]);
		$this->add([
			'name' => 'Country',
			'type' => 'text',
			'options' => [
				'label' => 'Country',
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