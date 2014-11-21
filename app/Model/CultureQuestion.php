<?php
App::uses('AppModel', 'Model');

Class CultureQuestion extends AppModel {
	public $hasMany = array(
		'CultureQuestionAnswer',
		'UserCultureAnswer'
	);

	public $belongsTo = array(
		'CultureQuestionType');

	public function findRandom() {
		return $this->find('first', array(
			'order' => array('rand()'),
			'contain' => array(
				'CultureQuestionAnswer'
					)));
	}

	public function findById($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'CultureQuestion.id' => $id),
			'contain' => array(
				'CultureQuestionAnswer'
					)));
	}
}
?>
