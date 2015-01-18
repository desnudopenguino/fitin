<?php
 App::uses('AppController', 'Controller');

class PositionsController extends AppController {

	public $uses = array('Position','Applicant','DataCard','UserCultureAnswer','Industry','WorkFunction', 'Degree');

	public function beforeFilter() {
		$this->Auth->allow('view');
	}

	public function add() {
		if($this->request->is('post')) {
			$this->request->data = $this->Position->PositionSkill->checkAndCreate($this->request->data);
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
		$this->set('position', $this->Position->findBlock($this->Position->id));
		$this->set('industries', $this->Industry->findAll());
		$this->set('functions', $this->WorkFunction->findAll());
		$this->set('degrees', $this->Degree->findAll());
		if ($this->request->is('ajax')) {
//remove the flash message if it is ajax. 
			$this->Session->delete('Message.flash');
			$this->disableCache();		
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

		if($this->Position->data['Position']['employer_id'] != $this->Auth->user('id')) {
			throw new NotFoundException(__('Invalid Position'));
		}
		if($this->request->is('post') || $this->request->is('put')) {
			if($this->Position->saveAll($this->request->data)) {
				if($this->request->is('ajax')) {
					$this->disableCache();
					$this->layout= false;
					$this->set('position', $this->Position->findBlock($this->Position->id));
					$this->set('industries', $this->Industry->findAll());
					$this->set('functions', $this->WorkFunction->findAll());
					$this->set('degrees', $this->Degree->findAll());
					$this->render('/Elements/Positions/block');
				}
			}
						
		}
	}

	public function index() {
		if($this->Auth->user('role_id') != 0 ) {
			throw new NotFoundException(__('Invalid Position'));
		}
		$this->set('positions', $this->Position->findAll());
	}

	public function search() {
		if($this->request->is('post')) {
			$position_id = $this->request->data['Position']['id'];
	
			$this->Session->write('position_id',$position_id);

			$positionCard = $this->Position->loadDataCard($position_id);
		
			$applicants = $this->Applicant->find('all', array(
				'fields' => array('Applicant.user_id')));

			$applicantCards = array();
			foreach($applicants as $applicant) {
				$applicantCard = $this->Applicant->loadDataCard($applicant['Applicant']['user_id']);
				$applicantCard['Results'] = $this->DataCard->compare($applicantCard,$positionCard);
				$applicantCard['Culture'] = $this->UserCultureAnswer->compareCulture($applicant['Applicant']['user_id'],$this->Auth->user('id'));
				$applicantCards[] = $applicantCard;
			}
		
			$this->set('applicant_cards', $applicantCards);
			$this->set('position_card', $positionCard);
		}

		if($this->request->is('ajax')) {
			$this->disableCache();
			$this->layout = false;
		}
	}

	public function dataCard($id = null) {
		$this->set('position_card', $this->Position->loadDataCard($id));

		if($this->request->is('ajax')) {
					$this->disableCache();
					$this->layout= false;
					$this->render('/Elements/Employers/dataCard');	
		}
	}

	public function view($id = null) {
		$this->Position->id = $id;
		if(!$this->Position->exists()) {
			throw new NotFoundException(__('Invalid Position'));
		}
		$position = $this->Position->findById($id);
		if($position['Employer']['User']['status_id'] != 4) {
			throw new NotFoundException(__('Invalid Position'));
		}
		$this->set('position', $position);
		//build data cards and compare them
		if($this->Auth->loggedIn() && $this->Auth->user('role_id') == 2) {
			$applicant_id = $this->Auth->user('id');
			$applicant_card = $this->Applicant->loadDataCard($applicant_id);
			$position_card = $this->Position->loadDataCard($id);
			
			$this->set('results', $this->DataCard->compare($applicant_card,$position_card));
			$this->set('culture', $this->UserCultureAnswer->compareCulture($applicant_id,$position['Position']['employer_id']));
		}
	}
 }
?>
