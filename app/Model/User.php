<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

Class User extends AppModel {

	public $belongsTo = array(
		'UserLevel');

	public $hasOne = array( 
		'Setting',
		'Customer',
		'Applicant',
		'Employer',
		'Address',
		'PhoneNumber'
	);

	public $hasMany = array(
		'UserCultureAnswer',
		'Request',
		'Message' => array(
			'foreignKey' => 'receiver_id'),
		'Message' => array(
			'foreignKey' => 'sender_id')
		);

	public $validate = array(
		'email' => array(
			'isEmail' => array(
				'rule' => array('email'),
				'message' => "Not a valid email"
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => "An account with that email already exists"
			)
		),

		'url' => array(
			'uniqueURL' => array(
				'required' => false,
				'allowEmpty' => false,
				'rule' => array('isUnique'),
				'message' => array('This custom URL is already in use, please enter a different one'))),
		
		'email_confirmation' => array(
			'compare_emails' => array(
				'rule' => array('compare_emails'),
				'message' => "Email fields must match"
			)
		),

		'password' => array(
			'minLength' => array(
				'rule' => array('minLength',8),
				'message' => "Password minimum length is 8 characters"
			)
		),
		
		'password_confirmation' => array(
			'compare_passwords' => array(
				'rule' => array('compare_passwords'),
				'message' => "Password fields must match"
			)
		),
		
		'role_id' => array(
			'required' => array(
				'rule' => array('naturalNumber'),
				'message' => "Role is not valid"
			)
		)
	);	

	public function compare_passwords() {
		return ($this->data[$this->alias]['password'] === $this->data[$this->alias]['password_confirmation']);
	}

	public function compare_emails() {
		return ($this->data[$this->alias]['email'] === $this->data[$this->alias]['email_confirmation']);
	}

	public function beforeSave($options = array()) {
// hash the password
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
   }
// initially generate the url // generate default url if user_level_id is 10 or 20 in data
		if(isset($this->data[$this->alias]['email'])) {
			$this->data[$this->alias]['url'] = md5($this->data[$this->alias]['email']);
		} else if(isset($this->data[$this->alias]['user_level_id']) && 
			($this->data[$this->alias]['user_level_id'] == 10 || 
			$this->data[$this->alias]['user_level_id'] == 20)) {
				$this->data[$this->alias]['url'] = md5(AuthComponent::user('email'));
		} 

//check if user has pre-url, prepend pre-url to url 
		if(isset($this->data[$this->alias]['pre_url'])) {
			$this->data[$this->alias]['url'] = $this->data[$this->alias]['pre_url']."".$this->data[$this->alias]['url'];
		}
// check/set referral for user
		App::uses('CakeSession', 'Model/Datasource');
		$referral_id = CakeSession::read('referral');
		if(!empty($referral_id)) {
			$this->data[$this->alias]['referral_id'] = $referral_id;
			CakeSession::delete('referral');
		}

    return true;
	}

	public function findIdByUrl($url = null) {
		$user = $this->find('first', array(
			'conditions' => array(
				'User.url' => $url),
			'fields' => array(
				'User.id')));
		return $user;
	}

	public function findStatusId($id) {
		$user = $this->find('first', array(
			'conditions' => array(
				'User.id' => $id),
			'fields' => array(
				'User.status_id')));
		return $user;
	}

//updates the user level based on the stripe membership plan used
	public function updateUserLevel($user_id,$user_level) {
		$user = array($this->alias =>array());
		$user[$this->alias]['id'] = $user_id;
		switch($user_level) {
			case "EmpEnt":
				$user[$this->alias]['user_level_id'] = 12;
				break;
			case "EmpPrem":
				$user[$this->alias]['user_level_id'] = 11;
				break;
			case "AppPremYr":
				$user[$this->alias]['user_level_id'] = 22;
				break;
			case "AppPremMon":
				$user[$this->alias]['user_level_id'] = 21;
				break;
			case "AppPass":
				$user[$this->alias]['user_level_id'] = 20;
				break;
			case "EmpPass":
				$user[$this->alias]['user_level_id'] = 10;
				break;
			default:
				$user[$this->alias]['user_level_id'] = 0;
				break;
		}
		if($this->save($user)) {
			return true;
		} else {
			return false;
		}
	}

	public function findCustomer($user_id) {
		$customer = $this->Customer->find('first', array(
			'conditions' => array(
				'Customer.user_id' => $user_id),
			'fields' => array(
				'Customer.id')));
		return $customer;
	}

	public function findCustomerId($user_id) {
		$customer = $this->Customer->find('first', array(
			'conditions' => array(
				'Customer.user_id' => $user_id),
			'fields' => array(
				'Customer.customer_id')));
		return $customer['Customer']['customer_id'];
	}

	public function findSettings($user_id) {
		return $this->find('first', array(
			'conditions' => array(
				'User.id' => $user_id),
			'contain' => array(
				'Setting',
				'Customer',
					'UserLevel')));
	}

	public function findId($user_id) {
		return $this->find('first', array(
			'conditions' => array(
				'User.id' => $user_id),
			'fields' => array(
				'User.id',
				'User.user_level_id')));
	}
} ?>
