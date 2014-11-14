<?php
App::uses('AppModel', 'Model');

Class Message extends AppModel {

	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'sender_id'
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'receiver_id'
		)
	);

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['sender_id'] = AuthComponent::user('id');
		return true;
	}
}
?>
