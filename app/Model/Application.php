<?php
App::uses('AppModel', 'Model');

Class Application extends AppModel {

	public $belongsTo = array(
		'Applicant',
		'Position'
		);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
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
				'Applicant',
				'Position' => array(
					'Employer' => array(
						'conditions' => array(
							'Employer.user_id' => $employer_id))))));
		
		
		foreach($applications as $aKey => $application) {
			$applications[$aKey]['Application']['Applicant'] = $application['Applicant'];
			$applications[$aKey]['Application']['Position'] = $application['Position'];
			unset($applications[$aKey]['Applicant']);
			unset($applications[$aKey]['Position']);
		}
		return $applications;
	}
}
?>
