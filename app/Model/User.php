<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

Class User extends AppModel {
	public $hasOne = array( 
		'Applicant' => array(
			'className' => 'Applicant',
			'dependent' => true,
			'foreignKey' => 'user_id'
		),
		'Employer',
		'Address' => array(
			'className' => 'Address',
			'dependent' => true,
			'foreignKey' => 'user_id'
		),
		'PhoneNumber' => array(
			'className' => 'PhoneNumber',
			'dependent' => true
		)
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

		'roleId' => array(
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
    return true;
	}
}
?>
