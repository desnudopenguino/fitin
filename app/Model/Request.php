<?php
App::uses('AppModel', 'Model');

Class Request extends AppModel {

	public $belongsTo = array(
		'User');

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			if(empty($this->data[$this->alias]['user_id'])) {
				$this->data[$this->alias]['user_id'] = AuthComponent::user('id');
			}
			$this->data[$this->alias]['url'] = md5(time()."".$this->data[$this->alias]['user_id']);
		}
		return true;
	}

	public function findConfirm($url = null) {
		$request = $this->find('first', array(
			'conditions' => array(
				'Request.url' => $url),
			'contain' => array(
				'User' => array(
					'fields' => array(
						'User.id','User.status_id')))));

		return $request;
	}

	public function findReset($url = null) {
		$request = $this->find('first', array(
			'conditions' => array(
				'Request.url' => $url),
			'fields' => array(
				'Request.id','Request.user_id')));

		return $request;
	}
}
?>
