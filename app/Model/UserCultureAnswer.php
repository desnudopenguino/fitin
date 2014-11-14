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


		return array($applicantCulture, $employerCulture);
	}
}
?>
