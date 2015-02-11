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

	public function afterFind($results, $primary = false) {
		foreach($results as $rKey => $result) {
			if(empty($results[$rKey]['Setting']['user_id'])) {
				$results[$rKey]['Setting']['search_distance'] = 25;
				$results[$rKey]['Setting']['search_scale'] = 3959;
				$results[$rKey]['Setting']['search_job'] = 50;
				$results[$rKey]['Setting']['search_culture'] = 20;
			}
		}
		return $results;
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
