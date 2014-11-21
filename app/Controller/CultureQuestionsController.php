<?php
 App::uses('AppController', 'Controller');

class CultureQuestionsController extends AppController {

	public function random() {
		$question = $this->CultureQuestion->findRandom($this->Auth->user('id'));
debug($question);
		$this->set('question', $question);
		$this->set('user_answer', $this->CultureQuestion->UserCultureAnswer->findUserAnswer($this->Auth->user('id'), $question['CultureQuestion']['id']));
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
		$this->render('question');
	}

	public function undo() {
			$last_answer = $this->CultureQuestion->UserCultureAnswer->findLastUserAnswer($this->Auth->user('id'));
			$this->CultureQuestion->UserCultureAnswer->id = $last_answer['UserCultureAnswer']['id'];
			$this->CultureQuestion->UserCultureAnswer->delete();
			$this->set('question', $this->CultureQuestion->findById($last_answer['UserCultureAnswer']['culture_question_id']));
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
		$this->render('question');
	}
 }
?>
