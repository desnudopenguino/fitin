<?php
 App::uses('AppController', 'Controller');

class CultureQuestionsController extends AppController {

	public function random() {
		$this->set('question', $this->CultureQuestion->findRandom());
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
	}
 }
?>
