<?php
App::uses('AppModel', 'Model');

Class State extends AppModel {
	public $hasMany = array(
		'Address' => array(
			'className' => 'Adderss'
		)
	);
}
?>
