<?php
App::uses('AppModel', 'Model');

Class Message extends AppModel {

	public $belongsTo = array(
		'Sender' => array(
			'className' => 'User',
			'foreignKey' => 'sender_id'
		),
		'Receiver' => array(
			'className' => 'User',
			'foreignKey' => 'receiver_id'
		)
	);

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['sender_id'] = AuthComponent::user('id');
		}
		return true;
	}

	public function findReceived($user_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Message.created >= DATE_SUB(curdate(), INTERVAL 3 WEEK)',
				'Message.receiver_id' => $user_id),
			'contain' => array(
				'Sender')));
	}

	public function findSent($user_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Message.created >= DATE_SUB(curdate(), INTERVAL 3 WEEK)',
				'Message.sender_id' => $user_id)));
	}

	public function findArchived($user_id) {
		return $this->find('all', array(
			'conditions' => array(
				'Message.created BETWEEN DATE_SUB(curdate(), INTERVAL 180 DAY) AND DATE_SUB(curdate(), INTERVAL 3 WEEK)',
				'OR' => array(
					'Message.receiver_id' => $user_id,
					'Message.sender_id' => $user_id))));
	}

}
?>
