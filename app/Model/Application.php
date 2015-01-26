<?php
App::uses('AppModel', 'Model');

Class Application extends AppModel {

	public $belongsTo = array(
		'Applicant',
		'Position'
		);

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		}
		return true;
	}

	public function findApplicantAll($applicant_id = null) {
		$applications = $this->find('all', array(
			'conditions' => array(
				'Application.applicant_id' => $applicant_id),
			'contain' => array(
				'Position' => array(
					'Employer'))));
		foreach($applications as $aKey => $application) {
			$applications[$aKey]['Application']['Position'] = $application['Position'];
			unset($applications[$aKey]['Position']);
		}

		return $applications;
	}

	public function findApplicantIds($applicant_id = null) {
		$applications = $this->find('list', array(
			'conditions' => array(
				'Application.applicant_id' => $applicant_id),
			'fields' => array(
				'position_id')));
		return $applications;
	}
	
	public function findApplicantActive($applicant_id = null) {
		$applications = $this->find('all', array(
			'conditions' => array(
				'Application.applicant_id' => $applicant_id,
				'Application.application_status_id' => 1),
			'contain' => array(
				'Position' => array(
					'Employer'))));
		foreach($applications as $aKey => $application) {
			$applications[$aKey]['Application']['Position'] = $application['Position'];
			unset($applications[$aKey]['Position']);
		}

		return $applications;
	}
	
	public function findEmployerActive($employer_id = null) {
		$applications = $this->find('all', array(
			'conditions' => array(
				'Application.application_status_id' => 1),
			'contain' => array(
				'Applicant' => array(
					'User'),
				'Position' => array(
					'conditions' => array(
						'Position.employer_id' => $employer_id)))));
		
		
		foreach($applications as $aKey => $application) {
			if($applications[$aKey]['Application']['Position'] == null) {
				unset($applications[$aKey]);
			} else {
				$applications[$aKey]['Application']['Applicant'] = $application['Applicant'];
				$applications[$aKey]['Application']['Position'] = $application['Position'];
				unset($applications[$aKey]['Applicant']);
				unset($applications[$aKey]['Position']);
			}
		}
debug($applications);
		return $applications;
	}
}
?>
