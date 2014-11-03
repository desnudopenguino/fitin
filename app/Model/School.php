<?php
App::uses('AppModel', 'Model');

Class School extends AppModel {
	public $hasMany = array(
		'Education' => array(
			'className' => 'Education'
		)
	);
}
?>
