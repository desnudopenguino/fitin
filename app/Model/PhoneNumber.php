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

	public $validate = array();

	public function beforeSave($options = array()) {
		return true;
	}
}
?>
