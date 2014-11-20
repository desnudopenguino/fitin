<?php
App::uses('AppModel', 'Model');

Class Organization extends AppModel {
	public $belongsTo = array('OrganizationType');

	public $hasMany = array('Project');

	public function findByName($organization_name) {
		return $this->find('first' array(
			'conditions' => array(
				'Organization.organization_name' => $organization_name)));
	}

	public function checkAndCreate($data) {
		if($organization = $this->findByName($data['Organization']['organization_name'])) {
		} else {
			$this->create();
			$this->save($data);
			$organization = $this->findByName($data['Organization']['organization_name']);
		}
		return $organization;
	}
}
?>
