<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 */
class ContentsController extends AppController {

	public function index() {
//		$this->Content->recursive = 0;

		$contents = $this->Content->find(
			'all',
			array(
	        	'conditions' => array(
	        		'OR' => array(
	        			array('Content.archived' => 0),
	        			array('Content.archived' => null)
					),
	    	    )
			)
		);

		$this->set('contents', $this->paginate());
		$this->set('contents', $contents);
//		$this->redirect('/');

	}

	public function admin_index() {

		$contents = $this->Content->find(
			'all',
			array(
	        	'conditions' => array(
	        		'OR' => array(
	        			array('Content.archived' => 0),
	        			array('Content.archived' => null)
					),
	    	    ),
	    	    'order' => array('Content.title')
			)
		);

	$this->paginate = array(
    	'conditions' => array(
    		'OR' => array(
    			array('Content.archived' => 0),
    			array('Content.archived' => null)
			),
		)	
	);

		$this->set('contents', $this->paginate());
		$this->set('contents', $contents);

	}

	public function view($url_title = null) {
		if (!$this->Content->exists($url_title)) {
		//	throw new NotFoundException(__('Invalid content'));
		}

		$content = $this->Content->find(
			'first',
			array(
				'fields' => array(
					'Content.title', 'Content.body', 'Content.controller', 'Content.membership_level_id', 'Content.permanent', 'Content.menu_parent'
				),
	        	'conditions' => array(
    	    		'Content.url_title' => $url_title,
    	    		'Content.active' => 1,
    	    		'Content.archived'=> 0
	    	    )
			)
		);

		if (!$content) {
			$this->redirect('/');
		}		
		if (!(($content['Content']['controller'] == "contents") || ($content['Content']['controller'] == null))) {
			$this->redirect('/' . $content['Content']['controller'] . '/');
		}
		

//		$options = array('conditions' => array('Content.' . $this->Content->url_title => $u));
//		$this->set('content', $this->Content->find('first', $options));
        $this->set('content', $content);

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Content']['active'] = 1;
			$this->request->data['Content']['user_id'] = $this->Auth->user('id');
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$this->Content->saveField('permanent',$this->Content->id);
				$this->Session->setFlash(__('The content has been saved'));
				$this->redirect(
					array(	
						'admin' => true,
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		}
		
		$menuParents = $this->Content->find(
			'list',
			array(
				'conditions' => array(
					'active' => 1,
					'archived' => 0,
					'in_menu' => 1,
					'menu_parent' => null
				),
				'fields' => array('permanent','title')
			)
		);
		$users = $this->Content->User->find('list');
		$membershipLevels = $this->Content->MembershipLevel->find('list');
		$this->set(compact('users','membershipLevels','menuParents'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
//			$permanent = $this->request->data['Content']['id'];
			unset($this->request->data['Content']['id']);
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$this->Content->id = $id;
				$this->Content->saveField('archived',1);
				$this->Session->setFlash(__('The content has been updated'));
				$this->redirect(
					array(	
						'admin' => true,
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
		}
		$menuParents = $this->Content->find(
			'list',
			array(
				'conditions' => array(
					'active' => 1,
					'archived' => 0,
					'in_menu' => 1,
					'menu_parent' => null
				),
				'fields' => array('permanent','title')
			)
		);

		$users = $this->Content->User->find('list');
		$membershipLevels = $this->Content->MembershipLevel->find('list');
		$this->set(compact('users','membershipLevels','menuParents'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Content->delete()) {
			$this->Session->setFlash(__('Content deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Content was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function menu() {
		$menuItems = $this->Content->find(
			'all',
			array(
				'fields' => array(
					'Content.permanent', 'Content.title', 'Content.url_title', 'Content.menu_rank', 'Content.controller'
					),
	        	'conditions' => array(
	        		array(
		        		'OR' => array(
			        		array('Content.menu_parent' => 0),
			        		array('Content.menu_parent' => null)
						),
					),
					array(
	    	    		'OR' => array(
	    	    			array('Content.membership_level_id' => null),
		    	    		array('Content.membership_level_id <=' => $this->userMembershipLevel)
		    	    	)					
					),
    	    		'Content.active' => 1,
    	    		'Content.in_menu' => 1,
    	    		'Content.archived'=> 0,
	    	    ),
	    	    'order' => array('Content.menu_rank'),
	    	    'recursive' => -1
			)
		);
		
		$i = 0;
		foreach ($menuItems as $menuItem) {
			if ($menuItem['Content']['controller'] == null) {
				$menuItem['Content']['controller'] = 'Content';				
			}

			if ($menuItem['Content']['controller'] == 'Content') {

				$menuItems[$i]['SubContent'] = $this->Content->find(
					'all',
					array(
						'fields' => array('Content.title', 'Content.url_title','Content.menu_rank','Content.controller'),
		        		'conditions' => array(
		        			'Content.menu_parent' => $menuItem['Content']['permanent'],
	    	    			'Content.active' => 1,
	    	    			'Content.in_menu' => 1,
	    	    			'Content.archived'=> 0,
							array(
			    	    		'OR' => array(
			    	    			array('Content.membership_level_id' => null),
				    	    		array('Content.membership_level_id <=' => $this->userMembershipLevel)
				    	    	)					
							),
						),
			    	    'order' => array('Content.menu_rank')
					)
				);
			} else if ($menuItem['Content']['controller'] == 'Series') {
				$this->loadModel('Series');
				$menuItems[$i]['SubContent'] = $this->Series->find(
					'all',
					array(
						'fields' => array('Series.title','Series.url_title','Series.menu_rank',),
		        		'conditions' => array(
	    	    			'Series.active' => 1,
	    	    			'Series.in_menu' => 1,
						),
			    	    'order' => array('Series.menu_rank'),
			    	    'recursive' => -1
					)
				);
				
			}
			$i++;
		}

        $this->set('menuItems', $menuItems);

		return $menuItems;	
	}
}
