<?php
namespace User\Form;

use Zend\Form\Form;

class UserForm extends Form
{
	public function __construct($name = null) {
		// We will ignore the name provided to the constructor
		parent::_construct('user');

		$this->add([
			'name' => 'user_id',
			'type' => 'hidden',
		]);
		$this->add([
			'name' => 'first_name',
			'type' => 'text',
			'options' => [
				'label' => 'First_name',
			],
		]);
		$this->add([
			'name' => 'last_name',
			'type' => 'text',
			'options' => [
				'label' => 'Last_name',
			],
		]);
		$this->add([
			'name' => 'user_name',
			'type' => 'text',
			'options' => [
				'label' => 'User_name',
			],
		]);
		$this->add([
			'name' => 'user_password_hash',
			'type' => 'text',
			'options' => [
				'label' => 'User_password_hash',
			],
		]);
		$this->add([
			'name' => 'user_email',
			'type' => 'text',
			'options' => [
				'label' => 'User_email',
			],
		]);
		$this->add([
			'name' => 'user_active',
			'type' => 'number',
			'options' => [
				'label' => 'User_active',
			],
		]);
		$this->add([
			'name' => 'user_activation_hash',
			'type' => 'text',
			'options' => [
				'label' => 'User_activation_hash',
			],
		]);
		$this->add([
			'name' => 'user_password_reset_hash',
			'type' => 'text',
			'options' => [
				'label' => 'User_password_reset_hash',
			],
		]);
		$this->add([
			'name' => 'user_password_reset_timestamp',
			'type' => 'number',
			'options' => [
				'label' => 'User_password_reset_timestamp',
			],
		]);
		$this->add([
			'name' => 'user_rememberme_token',
			'type' => 'text',
			'options' => [
				'label' => 'User_rememberme_token',
			],
		]);
		$this->add([
			'name' => 'user_failed_logins',
			'type' => 'number',
			'options' => [
				'label' => 'User_failed_logins',
			],
		]);
		$this->add([
			'name' => 'user_last_failed_login',
			'type' => 'number',
			'options' => [
				'label' => 'User_last_failed_login',
			],
		]);
		$this->add([
			'name' => 'user_registration_datetime',
			'type' => 'text',
			'options' => [
				'label' => 'User_registration_datetime',
			],
		]);
		$this->add([
			'name' => 'user_registration_ip',
			'type' => 'text',
			'options' => [
				'label' => 'User_registration_ip',
			],
		]);
		$this->add([
			'name' => 'user_type',
			'type' => 'number',
			'options' => [
				'label' => 'User_type',
			],
		]);
		$this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
	}

}