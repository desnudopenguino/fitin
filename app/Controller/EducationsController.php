<?php
 App::uses('AppController', 'Controller');

class EducationsController extends AppController {

	public function add() {
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
 }
?>
