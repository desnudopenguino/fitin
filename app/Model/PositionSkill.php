<?php
App::uses('AppModel', 'Model');

Class PositionSkill extends AppModel {
	public $belongsTo = array(
		'Position',
		'Skill' );

	public function explode($data) {
		$skills = explode(', ', $data['PositionSkill']['skill_names']);
		unset($data['PositionSkill']['skill_names']);

		foreach($skills as $skill) {
			$data['PositionSkill'][]['Skill']['skill_type'] = $skill;
		}
		return $data;
	}

	public function checkAndCreate($data) {
		$data = $this->explode($data);

		foreach($data['PositionSkill'] as $sKey => $project_skill) {
			$skill = $this->Skill->checkAndCreate($project_skill);
			unset($data['PositionSkill'][$sKey]['Skill']);
			$data['PositionSkill'][$sKey]['skill_id'] = $skill['Skill']['id'];
		}
		return $data;
	} 
}
?>
