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
		if(empty($company) && $this->Auth->loggedIn()) {
			throw new NotFoundException(__('Not Found'));
		} else if(empty($company)) {
			$this->set('url',$url);
			echo $this->render('/Elements/redirect');
			exit;
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

	public function edit($id = null) {
		//if id is null not found and if company doesn't exist not found
		$company = $this->Company->findById($id);
		if(empty($company)) {

		}
		//if i don't have access to company, not allowed

debug($company);
	}
}
?>
