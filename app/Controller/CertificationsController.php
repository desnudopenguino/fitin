<?php
 App::uses('AppController', 'Controller');

class CertificationsController extends AppController {

	public $helpers = array('Js');

	public function add() {
		if($this->request->is('post')) {
			$this->Certification->create();
			if($this->Certification->save($this->request->data)) {
				$this->Session->setFlash(__('The certification has been saved'),
					'alert',
					array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
				));
			}
			else {
				$this->Session->setFlash(__('The certification could not be saved, please try again',
					'alert',
					array(
						'plugin' => 'BoostCake',
						'class' => 'alert-warning'
				)));
			}
		}
		if ($this->request->is('ajax')) {
			$this->disableCache();		
			$certification = $this->Certification->read(null, $this->Certification->id);
			$this->set('certification', $certification['Certification']);
//			$this->autorender = false;
			$this->layout = false;
			$this->render('/Elements/Certifications/row');
		}
	}

	public function index() {
		$this->set('certifications', $this->Certification->find('all'));
	}
 }
?>
