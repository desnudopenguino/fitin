<?php
 App::uses('AppController', 'Controller');

class ApplicationsController extends AppController {

	public $uses = array('Application','DataCard');

	public function add() {
		if($this->request->is('post')) {
			$this->Application->create();
			if($this->Application->save($this->request->data)) {
				$this->Session->setFlash(__('The address has been saved'));
			}
			else {
				$this->Session->setFlash(__('The address could not be saved, please try again'));
			}
		}
	}

	public function apply($position_id = null) {
		$this->Application->create();
		$this->Application->save(array('Application' => array('position_id' => $position_id)));
		if($this->request->is('ajax')) {
		}
			$this->autoRender = false;	
	}

	public function edit() {

	}

	public function applicantIndex() {
		$applicant_card = $this->Application->Applicant->loadDataCard($this->Auth->user('id'));
		$applications = $this->Application->findApplicant($this->Auth->user('id'));
		foreach($applications as $aKey => $application) {
//build the culture & job match
			$position_card = $this->Application->Position->loadDataCard($application['Application']['position_id']);
			$applications[$aKey]['Results'] = $this->DataCard->compare($applicant_card,$position_card);
			$applications[$aKey]['Culture'] = $this->Application->Applicant->User->UserCultureAnswer($this->Auth->user('id'),$application['Application']['position_id']);
		}

		$this->set('applications', $applications);
		if($this->request->is('ajax')) {
			$this->layout = false;
		}
	}
	public function employerIndex() {
		$this->set('applications', $this->Application->findEmployer($this->Auth->user('id')));
	}
 }
?>
