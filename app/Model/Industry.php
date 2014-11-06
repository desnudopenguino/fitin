<?php
App::uses('AppModel', 'Model');

Class Industry extends AppModel {
	public $hasMany = array(
		'Education'
	);
}
?>
