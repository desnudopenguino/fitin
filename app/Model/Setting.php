<?php
App::uses('AppModel', 'Model');

Class Setting extends AppModel {

	public $belongsTo = array(
		'User' => array(
			'className' => 'User'
		));


	public function beforeSave($options = array()) {
		return true;
	}

	public function findSearch($user_id = null) {
		$result = $this->find('first', array(
			'fields' => array(
				'search_distance',
				'search_scale',
				'search_job',
				'search_culture'),
			'conditions' => array(
				'Setting.user_id' => $user_id)
		));

		return $result;
	}
}
?>
