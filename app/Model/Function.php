<?php
App::uses('AppModel', 'Model');

Class Function extends AppModel {
	public $hasMany = array(
		'ProjectFunction'
	);
}
?>
