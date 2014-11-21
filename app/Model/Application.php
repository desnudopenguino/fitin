<?php
App::uses('AppModel', 'Model');

Class Application extends AppModel {

	public $belongsTo = array(
		'Applicant',
		'Position'
		);

	public function beforeSave($options = array()) {
		return true;
	}

	public function findApplicant($applicant_id = null) {
		return $this->find('all', array(
			'conditions' => array(
				'Application.applicant_id' => $applicant_id)));
	}
	
	public function findEmployer($employer_id = null) {
		return $this->find('all', array(
			'contain' => array(
				'Employer' =>
					'conditions' => array(
						'Employer.user_id' => $employer_id))));
	}
}
?>
