<?php
App::uses('AppModel', 'Model');

Class Organization extends AppModel {
	public $belongsTo = array('OrganizationType');

	public $hasMany = array('Project','Education','Certification','Employer');

	public $validate = array(
		'organization_name' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field')
		);

	public function findByName($organization_name) {
		return $this->find('first', array(
			'conditions' => array(
				'Organization.organization_name' => $organization_name)));
	}

	public function checkAndCreate($data, $organization_type) {
		$data['Organization']['organization_type_id'] = $organization_type;
		if($organization = $this->findByName($data['Organization']['organization_name'])) {
		} else {
			$this->create();
			$this->save($data);
			$organization = $this->findByName($data['Organization']['organization_name']);
		}
		return $organization;
	}

	public function findAll() {
		return $this->find('list', array(
			'fields' => array(
				'Organization.organization_id','Organization.organization_name')));
	}
}
?>
