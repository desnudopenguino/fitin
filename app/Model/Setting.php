<?php
App::uses('AppModel', 'Model');

Class Setting extends AppModel {

	public $belongsTo = array(
		'User' => array(
			'className' => 'User'
		));

	public $primaryKey = 'user_id';


	public function beforeSave($options = array()) {
		return true;
	}

	public function afterFind($results, $primary = false) {
		if(empty($results)) {
			$results = $this->buildDefault();
		}
		return $results;
	}

	public function buildDefault() {
		$search = array();
		$search[0]['Setting']['search_distance'] = 25;
		$search[0]['Setting']['search_scale'] = 3959;
		$search[0]['Setting']['search_job'] = 50;
		$search[0]['Setting']['search_culture'] = 20;

		return $search;
	}

	public function findSearch($user_id = null) {
		$result = $this->find('first', array(
			'fields' => array(
				'user_id',
				'search_distance',
				'search_scale',
				'search_job',
				'search_culture'),
			'conditions' => array(
				'Setting.user_id' => $user_id)
		));
		return $result;
	}

	public function trimForSearch($search) {
		$return = array();
		$return['distance'] = $search['Setting']['search_distance'];
		$return['scale'] = $search['Setting']['search_scale'];
		$return['job'] = $search['Setting']['search_job'];
		$return['culture'] = $search['Setting']['search_culture'];

		return $return;
	}
		
}
?>
