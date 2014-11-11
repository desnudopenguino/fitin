<?php
App::uses('AppModel', 'Model');

Class PositionSkill extends AppModel {
	public $belongsTo = array(
		'Position',
		'Skill' );
}
?>
