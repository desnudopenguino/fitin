<?php
App::uses('AppModel', 'Model');

Class Skill extends AppModel {
	public $hasMany = array(
		'ProjectSkill'
	);
}
?>
