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
			throw new NotFoundException(__('Not Found'));
		}
		if($company['Company']['employer_id'] != $this->Auth->user('id')) {
			throw new NotFoundException(__('Not Found'));
		}
		//if not have access to company, not allowed
		$this->set('company', $company);
		if($this->request->is('post')) {
			$this->Company->save($this->request->data);
		}
	}

	public function addDepartment($dept_id = null) {
		if($this->Auth->user('user_level_id') != 12) {
			throw new ForbiddenException(__('Not Allowed'));
		}
		$user = $this->Company->Employer->User->findId($dept_id);
		if(empty($user)) {
			throw new NotFoundException(__('Not Found'));
		}			
		if($user['User']['user_level_id'] != 10) {
			throw new ForbiddenException(__('Not Allowed'));
		}			

		$company_check = $this->Company->Employer->checkCompanyOwner($this->Auth->user('id'), $dept_id);

		if($company_check['Organization']['Company']['employer_id'] != $this->Auth->user('id')) {
			throw new ForbiddenException(__('Not Allowed'));
		}

debug($company_check);
		if($this->Company->Employer->User->save(array('User' => array(
			'id' => $dept_id,
			'user_level_id' => 17)))) {	
		
			$this->layout = false;
			$this->render(false);
			$this->autorender = false;
			$this->Session->setFlash(__('<strong>Success:</strong> You have added '. $company_check['Employer']['department_name'].' to your enterprise departments '), 'alert', array(
				'plugin' => 'BoostCake',
				'class' => 'alert-success'
			));
//			$this->redirect(array('controller' => 'companies', 'action' => 'edit', $company_check['Organization']['Company']['id']));
		}
		
	}
}
?>
