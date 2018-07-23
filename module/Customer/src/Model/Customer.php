<?php
namespace Customer\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Customer implements InputFilterAwareInterface { 
	public $CustomerID;
	public $UserID;
	public $CustomerName;
	public $ContactName;
	public $Address;
	public $City;
	public $PostalCode;
	public $Country;

	public function exchangeArray(array $data) { 
		$this->CustomerID = !empty($data['CustomerID']) ? $data['CustomerID'] : null;
		$this->UserID = !empty($data['UserID']) ? $data['UserID'] : null;
		$this->CustomerName = !empty($data['CustomerName']) ? $data['CustomerName'] : null;
		$this->ContactName = !empty($data['ContactName']) ? $data['ContactName'] : null;
		$this->Address = !empty($data['Address']) ? $data['Address'] : null;
		$this->City = !empty($data['City']) ? $data['City'] : null;
		$this->PostalCode = !empty($data['PostalCode']) ? $data['PostalCode'] : null;
		$this->Country = !empty($data['Country']) ? $data['Country'] : null;
	}

	public function getArrayCopy() { 
		return [
			'CustomerID' => $this->CustomerID,
			'UserID' => $this->UserID,
			'CustomerName' => $this->CustomerName,
			'ContactName' => $this->ContactName,
			'Address' => $this->Address,
			'City' => $this->City,
			'PostalCode' => $this->PostalCode,
			'Country' => $this->Country,
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
			'name' => 'CustomerID',
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
			'name' => 'CustomerName',
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
		$this->inputFilter = $inputFilter;
		return $this->inputFilter;
	}

}