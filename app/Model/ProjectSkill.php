<?php
App::uses('AppModel', 'Model');

Class ProjectSkill extends AppModel {
	public $belongsTo = array(
		'Project',
		'Skill' );

	public function findByName($skill_name) {
		return $this->find('first', array(
			'conditions' => array(
				'Skill.skill_name' => $skill_name)));
	}

	public function checkAndCreateSkills($data) {
		$this->explodeString($data);
debug($data);
	}

	public function explodeString($data) {
		$skills = explode(', ', $data['ProjectSkill']['skill_names']);

		foreach($skills as $skill) {
			$data['ProjectSkill'][]['skill_name'] = $skill;
		}
	}
}
?>
