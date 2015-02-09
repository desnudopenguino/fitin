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
		$address = $this->data[$this->alias]['Address'];
$geoResult = $this->Geocoder->geocode($address['street'] ." ". $address['street2'] ." ".$address['city'] ." ". $address['state'] ." ". $address['zip'] ." ". $address['country']);
		$this->data[$this->alias]['latitude'] = floatval($geoResult[0]->geometry->location->lat);
		$this->data[$this->alias]['longitude'] = floatval($geoResult[0]->geometry->location->lng);
		return true;
	}
}
?>
