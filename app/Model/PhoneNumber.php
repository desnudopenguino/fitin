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
}
?>
