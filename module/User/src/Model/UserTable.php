<?php

namespace User\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class UserTable
{
	private $tableGateway;

	public function __construct(TableGatewayInterface $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll() {
		return $this->tableGateway->select();
    }

	public function getUser($user_id) {
		$user_id = (int) $user_id;
		$rowset = $this->tableGateway->select(['user_id' => $user_id]);
		$row = $rowset->current();

		if (! $row) {
			throw new RuntimeException(sprintf(
				"Could not find row with identifier $user_id"
			));
		}

		return $row;
	}

	public function saveUser(User $user) {
		$data = [
			 'first_name' => $user->first_name, 
			 'last_name' => $user->last_name, 
			 'user_name' => $user->user_name, 
			 'user_password_hash' => $user->user_password_hash, 
			 'user_email' => $user->user_email, 
			 'user_active' => $user->user_active, 
			 'user_activation_hash' => $user->user_activation_hash, 
			 'user_password_reset_hash' => $user->user_password_reset_hash, 
			 'user_password_reset_timestamp' => $user->user_password_reset_timestamp, 
			 'user_rememberme_token' => $user->user_rememberme_token, 
			 'user_failed_logins' => $user->user_failed_logins, 
			 'user_last_failed_login' => $user->user_last_failed_login, 
			 'user_registration_datetime' => $user->user_registration_datetime, 
			 'user_registration_ip' => $user->user_registration_ip, 
			 'user_type' => $user->user_type, 
		];

		$user_id = (int) $user->user_id;
		if ($user_id === 0) {
			$this->tableGateway->insert($data);
			return;
		}

		if (! $this->getUser($user_id)) {
			throw new RuntimeException(sprintf(
				"Cannot update User with identifiers $user_id"
			));
		}

		$this->tableGateway->update($data, ['user_id' => $user_id]);
	}

	public function deleteUser($user_id){
		$this->tableGateway->delete(['user_id' => (int) $user_id]);
	}

}
