<?php
 App::uses('AppController', 'Controller');

class ProjectsController extends AppController {

	public $helpers = array('Js');

	public function add() {
		if($this->request->is('post')) {
			$this->Project->create();
			if($this->Project->save($this->request->data)) {
				$this->Session->setFlash(__('The project has been saved'),
					'alert',
					array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
				));
			}
			else {
				$this->Session->setFlash(__('The project could not be saved, please try again',
					'alert',
					array(
						'plugin' => 'BoostCake',
						'class' => 'alert-warning'
				)));
			}
		}
		if ($this->request->is('ajax')) {
			$this->disableCache();		
			$project = $this->Project->read(null, $this->Project->id);
			$this->set('project', $project);
			$this->layout = false;
			$this->render('/Elements/Projects/block');
		}
	}

	public function delete($id = null) {
		$this->request->onlyAllow('post');
		
		$this->Project->read(null,$id);

		if(!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid Project'));
		}
		if($this->Project->data['Project']['applicant_id'] == $this->Auth->user('id')) {
			if($this->Project->delete()) {
				if($this->request->is('ajax')) {
					$this->disableCache();
					$this->layout = false;
				}
			}
		}
	}

	public function edit($id = null) {
		$this->Project->read(null,$id);

		if(!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid Project'));
		}

		if($this->Project->data['Project']['applicant_id'] == $this->Auth->user('id')) {
			if($this->request->is('post') || $this->request->is('put')) {
				if($this->Project->save($this->request->data['Project'])) {
					if($this->request->is('ajax')) {
						$this->disableCache();
						$this->layout= false;
						$this->set('project', $this->Project->read(null, $this->Project->id));	
						$this->render('/Elements/Projects/row');
					}
				}
			}			
		}

	}

	public function index() {
		$this->set('projects', $this->Project->find('all'));
	}
 }
?>
