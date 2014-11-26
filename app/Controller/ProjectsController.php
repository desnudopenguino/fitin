<?php
 App::uses('AppController', 'Controller');

class ProjectsController extends AppController {

	public $uses = array('Project','Organization','WorkFunction','Industry');

	public function add() {
debug($this->request->data);
		if($this->request->is('post')) {
			$skills = $this->ProjectSkill->checkAndCreateSkills($this->request->data);
			$organization = $this->Organization->checkAndCreate($this->request->data, 1);
			$this->request->data['Project']['organization_id'] = $organization['Organization']['id'];
			unset($this->request->data['Organization']);
			$this->Project->create();
			if($this->Project->saveAll($this->request->data)) {
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
		$this->set('functions', $this->WorkFunction->findAll());
		$this->set('industries', $this->Industry->findAll());
		if ($this->request->is('ajax')) {
//remove the flash message if it is ajax. 
			$this->Session->delete('Message.flash');
			$this->disableCache();		
			$this->set('project', $this->Project->findBlock($this->Project->id));
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

		if($this->Project->data['Project']['applicant_id'] != $this->Auth->user('id')) {
			throw new NotFoundException(__('Invalid Project'));
		}
		if($this->request->is('post') || $this->request->is('put')) {
			$organization = $this->Organization->checkAndCreate($this->request->data, 1);
			$this->request->data['Project']['organization_id'] = $organization['Organization']['id'];
			if($this->Project->saveAll($this->request->data)) {
				if($this->request->is('ajax')) {
					$this->disableCache();
					$this->layout= false;
					$this->set('functions', $this->WorkFunction->findAll());
					$this->set('industries', $this->Industry->findAll());
					$this->set('project', $this->Project->findBlock($this->Project->id));	
					$this->render('/Elements/Projects/block');
				}
			}
		}

	}

	public function index() {
		$this->set('projects', $this->Project->find('all'));
	}
 }
?>
