<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class HomepageSlideshowsController extends AppController {

	public function index() {

		$slides = $this->HomepageSlideshow->find(
			'all'
		);

		$this->set(compact('slides'));

	}

	public function homepage_slideshow() {

		$slide = $this->HomepageSlideshow->find(
			'first',
			array(
	        	'conditions' => array(
	        		'HomepageSlideshow.active' => 1
	    	    ),
	    	    'order' => 'rand()',
	    	    'contain' => array(
					'User'
				),
				'fields' => array('HomepageSlideshow.filename',  'HomepageSlideshow.user_id', 'User.name')
			)
		);


		return $slide;

	}

}
