<?php
App::uses('AppModel', 'Model');

Class PhoneNumber extends AppModel {
	public $belongsTo = array(
		'User' => array(
			'className' => 'User'
		),
		'PhoneType' => array(
			'className' => 'PhoneType'
		)
	);

	public $validate = array(
		'phone_number' => array(
			'isPhoneNumber' => array(
				'rule' => array('phone', null, 'us'),
				'message' => "Not a valid telephone number"
			)
		)	
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['user_id'] = AuthComponent::user('id');
		return true;
	}

	public function afterFind($results, $primary = false) {
debug($results);
		if(empty($result['PhoneNumber'] || empty($result['PhoneNumber']['phone_number']))) {
			$result['PhoneNumber']['phone_number'] = $this->buildEmpty();
		}
	}

	public function buildEmpty() {
		return '### ### ####';
	}
}
?>
