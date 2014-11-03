<?php
App::uses('AppModel', 'Model');

Class Degree extends AppModel {
	public $hasMany = array(
		'Education' => array(
			'className' => 'Education'
		)
	);
}
?>
