<?php

namespace Category\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class CategoryTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll() {
		return $this->tableGateway->select();
    }

	public function getCategory($CategoryID) {
		$CategoryID = (int) $CategoryID;
		$rowset = $this->tableGateway->select(['CategoryID' => $CategoryID]);
		$row = $rowset->current();

		if (! $row) {
			throw new RuntimeException(sprintf(
				"Could not find row with identifier $CategoryID"
			));
		}

		return $row;
	}

	public function saveCategory(Category $category) {
		$data = [
			 'CategoryName' => $category->CategoryName, 
			 'Description' => $category->Description, 
		];

		$CategoryID = (int) $category->CategoryID;
		if ($CategoryID === 0) {
			$this->tableGateway->insert($data);
			return;
		}

		if (! $this->getCategory($CategoryID)) {
			throw new RuntimeException(sprintf(
				"Cannot update Category with identifiers $CategoryID"
			));
		}

		$this->tableGateway->update($data, ['CategoryID' => $CategoryID]);
	}

	public function deleteCategory($CategoryID){
		$this->tableGateway->delete(['CategoryID' => (int) $CategoryID]);
	}

}
