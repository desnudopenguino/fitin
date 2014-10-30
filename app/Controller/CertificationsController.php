<?php
 App::uses('AppController', 'Controller');

class CertificationsController extends AppController {

	public $helpers = array('Js');

	public function add() {
		if($this->request->is('post')) {
			$this->Certification->create();
			if($this->Certification->save($this->request->data)) {
				$this->Session->setFlash(__('The certification has been saved'));
			}
			else {
				$this->Session->setFlash(__('The certification could not be saved, please try again'));
			}
		}
		if ($this->request->is('ajax')) {
			$this->set('cercifications', $this->Certificion->find('all',array(
				'conditions' => array(
					'applicant_id' => $this->Auth->user('id'))));
			$this->render('index');
		}

	}

	public function index() {
		$this->set('certifications', $this->Certification->find('all'));
	}
 }
?>
