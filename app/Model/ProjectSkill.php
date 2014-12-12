<?php
App::uses('AppModel', 'Model');

Class ProjectSkill extends AppModel {
	public $belongsTo = array(
		'Project',
		'Skill' );

	public function explode($data) {
		$data['ProjectSkill']['skill_names'] = preg_replace('/,\s+/', ',', $data['ProjectSkill']['skill_names']);
		$skills = explode(',', $data['ProjectSkill']['skill_names']);
		unset($data['ProjectSkill']['skill_names']);

		foreach($skills as $skill) {
			if($skill != '') {
				$data['ProjectSkill'][]['Skill']['skill_type'] = $skill;
			}
		}
		return $data;
	}

	public function checkAndCreate($data) {
		$data = $this->explode($data);
		$skills = $this->findProjectSkills($data['Project']['id']);
debug($skills);
		foreach($data['ProjectSkill'] as $sKey => $project_skill) {
			$skill = $this->Skill->checkAndCreate($project_skill);
			unset($data['ProjectSkill'][$sKey]['Skill']);
			$data['ProjectSkill'][$sKey]['skill_id'] = $skill['Skill']['id'];
		}
		return $data;
	} 

	public function findProjectSkills($project_id) {
		$skills = $this->find('list', array(
			'fields' => array(
				'ProjectSkill.id','ProjectSkill.skill_id'),
			'conditions' => array(
				'ProjectSkill.project_id' => $project_id)));
		return $skills;
	}
}
?>
