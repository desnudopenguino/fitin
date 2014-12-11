<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
		'Security' => array(
			'csrfUseOnce' => false),
		'Session',
		'Auth' => array(
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'Blowfish',
					'fields' => array('username' => 'email')//to authenticate via email
				)
			),
			'flash' => array(
				'element' => 'alert',
				'key' => 'auth',
				'params' => array(
					'plugin' => 'BoostCake',
					'class' => 'alert-danger'
				)
			)
		)
	);

	//helpers for boostcake
	public $helpers = array(
		'Session',
		'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
		'Form' => array('className' => 'BoostCake.BoostCakeForm'),
		'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);


	public function beforeFilter() {
		$this->Security->requireSecure(); 
		$this->Security->blackHoleCallback = 'forceSSL'; // commented out because hopefully apache redirects now
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard');//redirects logged in users

//user status is < 3, make them fill out the form!
		if($this->Auth->loggedIn()
			&& $this->Auth->user('status_id') < 3
			&& ($this->request->params['action'] != 'logout' || $this->request->params['action'] != 'add')) { 
					$this->redirect(array("controller" => "users", "action" => "add"));
		}
	}
	public function beforeRender() { 
		$this->set('userData', $this->Auth->user());
	}

	//force SSL connection
	public function forceSSL() {
		return $this->redirect('https://' . env('SERVER_NAME') . $this->here);
	}
}
