<?php

App::uses('AppModel', 'Model');

Class UserLevel extends AppModel {
	
	public $hasMany = array(
		'User');
}
?>
