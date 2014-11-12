<?php
 App::uses('AppController', 'Controller');

class PersonalityQuestionsController extends AppController {

	public function random() {
		$this->set('question', $this->PersonalityQuestion->find('first',array(
			'order' => array('rand()'))));
		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
	}
 }
?>
