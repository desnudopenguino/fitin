<?php
App::uses('AppModel', 'Model');

Class Address extends AppModel {

	public $actsAs = array(
		'Geocoder.Geocodable' => array(
			'addressColumn' => array(
				'street',
				'street2',
				'city',
				'state',
				'zip',
				'country')));

	public $belongsTo = array(
		'User' => array(
			'className' => 'User'
		),
		'State' => array(
			'className' => 'State'
		)
	);

	public $validate = array(
		'street' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'city' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'state' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'country' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field'),
		'zip' => array(
			'rule' => array('notEmpty'),
			'required' => true,
			'allowEmpty' => false,
			'message' => 'Please fill out this field')
			);

	public function beforeSave($options = array()) {
//find the lat and long and set them!
		return true;
	}

	public function checkGPS($user_id) {
		$result = $this->find('first', array(
			'conditions' => array(
				'Address.user_id' => $user_id),
			'fields' => array(
			'Address.latitude',
			'Address.longitude')));

debug($result);
		if(empty($result['Address']['latitude']) || $result['Address']['latitude'] == 0.0 || empty($result['Address']['longitude'] || $result['Address']['longitude'] == 0.0)) {
			return false;
		}
		return true;
	}
}
?>
