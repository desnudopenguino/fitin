<?php
App::uses('AppModel', 'Model');

Class ProjectSkill extends AppModel {
	public $belongsTo = array(
		'Project',
		'Skill' );

	public function explode($data) {
		$skills = explode(', ', $data['ProjectSkill']['skill_names']);
		unset($data['ProjectSkill']['skill_names']);

		foreach($skills as $skill) {
			$data['ProjectSkill'][]['Skill']['skill_name'] = $skill;
		}
		return $data;
	}

	public function checkAndCreate($data) {
		$data = $this->explode($data);

		foreach($data['ProjectSkill'] as $project_skill) {
			$this->Skill->checkAndCreate($project_skill);
		}
	} 
}
?>
