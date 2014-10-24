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
				'rule' => array('tel'),
				'message' => "Not a valid telephone number"
			)
		)	
	);
}
?>
