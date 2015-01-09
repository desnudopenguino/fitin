<?php
App::uses('AppModel', 'Model');

Class Education extends AppModel {
	
	public $belongsTo = array(
		'Applicant','Degree','Organization','Industry'
	);

	public $validate = array(
		'graduation_date' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field')
	);

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['applicant_id'] = AuthComponent::user('id');
		}
		return true;
	}

	public function findApplicantAll($applicant_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Education.applicant_id' => $applicant_id),
			'contain' => array(
				'Degree',
				'Organization',
				'Industry'),
			'order' => array(
					'degree_id desc')));
	}

	public function findRow($id = null) {
		$education = $this->find('first', array(
			'conditions' => array(
				'Education.id' => $id),
			'contain' => array(
				'Degree',
				'Organization',
				'Industry')));

		$education['Education']['Degree'] = $education['Degree'];
		unset($education['Degree']);
		$education['Education']['Organization'] = $education['Organization'];
		unset($education['Organization']);
		$education['Education']['Industry'] = $education['Industry'];
		unset($education['Industry']);

		return $education['Education'];	
	}
	
}
?>
