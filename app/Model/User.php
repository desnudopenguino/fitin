<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

Class User extends AppModel {
	public $hasOne = array( 
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

		'password' => array(
			'minLength' => array(
				'rule' => array('minLength',8),
				'message' => "Password minimum length is 8 characters"
			)
		),

		'role_id' => array(
			'required' => array(
				'rule' => array('naturalNumber'),
				'message' => "Role is not valid"
			)
		)
	);	

	public function beforeSave($options = array()) {
// hash the password
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
   }
// generate the url
		if(isset($this->data[$this->alias]['email'])) {
			$this->data[$this->alias]['url'] = md5($this->data[$this->alias]['email']);
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
}
?>
