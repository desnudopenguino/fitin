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

	public function findByName($skill_name) {
		return $this->find('first', array(
			'conditions' => array(
				'Skill.skill_name' => $skill_name)));
	}

	public function checkAndCreate($data) {
		if($skill = $this->findByName($data['Skill']['skill_name'])) {
		} else {
			$this->create();
			$this->save($data);
			$skill = $this->findByName($data['Skill']['skill_name']);	
		}
		return $skill;
	}
}
?>
