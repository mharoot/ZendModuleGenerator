<?php

namespace Supplier\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class SupplierTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll() {
		return $this->tableGateway->select();
    }

	public function getSupplier($SupplierID) {
		$SupplierID = (int) $SupplierID;
		$rowset = $this->tableGateway->select(['SupplierID' => $SupplierID]);
		$row = $rowset->current();

		if (! $row) {
			throw new RuntimeException(sprintf(
				"Could not find row with identifier $SupplierID"
			));
		}

		return $row;
	}

	public function saveSupplier(Supplier $supplier) {
		$data = [
			 'UserID' => $supplier->UserID, 
			 'SupplierName' => $supplier->SupplierName, 
			 'ContactName' => $supplier->ContactName, 
			 'Address' => $supplier->Address, 
			 'City' => $supplier->City, 
			 'PostalCode' => $supplier->PostalCode, 
			 'Country' => $supplier->Country, 
			 'Phone' => $supplier->Phone, 
		];

		$SupplierID = (int) $supplier->SupplierID;
		if ($SupplierID === 0) {
			$this->tableGateway->insert($data);
			return;
		}

		if (! $this->getSupplier($SupplierID)) {
			throw new RuntimeException(sprintf(
				"Cannot update Supplier with identifiers $SupplierID"
			));
		}

		$this->tableGateway->update($data, ['SupplierID' => $SupplierID]);
	}

	public function deleteSupplier($SupplierID){
		$this->tableGateway->delete(['SupplierID' => (int) $SupplierID]);
	}

}
