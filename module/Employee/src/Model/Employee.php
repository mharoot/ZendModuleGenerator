<?php
namespace Employee\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Employee implements InputFilterAwareInterface { 
	public $EmployeeID;
	public $UserID;
	public $LastName;
	public $FirstName;
	public $BirthDate;
	public $Photo;
	public $Notes;

	public function exchangeArray(array $data) { 
		$this->EmployeeID = !empty($data['EmployeeID']) ? $data['EmployeeID'] : null;
		$this->UserID = !empty($data['UserID']) ? $data['UserID'] : null;
		$this->LastName = !empty($data['LastName']) ? $data['LastName'] : null;
		$this->FirstName = !empty($data['FirstName']) ? $data['FirstName'] : null;
		$this->BirthDate = !empty($data['BirthDate']) ? $data['BirthDate'] : null;
		$this->Photo = !empty($data['Photo']) ? $data['Photo'] : null;
		$this->Notes = !empty($data['Notes']) ? $data['Notes'] : null;
	}

	public function getArrayCopy() { 
		return [
			'EmployeeID' => $this->EmployeeID,
			'UserID' => $this->UserID,
			'LastName' => $this->LastName,
			'FirstName' => $this->FirstName,
			'BirthDate' => $this->BirthDate,
			'Photo' => $this->Photo,
			'Notes' => $this->Notes,
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
			'name' => 'EmployeeID',
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
			'name' => 'LastName',
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
			'name' => 'FirstName',
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
			'name' => 'BirthDate',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 0,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'Photo',
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
			'name' => 'Notes',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 0,
					],
				],
			],
		]);
		$this->inputFilter = $inputFilter;
		return $this->inputFilter;
	}

}