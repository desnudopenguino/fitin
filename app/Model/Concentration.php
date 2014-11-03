<?php
App::uses('AppModel', 'Model');

Class Concentration extends AppModel {
	public $hasMany = array(
		'Education' => array(
			'className' => 'Education'
		)
	);
}
?>
