<?php
App::uses('AppModel', 'Model');

Class PhoneNumber extends AppModel {
	public $belongsTo = array(
		'User' => array(
			'className' => 'User'
		)
	);

	public $belongsTo = array(
		'PhoneType' => array(
			'className' => 'PhoneType'
		)
	);
}
?>
