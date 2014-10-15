<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

Class User extends AppModel {
	public $validate = array(
		'email' => array(
			'blankEmail' => array(
				'rule' => array('notEmpty'),
				'message' => "Email is blank" 
			),
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
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => "Password is blank"
			),
			'minLength' => array(
				'rule' => array('minLength',8),
				'message' => "Password minimum length is 8 characters"
			)
		),

		'roleId' => array(
			'required' => array(
				'rule' => array('naturalNumber', true),
				'message' => "Role is not valid"
			)
		)
	);	

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
    }
    return true;
	}
}

?>
