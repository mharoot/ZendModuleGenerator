<?php
namespace Order\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Order implements InputFilterAwareInterface { 
	public $OrderID;
	public $CustomerID;
	public $EmployeeID;
	public $OrderDate;
	public $ShipperID;
	public $OrderStatus;

	public function exchangeArray(array $data) { 
		$this->OrderID = !empty($data['OrderID']) ? $data['OrderID'] : null;
		$this->CustomerID = !empty($data['CustomerID']) ? $data['CustomerID'] : null;
		$this->EmployeeID = !empty($data['EmployeeID']) ? $data['EmployeeID'] : null;
		$this->OrderDate = !empty($data['OrderDate']) ? $data['OrderDate'] : null;
		$this->ShipperID = !empty($data['ShipperID']) ? $data['ShipperID'] : null;
		$this->OrderStatus = !empty($data['OrderStatus']) ? $data['OrderStatus'] : null;
	}

	public function getArrayCopy() { 
		return [
			'OrderID' => $this->OrderID,
			'CustomerID' => $this->CustomerID,
			'EmployeeID' => $this->EmployeeID,
			'OrderDate' => $this->OrderDate,
			'ShipperID' => $this->ShipperID,
			'OrderStatus' => $this->OrderStatus,
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
			'name' => 'OrderID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'CustomerID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'EmployeeID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'OrderDate',
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
			'name' => 'ShipperID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'OrderStatus',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$this->inputFilter = $inputFilter;
		return $this->inputFilter;
	}

}