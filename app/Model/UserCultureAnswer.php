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
		$applicantCulture = $this->find('all', array(
			'conditions' => array(
				'UserCultureAnswer.user_id' => $applicantId),
			'fields' => array(
				'UserCultureAnswer.culture_question_id','UserCultureAnswer.culture_question_answer_id')));
		$employerCulture = $this->find('all', array(
			'conditions' => array(
				'UserCultureAnswer.user_id' => $employerId),
			'fields' => array(
				'UserCultureAnswer.culture_question_id','UserCultureAnswer.culture_question_answer_id')));
		$count = 0;
		$totalQuestions = $matches = $average = 0;
		foreach($employerCulture as $qkey => $question) {
			$totalQuestions++;
			foreach($applicantCulture as $aKey => $answer) {
				$count++;
				if($question['UserCultureAnswer']['culture_question_id'] == $answer['UserCultureAnswer']['culture_question_id'] && $question['UserCultureAnswer']['culture_question_answer_id'] == $answer['UserCultureAnswer']['culture_question_answer_id']) {
					$matches ++;
					unset($applicantCulture[$aKey]);
			}
			
		}

		return array('total' => $totalQuestions, 'match' => $matches, 'percent' => $average, 'iterations' => $count);
	}
}
?>
