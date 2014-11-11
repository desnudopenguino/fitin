<?php
 App::uses('AppController', 'Controller');

class PositionsController extends AppController {

	public $uses = array('Position');

	public function add() {
		if($this->request->is('post')) {
			$this->Position->create();
			if($this->Position->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The position has been saved'),
					'alert',
					array(
						'plugin' => 'BoostCake',
						'class' => 'alert-success'
				));
			}
			else {
				$this->Session->setFlash(__('The position could not be saved, please try again',
					'alert',
					array(
						'plugin' => 'BoostCake',
						'class' => 'alert-warning'
				)));
			}
		}
		if ($this->request->is('ajax')) {
//remove the flash message if it is ajax. 
			$this->Session->delete('Message.flash');
			$this->disableCache();		
			$position = $this->Position->read(null, $this->Position->id);
			$this->set('position', $position);
			$this->layout = false;
			$this->render('/Elements/Positions/block');
		}
	}

	public function delete($id = null) {
		$this->request->onlyAllow('post');
		
		$this->Position->read(null,$id);

		if(!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid Position'));
		}
		if($this->Position->data['Position']['employer_id'] == $this->Auth->user('id')) {
			if($this->Position->delete()) {
				if($this->request->is('ajax')) {
					$this->disableCache();
					$this->layout = false;
				}
			}
		}
	}

	public function edit($id = null) {
		$this->Position->read(null,$id);

		if(!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid Position'));
		}

		if($this->Position->data['Position']['employer_id'] == $this->Auth->user('id')) {
			if($this->request->is('post') || $this->request->is('put')) {
				if($this->Position->saveAll($this->request->data)) {
					if($this->request->is('ajax')) {
						$this->disableCache();
						$this->layout= false;
						$this->set('position', $this->Position->read(null, $this->Position->id));	
						$this->render('/Elements/Positions/block');
					}
				}
			}			
		}

	}

	public function index() {
		$this->set('positions', $this->Position->find('all'));
	}
 }
?>
