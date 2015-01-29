<?php
 App::uses('AppController', 'Controller');

class EducationsController extends AppController {

	public $uses = array('Education','Organization','Degree','Industry');

	public function add() {
		if($this->Auth->user('role_id') != 2) {
			throw new NotFoundException(__('Invalid Action'));
		}
		$this->set('degrees',$this->Degree->findAll());
		$this->set('concentrations',$this->Industry->findAll());
		if($this->request->is('post')) {
			$school = $this->Organization->checkAndCreate($this->request->data, 3);
			$this->request->data['Education']['organization_id'] = $school['Organization']['id'];
			unset($this->request->data['Organization']);
			$this->Education->create();
			if($this->Education->save($this->request->data)) {
				$this->Session->setFlash(__('The education has been saved'),
					'alert',
					array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
				));
			}
			else {
				$this->Session->setFlash(__('The education could not be saved, please try again',
					'alert',
					array(
						'plugin' => 'BoostCake',
						'class' => 'alert-warning'
				)));
			}
		}
		if ($this->request->is('ajax')) {
			$this->Session->delete('Message.flash');
			$this->disableCache();		
			$education = $this->Education->findRow($this->Education->id);
			$this->set('education', $education);
			$this->layout = false;
			$this->render('/Elements/Educations/row');
		}
	}

	public function delete($id = null) {
		$this->request->onlyAllow('post');
		
		$this->Education->read(null,$id);

		if(!$this->Education->exists()) {
			throw new NotFoundException(__('Invalid Education'));
		}
		if($this->Education->data['Education']['applicant_id'] != $this->Auth->user('id')) {
			throw new NotFoundException(__('Invalid Education'));
		}
		if($this->Education->delete()) {
			if($this->request->is('ajax')) {
				$this->disableCache();
				$this->layout = false;
			} else {
			}
		}
	}

	public function edit($id = null) {
		$this->set('degrees',$this->Degree->findAll());
		$this->set('concentrations',$this->Industry->findAll());
		$this->Education->read(null,$id);

		if(!$this->Education->exists()) {
			throw new NotFoundException(__('Invalid Education'));
		}
		if($this->Education->data['Education']['applicant_id'] != $this->Auth->user('id')) {
			throw new NotFoundException(__('Invalid Education'));
		}
		if($this->request->is('post') || $this->request->is('put')) {
			$school = $this->Organization->checkAndCreate($this->request->data, 3);
			$this->request->data['Education']['organization_id'] = $school['Organization']['id'];
			if($this->Education->save($this->request->data['Education'])) {
				if($this->request->is('ajax')) {
					$this->disableCache();
					$this->layout= false;
					$this->set('education', $this->Education->findRow($this->Education->id));	
					$this->render('/Elements/Educations/row');
				}
			}
		}			
	}
 }
?>
