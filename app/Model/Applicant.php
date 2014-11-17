<?php
App::uses('AppModel', 'Model');

Class Applicant extends AppModel {

	public $actsAs = array('Containable');

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
		$dataCard = $this->find('first', array(
			'conditions' => array(
				'Applicant.user_id' => $id),
			'contain' => array(
				'Certification',
				'Education' => array(
					'Degree',
					'School',
					'Industry'),
				'Project' => array(
					'Organization',
					'ProjectIndustry',
					'ProjectFunction',
					'ProjectSkill')
		)));
		return $dataCard;	
	}
}
?>
