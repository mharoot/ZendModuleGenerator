<?php
namespace Supplier\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Supplier implements InputFilterAwareInterface { 
	public $SupplierID;
	public $UserID;
	public $SupplierName;
	public $ContactName;
	public $Address;
	public $City;
	public $PostalCode;
	public $Country;
	public $Phone;

	public function exchangeArray(array $data) { 
		$this->SupplierID = !empty($data['SupplierID']) ? $data['SupplierID'] : null;
		$this->UserID = !empty($data['UserID']) ? $data['UserID'] : null;
		$this->SupplierName = !empty($data['SupplierName']) ? $data['SupplierName'] : null;
		$this->ContactName = !empty($data['ContactName']) ? $data['ContactName'] : null;
		$this->Address = !empty($data['Address']) ? $data['Address'] : null;
		$this->City = !empty($data['City']) ? $data['City'] : null;
		$this->PostalCode = !empty($data['PostalCode']) ? $data['PostalCode'] : null;
		$this->Country = !empty($data['Country']) ? $data['Country'] : null;
		$this->Phone = !empty($data['Phone']) ? $data['Phone'] : null;
	}

	public function getArrayCopy() { 
		return [
			'SupplierID' => $this->SupplierID,
			'UserID' => $this->UserID,
			'SupplierName' => $this->SupplierName,
			'ContactName' => $this->ContactName,
			'Address' => $this->Address,
			'City' => $this->City,
			'PostalCode' => $this->PostalCode,
			'Country' => $this->Country,
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
			'name' => 'SupplierID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'UserID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'SupplierName',
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
			'name' => 'ContactName',
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
			'name' => 'Address',
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
			'name' => 'City',
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
			'name' => 'PostalCode',
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
			'name' => 'Country',
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