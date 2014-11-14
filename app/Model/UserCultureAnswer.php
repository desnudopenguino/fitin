<?php
App::uses('AppModel', 'Model');

Class UserCultureAnswer extends AppModel {
	public $belongsTo = array(
		'CultureQuestion',
		'User',
		'CultureQuestionAnswer');

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['user_id'] = AuthComponent::user('id');
		return true;	
	}

//function that compares the culture, applicant id goes first, then employer id. this will return an array with the final stats (total # questions, matched # questions, and average in %)
	public function compareCulture($applicantId, $employerId) {

		$cultureTypes = $this->CultureQuestion->CultureQuestionType->find('all', array(
			'fields' => array(
				'CultureQuestionType.id','CultureQuestionType.question_type')));

		$applicantCulture = $this->find('all', array(
			'conditions' => array(
				'UserCultureAnswer.user_id' => $applicantId),
			'fields' => array(
				'UserCultureAnswer.culture_question_id','UserCultureAnswer.culture_question_answer_id','CultureQuestion.culture_question_type_id')));

		$employerCulture = $this->find('all', array(
			'conditions' => array(
				'UserCultureAnswer.user_id' => $employerId),
			'fields' => array(
				'UserCultureAnswer.culture_question_id','UserCultureAnswer.culture_question_answer_id')));

		$totalQuestions = $totalMatches = $totalAverage = $count = 0.0;
		$culture = array();
debug($cultureTypes);
		foreach($cultureTypes as $cultureType) {
			$culture[$cultureType['CultureQuestionType']['question_type']] = array();
			$culture[$cultureType['CultureQuestionType']['question_type']]['id'] = $cultureType['CultureQuestionType']['id'];
			$culture[$cultureType['CultureQuestionType']['question_type']]['total'] = 0.0;
			$culture[$cultureType['CultureQuestionType']['question_type']]['match'] = 0.0;
			$culture[$cultureType['CultureQuestionType']['question_type']]['percent'] = 0.0;
		}
debug($culture);
		foreach($employerCulture as $qkey => $question) {
			$totalQuestions++;
			foreach($applicantCulture as $aKey => $answer) {
				$count++;
				if($question['UserCultureAnswer']['culture_question_id'] == $answer['UserCultureAnswer']['culture_question_id'] && 
					$question['UserCultureAnswer']['culture_question_answer_id'] == $answer['UserCultureAnswer']['culture_question_answer_id']) {
					$totalMatches ++;
					unset($applicantCulture[$aKey]);
				}
			}
		}

		$totolAverage = round(($totalMatches / $totalQuestions),2) * 100;

		return array('total' =>array('total' => $totalQuestions, 'match' => $totalMatches, 'percent' => $totalAverage, 'iterations' => $count));
	}
}
?>
