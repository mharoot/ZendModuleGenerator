<?php

namespace Orderdetail\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class OrderdetailTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll() {
		return $this->tableGateway->select();
    }

	public function getOrderdetail($OrderDetailID) {
		$OrderDetailID = (int) $OrderDetailID;
		$rowset = $this->tableGateway->select(['OrderDetailID' => $OrderDetailID]);
		$row = $rowset->current();

		if (! $row) {
			throw new RuntimeException(sprintf(
				"Could not find row with identifier $OrderDetailID"
			));
		}

		return $row;
	}

	public function saveOrderdetail(Orderdetail $orderdetail) {
		$data = [
			 'OrderID' => $orderdetail->OrderID, 
			 'ProductID' => $orderdetail->ProductID, 
			 'Quantity' => $orderdetail->Quantity, 
		];

		$OrderDetailID = (int) $orderdetail->OrderDetailID;
		if ($OrderDetailID === 0) {
			$this->tableGateway->insert($data);
			return;
		}

		if (! $this->getOrderdetail($OrderDetailID)) {
			throw new RuntimeException(sprintf(
				"Cannot update Orderdetail with identifiers $OrderDetailID"
			));
		}

		$this->tableGateway->update($data, ['OrderDetailID' => $OrderDetailID]);
	}

	public function deleteOrderdetail($OrderDetailID){
		$this->tableGateway->delete(['OrderDetailID' => (int) $OrderDetailID]);
	}

}
