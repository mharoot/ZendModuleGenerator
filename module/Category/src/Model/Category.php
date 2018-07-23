<?php
namespace Category\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Category implements InputFilterAwareInterface { 
	public $CategoryID;
	public $CategoryName;
	public $Description;

	public function exchangeArray(array $data) { 
		$this->CategoryID = !empty($data['CategoryID']) ? $data['CategoryID'] : null;
		$this->CategoryName = !empty($data['CategoryName']) ? $data['CategoryName'] : null;
		$this->Description = !empty($data['Description']) ? $data['Description'] : null;
	}

	public function getArrayCopy() { 
		return [
			'CategoryID' => $this->CategoryID,
			'CategoryName' => $this->CategoryName,
			'Description' => $this->Description,
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
			'name' => 'CategoryID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'CategoryName',
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
			'name' => 'Description',
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