<?php

namespace Shipper\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ShipperTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll() {
		return $this->tableGateway->select();
    }

	public function getShipper($ShipperID) {
		$ShipperID = (int) $ShipperID;
		$rowset = $this->tableGateway->select(['ShipperID' => $ShipperID]);
		$row = $rowset->current();

		if (! $row) {
			throw new RuntimeException(sprintf(
				"Could not find row with identifier $ShipperID"
			));
		}

		return $row;
	}

	public function saveShipper(Shipper $shipper) {
		$data = [
			 'ShipperName' => $shipper->ShipperName, 
			 'Phone' => $shipper->Phone, 
		];

		$ShipperID = (int) $shipper->ShipperID;
		if ($ShipperID === 0) {
			$this->tableGateway->insert($data);
			return;
		}

		if (! $this->getShipper($ShipperID)) {
			throw new RuntimeException(sprintf(
				"Cannot update Shipper with identifiers $ShipperID"
			));
		}

		$this->tableGateway->update($data, ['ShipperID' => $ShipperID]);
	}

	public function deleteShipper($ShipperID){
		$this->tableGateway->delete(['ShipperID' => (int) $ShipperID]);
	}

}
