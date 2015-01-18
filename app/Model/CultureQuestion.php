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
		return $this->find('first', array(
			'order' => array('rand()'),
			'contain' => array(
				'CultureQuestionAnswer')/*,
			'conditions' => array(
				'NOT' => array('CultureQuestion.id' => $answers))*/
		));
	}

	public function findById($id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'CultureQuestion.id' => $id),
			'contain' => array(
				'CultureQuestionAnswer'
					)));
	}

	public function findOldest($user_id) {
		return $this->find('first', array(
			'contain' => array(
				'CultureQuestionAnswer',
				'UserCultureAnswer' => array(
					'fields' => array(
						'UserCultureAnswer.modified'),
					'conditions' => array(
						'UserCultureAnswer.user_id' => $user_id),
					'order' => array(
						'UserCultureAnswer.modified ASC')))));
	}	

	public function findNext($user_id) {
		if($question = $this->findRandom($user_id)) {
		} else {
			$question = $this->findOldest($user_id);
		}
		return $question;
	}

	public function findAll() {
		return $this->find('list');
	}

	public function findIndex() {
		$questions = $this->find('all', array(
			'contain' => array(
				'CultureQuestionAnswer')));
		return $questions;
	}
}
?>
