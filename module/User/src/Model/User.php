<?php
namespace User\Model;
use DomainException;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Filter\ToInt;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Validator\StringLength;

class User implements InputFilterAwareInterface { 
	public $user_id;
	public $first_name;
	public $last_name;
	public $user_name;
	public $user_password_hash;
	public $user_email;
	public $user_active;
	public $user_activation_hash;
	public $user_password_reset_hash;
	public $user_password_reset_timestamp;
	public $user_rememberme_token;
	public $user_failed_logins;
	public $user_last_failed_login;
	public $user_registration_datetime;
	public $user_registration_ip;
	public $user_type;

	public function exchangeArray(array $data) { 
		$this->user_id = !empty($data['user_id']) ? $data['user_id'] : null;
		$this->first_name = !empty($data['first_name']) ? $data['first_name'] : null;
		$this->last_name = !empty($data['last_name']) ? $data['last_name'] : null;
		$this->user_name = !empty($data['user_name']) ? $data['user_name'] : null;
		$this->user_password_hash = !empty($data['user_password_hash']) ? $data['user_password_hash'] : null;
		$this->user_email = !empty($data['user_email']) ? $data['user_email'] : null;
		$this->user_active = !empty($data['user_active']) ? $data['user_active'] : null;
		$this->user_activation_hash = !empty($data['user_activation_hash']) ? $data['user_activation_hash'] : null;
		$this->user_password_reset_hash = !empty($data['user_password_reset_hash']) ? $data['user_password_reset_hash'] : null;
		$this->user_password_reset_timestamp = !empty($data['user_password_reset_timestamp']) ? $data['user_password_reset_timestamp'] : null;
		$this->user_rememberme_token = !empty($data['user_rememberme_token']) ? $data['user_rememberme_token'] : null;
		$this->user_failed_logins = !empty($data['user_failed_logins']) ? $data['user_failed_logins'] : null;
		$this->user_last_failed_login = !empty($data['user_last_failed_login']) ? $data['user_last_failed_login'] : null;
		$this->user_registration_datetime = !empty($data['user_registration_datetime']) ? $data['user_registration_datetime'] : null;
		$this->user_registration_ip = !empty($data['user_registration_ip']) ? $data['user_registration_ip'] : null;
		$this->user_type = !empty($data['user_type']) ? $data['user_type'] : null;
	}

	public function getArrayCopy() { 
		return [
			'user_id' => $this->user_id,
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'user_name' => $this->user_name,
			'user_password_hash' => $this->user_password_hash,
			'user_email' => $this->user_email,
			'user_active' => $this->user_active,
			'user_activation_hash' => $this->user_activation_hash,
			'user_password_reset_hash' => $this->user_password_reset_hash,
			'user_password_reset_timestamp' => $this->user_password_reset_timestamp,
			'user_rememberme_token' => $this->user_rememberme_token,
			'user_failed_logins' => $this->user_failed_logins,
			'user_last_failed_login' => $this->user_last_failed_login,
			'user_registration_datetime' => $this->user_registration_datetime,
			'user_registration_ip' => $this->user_registration_ip,
			'user_type' => $this->user_type,
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
			'name' => 'user_id',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'first_name',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 64,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'last_name',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 64,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_name',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 64,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_password_hash',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 255,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_email',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 64,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_active',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'user_activation_hash',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 40,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_password_reset_hash',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 40,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_password_reset_timestamp',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'user_rememberme_token',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 64,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_failed_logins',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'user_last_failed_login',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$inputFilter->add([
			'name' => 'user_registration_datetime',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 20,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_registration_ip',
			'required' => true,
			'filters' => [ 
				['name' => StripTags::class],
				['name' => StringTrim::class],
			],
			'validators' => [ 
				[					'name' => StringLength::class,
					'options' => [ 
						'encoding' => 'UTF-8',
						'min' => 1, 'max' => 39,
					],
				],
			],
		]);
		$inputFilter->add([
			'name' => 'user_type',
			'required' => true,
			'filters' => [ 
				['name' => ToInt::class],
			],
		]);
		$this->inputFilter = $inputFilter;
		return $this->inputFilter;
	}

}