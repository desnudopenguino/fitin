<?php
 App::uses('AppController', 'Controller');

class EducationsController extends AppController {

	public $uses = array('Education','School','Degree','Concentration');

	public function add() {

		$this->set('degrees',$this->Degree->find('all'));
		$this->set('concentrations',$this->Concentration->find('all'));
		if($this->request->is('post')) {
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
			$this->disableCache();		
			$education = $this->Education->read(null, $this->Education->id);
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
		if($this->Education->data['Education']['applicant_id'] == $this->Auth->user('id')) {
			if($this->Education->delete()) {
				if($this->request->is('ajax')) {
					$this->disableCache();
					$this->layout = false;
				} else {
				}
			}
		}
	}

	public function edit($id = null) {
		$this->Education->read(null,$id);

		if(!$this->Education->exists()) {
			throw new NotFoundException(__('Invalid Education'));
		}

		if($this->Education->data['Education']['applicant_id'] == $this->Auth->user('id')) {
			if($this->request->is('post') || $this->request->is('put')) {
				if($this->Education->save($this->request->data['Education'])) {
					if($this->request->is('ajax')) {
						$this->disableCache();
						$this->layout= false;
						$this->set('education', $this->Education->read(null, $this->Education->id));	
						$this->render('/Elements/Educations/row');
					}
				}
			}			
		}
	}
 }
?>
