<?php
 App::uses('AppController', 'Controller');

class CultureQuestionsController extends AppController {

	public function random() {
		$question = $this->CultureQuestion->findRandom();
		$this->set('question', $question);
		$this->set('user_answer', $this->CultureQuestion->UserCultureAnswer->findUserAnswer($this->Auth->user('id'), $question['CultureQuestion']['id']));
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
		$this->render('question');
	}

	public function undo() {
		$last_answer = $this->UserQuestionAnswer->findLastUserAnswer($this->Auth->user('id'));
debug($last_answer);
		$this->CultureQuestion->UserQuestionAnswer->id = $last_answer['UserQuestionAnswer']['id'];
		$this->CultureQuestion->UserQuestionAnswer->delete();
		$this->set('question', $this->CultureQuestion->findById($last_answer['UserCultureAnswer']['culture_question_id']));
		
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
		$this->render('question');
	}
 }
?>
