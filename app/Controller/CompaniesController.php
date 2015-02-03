<?php
 App::uses('AppController', 'Controller');

class CompaniesController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow('view');
	}

	public function view($url = null) {
		$company = $this->Company->find('first', array(
			'conditions' => array(
				'Company.url' => $url)));
		if(empty($company)) {
			$this->redirect(array('controller' => 'pages', 'action' => 'display','home'));
//			throw new NotFoundException(__('Invalid User'));
		}

		if($this->referer() == '/') {
			$this->Session->write('company', $company['Company']['id']);
		}

		$company_data = $this->Company->findView($company['Company']['id']);
		$this->set('company', $company_data);
	}

	public function index() {
		$this->set('companies', $this->Company->find('all'));	
	}
}
?>
