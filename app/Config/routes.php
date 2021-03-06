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
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::parseExtensions('csv');

 	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

	include('redirects.php');
	// redirects from old site

	Router::connect(
		'/admin',
		array(
			'controller' => 'pages',
			'action' => 'display',
			'admin'
		)
	);

	Router::connect(
		'/admin/memberships/:year',
		array(
			'controller' => 'memberships',
			'action' => 'index',
			'admin' => true
		),
		array(
			'pass' => array('year'),
			'year' => '[0-9]{4}',
		)
	);

	Router::connect(
		'/join',
		array(
			'controller' => 'memberships',
			'action' => 'join'
		)
	);	

	Router::connect(
		'/board-of-directors',
		array(
			'controller' => 'board_members',
			'action' => 'index'
		)
	);	

	$indexControllers = array('races','users','events','test_swims','clinics','board_members');

	foreach ($indexControllers as $controller) {
		Router::connect(
			'/' . $controller,
			array(
				'controller' => $controller,
				'action' => 'index'
			)
		);
	}
	
	Router::connect(
		'/news',
		array(
			'controller' => 'posts',
			'action' => 'index'
		)
	);

	$userActions = array('login', 'logout', 'create_account', 'forgot_password', 'my_profile', 'edit_profile');
	
	foreach ($userActions as $action) {
		Router::connect(
			'/' . $action,
			array(
				'controller' => 'users',
				'action' => $action
			)
		);
	}
	
	Router::connect(
		'/confirm/:string',
		array(
			'controller' => 'users',
			'action' => 'confirm'
		),
		array(
			'pass' => array('string'),
			'string' => '[a-zA-Z0-9]*'
		)
	);

	Router::connect(
		'/reset_password/:string',
		array(
			'controller' => 'users',
			'action' => 'reset_password'
		),
		array(
			'pass' => array('string'),
			'string' => '[a-zA-Z0-9]*'
		)
	);
		
	Router::connect(
		'/:url_title',
		array(
			'controller' => 'contents',
			'action' => 'view'
		),
		array(
			'pass' => array('url_title'),
			'url_title' => '[a-z0-9_\-]*'
		)
	);

	Router::connect(
		'/results/:url_title',
		array(
			'controller' => 'results',
			'action' => 'view'
		),
		array(
			'pass' => array('url_title'),
			'url_title' => '[a-z0-9_\-]*'
		)
	);

	Router::connect(
		'/results/:url_title/:year',
		array(
			'controller' => 'results',
			'action' => 'view'
		),
		array(
			'pass' => array('url_title','year'),
			'year' => '[0-9]{4}',
			'url_title' => '[a-z0-9_\-]*'
		)
	);

	Router::connect(
		'/series/:url_title',
		array(
			'controller' => 'series',
			'action' => 'view'
		),
		array(
			'pass' => array('url_title'),
			'url_title' => '[a-z0-9_\-]*'
		)
	);

	Router::connect(
		'/locations/:url_title',
		array(
			'controller' => 'locations',
			'action' => 'view'
		),
		array(
			'pass' => array('url_title'),
			'url_title' => '[a-z0-9_\-]*'
		)
	);
	
	Router::connect(
		'/:controller/:year/:url_title',
		array(
			'action' => 'view'
		),
		array(
			'pass' => array('year','url_title'),
			'year' => '[0-9]{4}',
			'url_title' => '[a-z0-9_\-]*'
		)
	);


	Router::connect(
		'/news/:year/:month/:day/:url_title',
		array(
			'controller' => 'posts',
			'action' => 'view'
		),
		array(
			'pass' => array('year','month','day','url_title'),
			'year' => '[0-9]{4}',
			'month' => '[0-9]{2}',
			'day' => '[0-9]{2}',
			'url_title' => '[a-z0-9_\-]*'			
		)
	);
	
	Router::connect(
		'/:controller/:year/:month/:day/:url_title',
		array(
			'action' => 'view'
		),
		array(
			'pass' => array('year','month','day','url_title'),
			'year' => '[0-9]{4}',
			'month' => '[0-9]{2}',
			'day' => '[0-9]{2}',
			'url_title' => '[a-z0-9_\-]*'			
		)
	);

	
	Router::connect(
		'/news/:page',
		array(
			'controller' => 'posts',
			'action' => 'index'
		),
		array(
			'pass' => array('page'),
			'page' => '[0-9]*'
		)
	);

	Router::connect(
		'/news/tagged/:tag',
		array(
			'controller' => 'posts',
			'action' => 'tags'
		),
		array(
			'pass' => array('tag'),
			'page' => '[a-z0-9_\-]*'
		)
	);
	
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
	