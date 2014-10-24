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
//filter the phone number down to just digits
		if(isset($this->data[$this->alias]['phone_number'])) {
			$this->data[$this->alias]['phone_number'] = str_replace(' ','', $this->data[$this->alias]['phone_number']);
		}
		return true;
	}

}
?>
