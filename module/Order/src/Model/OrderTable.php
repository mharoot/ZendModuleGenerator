<?php

namespace Order\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class OrderTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll() {
		return $this->tableGateway->select();
    }

	public function getOrder($OrderID) {
		$OrderID = (int) $OrderID;
		$rowset = $this->tableGateway->select(['OrderID' => $OrderID]);
		$row = $rowset->current();

		if (! $row) {
			throw new RuntimeException(sprintf(
				"Could not find row with identifier $OrderID"
			));
		}

		return $row;
	}

	public function saveOrder(Order $order) {
		$data = [
			 'CustomerID' => $order->CustomerID, 
			 'EmployeeID' => $order->EmployeeID, 
			 'OrderDate' => $order->OrderDate, 
			 'ShipperID' => $order->ShipperID, 
			 'OrderStatus' => $order->OrderStatus, 
		];

		$OrderID = (int) $order->OrderID;
		if ($OrderID === 0) {
			$this->tableGateway->insert($data);
			return;
		}

		if (! $this->getOrder($OrderID)) {
			throw new RuntimeException(sprintf(
				"Cannot update Order with identifiers $OrderID"
			));
		}

		$this->tableGateway->update($data, ['OrderID' => $OrderID]);
	}

	public function deleteOrder($OrderID){
		$this->tableGateway->delete(['OrderID' => (int) $OrderID]);
	}

}
