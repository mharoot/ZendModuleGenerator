<?php

namespace Customer\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class CustomerTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll() {
		return $this->tableGateway->select();
    }

	public function getCustomer($CustomerID) {
		$CustomerID = (int) $CustomerID;
		$rowset = $this->tableGateway->select(['CustomerID' => $CustomerID]);
		$row = $rowset->current();

		if (! $row) {
			throw new RuntimeException(sprintf(
				"Could not find row with identifier $CustomerID"
			));
		}

		return $row;
	}

	public function saveCustomer(Customer $customer) {
		$data = [
			 'UserID' => $customer->UserID, 
			 'CustomerName' => $customer->CustomerName, 
			 'ContactName' => $customer->ContactName, 
			 'Address' => $customer->Address, 
			 'City' => $customer->City, 
			 'PostalCode' => $customer->PostalCode, 
			 'Country' => $customer->Country, 
		];

		$CustomerID = (int) $customer->CustomerID;
		if ($CustomerID === 0) {
			$this->tableGateway->insert($data);
			return;
		}

		if (! $this->getCustomer($CustomerID)) {
			throw new RuntimeException(sprintf(
				"Cannot update Customer with identifiers $CustomerID"
			));
		}

		$this->tableGateway->update($data, ['CustomerID' => $CustomerID]);
	}

	public function deleteCustomer($CustomerID){
		$this->tableGateway->delete(['CustomerID' => (int) $CustomerID]);
	}

}
