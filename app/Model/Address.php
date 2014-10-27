<?php
App::uses('AppModel', 'Model');

Class Address extends AppModel {
	public $belongsTo = array(
		'User' => array(
			'className' => 'User'
		),
		'State' => array(
			'className' => 'State'
		)
	);
}
?>
