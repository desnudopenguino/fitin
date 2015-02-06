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
		if(isset($this->data[$this->alias]['organization_id'])) {
			$this->data[$this->alias]['url'] = md5($this->data[$this->alias]['organization_id']);
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

	public function findByUrl($url = null) {
		$company = $this->find('first', array(
			'conditions' => array(
				'Company.url' => $url),
			'contain' => array(
				'Organization',
				'Employer' => array(
					'User'))));

		return $company;
	}

	public function findById($id = null) {
		$company = $this->find('first', array(
			'conditions' => array(
				'Company.id' => $id),
			'contain' => array(
				'Organization' => array(
					'Employer' => array(
						'User')),
				'Employer' => array(
					'User'))));

		return $company;
	}

	public function findView($id = null) {
		$company = $this->find('first', array(
			'conditions' => array(
				'Company.id' => $id),
			'contain' => array(
				'Organization' => array(
					'Employer' => array(
						'User' => array(
							'fields' => array(
								'User.url'),
							'conditions' => array(
								'User.status_id' => 4)),
						'Position' => array(
							'PositionIndustry' => array(
								'Industry'),
							'PositionFunction' => array(
								'WorkFunction'),
							'PositionSkill' => array(
								'Skill'
		)))))));
		foreach($company['Organization']['Employer'] as $eKey => $employer) {
			if(empty($employer['User'])) {
				unset($company['Organization']['Employer'][$eKey]);
			}
		}
		$company['Company']['Organization'] = $company['Organization'];
		unset($company['Organization']);

		return $company;
	}

	public function findPositions($id = null) {
		$positions = $this->find('first', array(
			'conditions' => array(
				'Company.id' => $id),
			'contain' => array(
				'Organization' => array(
					'Employer' => array(
						'User' => array(
							'conditions' => array(
								'User.status_id' => 4)),
						'Position' => array(
							'fields' => array(
								'Position.id','Position.employer_id')))))));
		$positions_return = array();
		if(!empty($positions) {
			foreach($positions['Organization']['Employer'] as $employer) {
				foreach($employer['Position'] as $position) {
					$positions_return[] = array(
						'Position' => array(
							'id' => $position['id'],
							'employer_id' => $position['employer_id']),
						'Employer' => $positions['Organization']['Employer'][0]);
				}
			}
		}
		
		return $positions_return;
	}

	public function countDepartments($id) {
		$departments = $this->find('first', array(
			'conditions' => array(
				'Company.id' => $id),
			'contain' => array(
				'Organization' => array(
					'Employer'))));

		$department_count = count($departments['Organization']['Employer']);

		return $department_count;
	}
}
?>
