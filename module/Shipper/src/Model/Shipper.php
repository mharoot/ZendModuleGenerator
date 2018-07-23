<?php
namespace Shipper\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Shipper implements InputFilterAwareInterface { 
	public $ShipperID;
	public $ShipperName;
	public $Phone;

	public function exchangeArray(array $data) { 
		$this->ShipperID = !empty($data['ShipperID']) ? $data['ShipperID'] : null;
		$this->ShipperName = !empty($data['ShipperName']) ? $data['ShipperName'] : null;
		$this->Phone = !empty($data['Phone']) ? $data['Phone'] : null;
	}

	public function getArrayCopy() { 
		return [
			'ShipperID' => $this->ShipperID,
			'ShipperName' => $this->ShipperName,
			'Phone' => $this->Phone,
		];
	}

	public function setInputFilter(InputFilterInterface $inputFilter) {
            throw new DomainException(sprintf(
                "Product does not allow injection of an alternate input filter"
            ));
        }

	public function getInputFilter() { 
		if ($this->inputFilter) {
			return $this->inputFilter;
        }
 		$inputFilter = new InputFilter();

		$inputFilter->add([
			'name' => 'ShipperID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'ShipperName',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 255,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'Phone',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 255,
					],
				],
			],
		]);
		$this->inputFilter = $inputFilter;
		return $this->inputFilter;
	}

}