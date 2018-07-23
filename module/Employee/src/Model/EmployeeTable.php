<?php

namespace Employee\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EmployeeTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll() {
		return $this->tableGateway->select();
    }

	public function getEmployee($EmployeeID) {
		$EmployeeID = (int) $EmployeeID;
		$rowset = $this->tableGateway->select(['EmployeeID' => $EmployeeID]);
		$row = $rowset->current();

		if (! $row) {
			throw new RuntimeException(sprintf(
				"Could not find row with identifier $EmployeeID"
			));
		}

		return $row;
	}

	public function saveEmployee(Employee $employee) {
		$data = [
			 'UserID' => $employee->UserID, 
			 'LastName' => $employee->LastName, 
			 'FirstName' => $employee->FirstName, 
			 'BirthDate' => $employee->BirthDate, 
			 'Photo' => $employee->Photo, 
			 'Notes' => $employee->Notes, 
		];

		$EmployeeID = (int) $employee->EmployeeID;
		if ($EmployeeID === 0) {
			$this->tableGateway->insert($data);
			return;
		}

		if (! $this->getEmployee($EmployeeID)) {
			throw new RuntimeException(sprintf(
				"Cannot update Employee with identifiers $EmployeeID"
			));
		}

		$this->tableGateway->update($data, ['EmployeeID' => $EmployeeID]);
	}

	public function deleteEmployee($EmployeeID){
		$this->tableGateway->delete(['EmployeeID' => (int) $EmployeeID]);
	}

}
