<?php
App::uses('AppModel', 'Model');

Class WorkFunction extends AppModel {
	public $hasMany = array(
		'ProjectFunction',
		'PositionFunction'
	);
}
?>
