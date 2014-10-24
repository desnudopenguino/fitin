<?php
App::uses('AppModel', 'Model');

Class PhoneType extends AppModel {
	public $hasMany = array(
		'PhoneNumber' => array(
			'className' => 'PhoneNumber'
		)
	);
}
?>
