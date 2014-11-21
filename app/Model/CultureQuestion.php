<?php
App::uses('AppModel', 'Model');

Class CultureQuestion extends AppModel {
	public $hasMany = array(
		'CultureQuestionAnswer',
		'UserCultureAnswer'
	);

	public $belongsTo = array(
		'CultureQuestionType');

	public function findRandom($user_id) {
		$answers = $this->UserCultureAnswer->findUserAnswerIdList($user_id);
debug($answers);
		return $this->find('first', array(
			'order' => array('rand()'),
			'contain' => array(
				'CultureQuestionAnswer'
					),
			'conditions' => array(
				'NOT' => $answers)));
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
