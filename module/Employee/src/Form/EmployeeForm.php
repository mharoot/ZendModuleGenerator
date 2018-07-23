<?php
namespace Employee\Form;

use Zend\Form\Form;

class EmployeeForm extends Form
{
	public function __construct($name = null) {
		// We will ignore the name provided to the constructor
		parent::__construct('employee');

		$this->add([
			'name' => 'EmployeeID',
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
			'name' => 'LastName',
			'type' => 'text',
			'options' => [
				'label' => 'LastName',
			],
		]);
		$this->add([
			'name' => 'FirstName',
			'type' => 'text',
			'options' => [
				'label' => 'FirstName',
			],
		]);
		$this->add([
			'name' => 'BirthDate',
			'type' => 'text',
			'options' => [
				'label' => 'BirthDate',
			],
		]);
		$this->add([
			'name' => 'Photo',
			'type' => 'text',
			'options' => [
				'label' => 'Photo',
			],
		]);
		$this->add([
			'name' => 'Notes',
			'type' => 'text',
			'options' => [
				'label' => 'Notes',
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