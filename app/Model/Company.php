<?php
App::uses('AppModel', 'Model');

Class Company extends AppModel {

	public $belongsTo = array(
		'Employer',
		'Organization');

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['employer_id'] = AuthComponent::user('id');
		}
		return true;
	}

	public function checkAndCreate($data = null) {
		if(empty($this->find('first', array(
			'conditions' => array(
				'Company.organization_id' => $data['Organization']['id'])))) &&
			empty($this->find('first', array(
				'conditions' => array(
					'Company.employer_id' => $this->Auth->user('id')))))) {
			$this->save(array('Company' => array('organization_id' => $data['Organization']['id'])));
		}
	}
}
?>
