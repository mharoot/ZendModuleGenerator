<?php
namespace Orderdetail\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class Orderdetail implements InputFilterAwareInterface { 
	public $OrderDetailID;
	public $OrderID;
	public $ProductID;
	public $Quantity;

	public function exchangeArray(array $data) { 
		$this->OrderDetailID = !empty($data['OrderDetailID']) ? $data['OrderDetailID'] : null;
		$this->OrderID = !empty($data['OrderID']) ? $data['OrderID'] : null;
		$this->ProductID = !empty($data['ProductID']) ? $data['ProductID'] : null;
		$this->Quantity = !empty($data['Quantity']) ? $data['Quantity'] : null;
	}

	public function getArrayCopy() { 
		return [
			'OrderDetailID' => $this->OrderDetailID,
			'OrderID' => $this->OrderID,
			'ProductID' => $this->ProductID,
			'Quantity' => $this->Quantity,
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
			'name' => 'OrderDetailID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'OrderID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'ProductID',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'Quantity',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$this->inputFilter = $inputFilter;
		return $this->inputFilter;
	}

}