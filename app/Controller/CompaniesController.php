<?php
 App::uses('AppController', 'Controller');

class CompaniesController extends AppController {

	public function view($id = null) {
		$this->Company->id = $id;

		$this->set('company', $this->Company->findView($id));
debug($this->referer());
	}
}
?>
