<?php
App::uses('AppModel', 'Model');

Class Certification extends AppModel {

public $actsAs = array('Containable');

	public $belongsTo = array(
		'Applicant'
		);

	public function loadApplicantActive($applicant_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Certification.applicant_id' => $applicant_id,
				'OR' => array(
					'Certification.expiration_date IS NOT NULL',
					'Certification.expiration_date >' => date('Y-m-d'))),
			'contain' => false));
	}

	public function loadApplicantAll($applicant_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Certification.applicant_id' => $applicant_id),
			'contain' => false));
	}
}
?>
