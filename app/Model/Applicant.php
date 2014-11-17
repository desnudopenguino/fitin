<?php
App::uses('AppModel', 'Model');

Class Applicant extends AppModel {
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);

	public $primaryKey = 'user_id';

	public $hasMany = array(
		'Certification' => array(
			'className' => 'Certification'
		),
		'Education',
		'Project',
		'Application');

	public $virtualFields = array(
		'display_name' => "CONCAT(Applicant.first_name, ' ', Applicant.mi, ' ' , Applicant.last_name)"
	);

	public function checkDisplayName() {
		if(empty($this->data[$this->alias]['display_name'])) {
			$this->data[$this->alias]['display_name'] = $this->data['User']['email'];
		} 
	}

	public function loadDataCard($id = null) {
debug ($this->data);
		$this->data['Certifications'] = $this->Certification->loadApplicantActive($id);
		$this->data['Educations'] = $this->loadEducation($id);
	
debug ($this->data);
	}

	public function loadEducation($id) {
		return $this->Education->find('all', array(
			'conditions' => array(
				'Education.applicant_id' => $id)));
	}
}
?>
