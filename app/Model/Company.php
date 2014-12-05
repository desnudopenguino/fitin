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
}
?>
