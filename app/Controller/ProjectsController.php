<?php
 App::uses('AppController', 'Controller');

class ProjectsController extends AppController {

	public $uses = array('Project','Organization','WorkFunction','Industry');

	public function add() {
		if($this->request->is('post')) {
//create/get organization
			if($organization = $this->Organization->find('first', array(
				'conditions' => array(
					'Organization.organization_name' => $this->request->data['Organization']['organization_name'])))) {
			} else {
				$this->Organization->create();
				$this->request->data['Organization']['organization_type_id'] = 1;
				$this->Organization->save($this->request->data['Organization']);
				$organization = $this->Organization->find('first', array(
					'conditions' => array(
						'Organization.id' => $this->Organization->getLastInsertId())));
			}
//add organization id to the project data
			$this->request->data['Project']['organization_id'] = $organization['Organization']['id'];
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
debug($this->Project->data);

		if(!$this->Project->exists()) {
			throw new NotFoundException(__('Invalid Project'));
		}

		if($this->Project->data['Project']['applicant_id'] == $this->Auth->user('id')) {
			if($this->request->is('post') || $this->request->is('put')) {
				if($organization = $this->Organization->find('first', array(
					'conditions' => array(
						'Organization.organization_name' => $this->request->data['Organization']['organization_name'])))) {
				} else {
					$this->Organization->create();
					$this->request->data['Organization']['organization_type_id'] = 1;
					$this->Organization->save($this->request->data['Organization']);
					$organization = $this->Organization->find('first', array(
						'conditions' => array(
							'Organization.id' => $this->Organization->getLastInsertId())));
				}
				$this->request->data['Project']['organization_id'] = $organization['Organization']['id'];
debug($this->request->data);
				if($this->Project->saveAll($this->request->data)) {
					if($this->request->is('ajax')) {
						$this->disableCache();
						$this->layout= false;
						$this->set('project', $this->Project->read(null, $this->Project->id));	
						$this->render('/Elements/Projects/block');
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
