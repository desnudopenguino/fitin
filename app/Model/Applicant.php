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
		$this->data['Certifications'] = $this->loadCertifications();
debug ($this->data);
	}

	public function loadCertifications(){
		return $this->Certification->find('all', array(
			'conditions' => array(
				'Certification.user_id' => $this->data->User->id)));
	}
}
?>
