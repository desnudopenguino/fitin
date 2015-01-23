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
		$skills = array();
		if(isset($data['Position']['id'])) {
			$skills = $this->findPositionSkills($data['Position']['id']);
		}
		foreach($data['PositionSkill'] as $sKey => $position_skill) {
			unset($data['PositionSkill'][$sKey]['Skill']);
			$skill = $this->Skill->checkAndCreate($position_skill);
			if(!in_array($skill['Skill']['id'], $skills)) {
				$data['PositionSkill'][$sKey]['skill_id'] = $skill['Skill']['id'];
				unset($skills[array_search($skill['Skill']['id'],$skills)]);
			} else {
				unset($skills[array_search($skill['Skill']['id'],$skills)]);
			}
			if(empty($data['PositionSkill'][$sKey])) {
				unset($data['PositionSkill'][$sKey]);
			}
		}
		foreach($skills as $key =>$skill) {
			$this->id = $key;
			$this->delete();
		}
		return $data;
	}

	public function findPositionSkills($position_id) {
		$skills = $this->find('list', array(
			'fields' => array(
				'PositionSkill.id','PositionSkill.skill_id'),
			'conditions' => array(
				'PositionSkill.position_id' => $position_id)));
		return $skills;
	}
}
?>
