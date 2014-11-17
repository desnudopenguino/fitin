<?php
App::uses('AppModel', 'Model');

Class Certification extends AppModel {

	public $belongsTo = array(
		'Applicant'
		);

	public function loadActiveApplicantCertifications($applicant_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Certification.applicant_id' => $applicant_id,
				'Certification.expiration_date IS NOT' => 'NULL',
				'OR Certification.expiration_date >' date('Y-m-d'))));
	}
}
?>
