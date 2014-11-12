<?php
 App::uses('AppController', 'Controller');

class CultureQuestionsController extends AppController {

	public function random() {
		$this->set('question', $this->CultureQuestion->find('first',array(
			'order' => array('rand()'))));
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
	}
 }
?>
