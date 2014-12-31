<?php
App::uses('AppModel', 'Model');

Class UserCultureAnswer extends AppModel {
	public $belongsTo = array(
		'CultureQuestion',
		'User',
		'CultureQuestionAnswer');

	public function beforeSave($options = array()) {
		if(empty($this->data[$this->alias]['id'])) {
			$this->data[$this->alias]['user_id'] = AuthComponent::user('id');
		}
		return true;	
	}

//function that compares the culture, applicant id goes first, then employer id. this will return an array with the final stats (total # questions, matched # questions, and average in %)
	public function compareCulture($applicant_id, $employer_id) {
		$cultureTypes = $this->CultureQuestion->CultureQuestionType->find('all', array(
			'fields' => array(
				'CultureQuestionType.id','CultureQuestionType.question_type')));

		$applicantCulture = $this->findUserAnswers($applicant_id);

		$employerCulture = $this->findUserAnswers($employer_id);

		$count = 0;
		$culture = array();

		foreach($cultureTypes as $cultureType) {
			$culture[$cultureType['CultureQuestionType']['id']] = array();
			$culture[$cultureType['CultureQuestionType']['id']]['name'] = $cultureType['CultureQuestionType']['question_type'];
			$culture[$cultureType['CultureQuestionType']['id']]['total'] = 0.0;
			$culture[$cultureType['CultureQuestionType']['id']]['match'] = 0.0;
			$culture[$cultureType['CultureQuestionType']['id']]['percent'] = 0.0;
		}

		foreach($employerCulture as $qkey => $question) {
			foreach($culture as $cKey => $cval) {
				if($cKey == $question['CultureQuestion']['culture_question_type_id']) {
					$culture[$cKey]['total'] = $culture[$cKey]['total'] + 1;
				}
			}

			foreach($applicantCulture as $aKey => $answer) {
				$count++;
				if($question['UserCultureAnswer']['culture_question_id'] == $answer['UserCultureAnswer']['culture_question_id'] && 
					$question['UserCultureAnswer']['culture_question_answer_id'] == $answer['UserCultureAnswer']['culture_question_answer_id']) {
					$culture[$cKey]['match'] = $culture[$cKey]['match'] + 1;
					unset($applicantCulture[$aKey]);
				}
			}
		}
		
		$total = $match = $percent = 0.0;
		foreach($culture as $cKey => $cultureType) {
			if($culture[$cKey]['total'] > 0) {
				$culture[$cKey]['percent'] = round($culture[$cKey]['match'] / $culture[$cKey]['total'],2) * 100;
				$total += $culture[$cKey]['total'];
				$match += $culture[$cKey]['match'];
			}
		}

		if($total > 0) {
			$percent = round($match / $total,2)*100;
		}

		$culture['Total']['count'] = $count;
		$culture['Total']['name'] = 'Total';
		$culture['Total']['total'] = $total;
		$culture['Total']['match'] = $match;
		$culture['Total']['percent'] = $percent;

		return $culture;
	}

	public function findUserAnswers($user_id = null) {
		$answers = $this->find('all', array(
			'conditions' => array(
				'UserCultureAnswer.user_id' => $user_id),
			'contain' => array(
				'CultureQuestion' => array(
					'fields' => array(
						'CultureQuestion.culture_question_type_id'))),
			'fields' => array(
				'UserCultureAnswer.culture_question_id','UserCultureAnswer.culture_question_answer_id')));
debug($answers);
		$sorted_answers = array();
		foreach($answers as $answer) {
			$sorted_answers[$answer['CultureQuestion']['id']] = $answer;
		}

		return $sorted_answers;
	}

	public function findUserAnswerIdList($user_id = null) {
		return $this->find('list', array(
			'conditions' => array(
				'UserCultureAnswer.user_id' => $user_id),
			'fields' => array(
				'UserCultureAnswer.culture_question_id')));
	}

	public function findUserAnswer($user_id = null, $question_id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'UserCultureAnswer.user_id' => $user_id,
				'UserCultureAnswer.culture_question_id' => $question_id)));
	}

	public function findLastUserAnswer($user_id = null) {
		return $this->find('first', array(
			'conditions' => array(
				'UserCultureAnswer.user_id' => $user_id),
			'order' => array(
				'UserCultureAnswer.modified DESC'),
			'fields' => array(
				'UserCultureAnswer.id','UserCultureAnswer.culture_question_id')));
	}
}
?>
