<?php
 App::uses('AppController', 'Controller');

class CompaniesController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow('view');
	}

	public function view($id = null) {
		$this->Company->id = $id;

		if($this->referer() == '/') {
			$this->Session->write('company', $id);
		}

		$this->set('company', $this->Company->findView($id));
	}

	public function index() {
		$this->set('companies', $this->Company->find('all'));	
	}
}
?>
