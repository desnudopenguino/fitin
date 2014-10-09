<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

Class User extends AppModel {
	public $validate = array(
		'email' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => "Email is blank" 
			)
		),

		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => "Password is blank"
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
