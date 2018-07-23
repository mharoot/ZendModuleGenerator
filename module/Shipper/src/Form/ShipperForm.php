<?php
namespace Shipper\Form;

use Zend\Form\Form;

class ShipperForm extends Form
{
	public function __construct($name = null) {
		// We will ignore the name provided to the constructor
		parent::_construct('shipper');

		$this->add([
			'name' => 'ShipperID',
			'type' => 'hidden',
		]);
		$this->add([
			'name' => 'ShipperName',
			'type' => 'text',
			'options' => [
				'label' => 'ShipperName',
			],
		]);
		$this->add([
			'name' => 'Phone',
			'type' => 'text',
			'options' => [
				'label' => 'Phone',
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