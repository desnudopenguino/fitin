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

	public function findByName($skill_type) {
		return $this->find('first', array(
			'conditions' => array(
				'Skill.skill_type' => $skill_type)));
	}

	public function checkAndCreate($data) {
		if($skill = $this->findByName($data['Skill']['skill_type'])) {
		} else {
			$this->create();
			$this->save($data);
			$skill = $this->findByName($data['Skill']['skill_type']);	
		}
		return $skill;
	}
}
?>
