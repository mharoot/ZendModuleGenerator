<?php
namespace Category\Form;

use Zend\Form\Form;

class CategoryForm extends Form
{
	public function __construct($name = null) {
		// We will ignore the name provided to the constructor
		parent::_construct('category');

		$this->add([
			'name' => 'CategoryID',
			'type' => 'hidden',
		]);
		$this->add([
			'name' => 'CategoryName',
			'type' => 'text',
			'options' => [
				'label' => 'CategoryName',
			],
		]);
		$this->add([
			'name' => 'Description',
			'type' => 'text',
			'options' => [
				'label' => 'Description',
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