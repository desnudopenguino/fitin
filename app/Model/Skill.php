<?php
App::uses('AppModel', 'Model');

Class Skill extends AppModel {
	public $hasMany = array(
		'ProjectSkill',
		'PositionSkill'
	);

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'Skill.id', 'Skill.skill_type')));
	}
}
?>
