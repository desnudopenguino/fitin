<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));

	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	//Main site routes: dashboard, profile, culture, search
	Router::connect('/dashboard', array('controller' => 'users', 'action' => 'dashboard'));
	Router::connect('/profile', array('controller' => 'users', 'action' => 'profile'));
	Router::connect('/culture', array('controller' => 'users', 'action' => 'culture'));
	Router::connect('/search', array('controller' => 'users', 'action' => 'search'));
	Router::connect('/privacy', array('controller' => 'users', 'action' => 'privacy'));
	Router::connect('/settings', array('controller' => 'users', 'action' => 'settings'));
	Router::connect('/register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));

	Router::connect('/for/*',array('controller' => 'positions', 'action' => 'view'));
	Router::connect('/at/*',array('controller' => 'companies', 'action' => 'view'));

	//change the url for users to "with" so fitin.today/with/<userhash> and the userhash can be personalized for a price
	Router::connectNamed(array('url'));
	Router::connect('/with/:url', array('controller' => 'users', 'action' => 'view'), array('pass' => array("url")));

	Router::connect('/confirm/:url', array('controller' => 'requests', 'action' => 'confirm'), array('pass' => array("url")));
	Router::connect('/reset/:url', array('controller' => 'requests', 'action' => 'reset'), array('pass' => array("url")));
	//admin route
	Router::connect('/admin', array('controller' => 'users', 'action' => 'index'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
