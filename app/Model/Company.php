<?php
App::uses('AppModel', 'Model');

Class Company extends AppModel {

	public $belongsTo = array(
		'Employer',
		'Organization');

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['employer_id'] = AuthComponent::user('id');
		}
		return true;
	}

	public function checkAndCreate($data = null) {
		if(empty($this->find('first', array(
			'conditions' => array(
				'Company.organization_id' => $data['Organization']['id'])))) &&
			empty($this->find('first', array(
				'conditions' => array(
					'Company.employer_id' => AuthComponent::user('id')))))) {
			$this->save(array('Company' => array('organization_id' => $data['Organization']['id'])));
		}
	}

	public function findView($id = null) {
		$company = $this->find('first', array(
			'conditions' => array(
				'Company.id' => $id),
			'contain' => array(
				'Organization' => array(
					'Employer' => array(
						'Position' => array(
							'PositionIndustry' => array(
								'Industry'),
							'PositionFunction' => array(
								'WorkFunction'),
							'PositionSkill' => array(
								'Skill'
		)))))));
		$company['Company']['Organization'] = $company['Organization'];
		unset($company['Organization']);
		return $company;
	}
}
?>
