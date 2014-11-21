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
	}
 }
?>
