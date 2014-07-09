<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {

	public $helpers = array('Time', 'Paginator');

	public $paginate = array(
		'limit' => 5,
		'order' => array(
            'Post.posted' => 'DESC'
        ),
        'conditions' => array(
			'Post.active' => 1,
			'Post.archived' => 0
		)		
	);


/**
 * index method
 *
 * @return void
 */
	public function index($page = null) {
//		$this->Post->recursive = 0;
//		$this->set('posts', $this->paginate());

		if (is_numeric($page)) {
			$this->paginate['page'] = $page;
		}

		try {
//			$this->Paginator->settings = $this->paginate;
//			$posts = $this->Paginator->paginate('Post');


    	$posts = $this->Post->find(
			'all',
			array(
	        	'conditions' => array(
                    array(
    	        		'OR' => array(
    	        			array('Post.archived' => 0),
    	        			array('Post.archived' => null)
    					)
                    ),
    				array(
	    	    		'OR' => array(
	    	    			array('Post.membership_level_id' => null),
		    	    		array('Post.membership_level_id <=' => $this->userMembershipLevel)
		    	    	)					
					)
                ),
	    	    'order' => array('Post.posted DESC')
			)
		);

    	$this->paginate = array(
        	'conditions' => array(
        		'OR' => array(
        			array('Post.archived' => 0),
        			array('Post.archived' => null)
    			),
    		)	
    	);



        } catch (NotFoundException $e) {
			$this->redirect('/posts/');
		}

    	$this->set('posts', $this->paginate());
		$this->set('posts', $posts);

	}


	public function admin_index() {

		$posts = $this->Post->find(
			'all',
			array(
	        	'conditions' => array(
	        		'OR' => array(
	        			array('Post.archived' => 0),
	        			array('Post.archived' => null)
					),
	    	    ),
	    	    'order' => array('Post.posted DESC')
			)
		);

	$this->paginate = array(
    	'conditions' => array(
    		'OR' => array(
    			array('Post.archived' => 0),
    			array('Post.archived' => null)
			),
		)	
	);

		$this->set('posts', $this->paginate());
		$this->set('posts', $posts);

	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($year = null, $month = null, $day = null, $url_title = null) {
		if (!$url_title) {
			throw new NotFoundException(__('Invalid post'));
		}

		$post = $this->Post->find(
			'first',
			array(
				'fields' => array('Post.title', 'Post.user_id', 'Post.anonymous', 'Post.body', 'Post.posted', 'Post.parent_id', 'Post.id', 'Post.modified', 'User.first_name', 'User.last_name', 'User.id'),
				'conditions' => array(
					'Post.url_title' => $url_title,
					'Post.posted LIKE' => $year . '-' . $month . '-' . $day . '%',
					'Post.active' => 1,
					'Post.archived'=> 0,
        			array(
	    	    		'OR' => array(
	    	    			array('Post.membership_level_id' => null),
		    	    		array('Post.membership_level_id <=' => $this->userMembershipLevel)
		    	    	)					
					)                    
				),
				'contain' => array(
					'User',
					'ParentPost' => array(
						'Tag'
					)
				)
			)
		);

		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
			$this->redirect('/posts/');
		}
		$this->set('post', $post);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Post']['active'] = 1;
			$this->request->data['Post']['posted'] = date('Y-m-d H:i:s');
			$this->request->data['Post']['user_id'] = $this->Auth->user('id');
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Post->saveField('parent_id',$this->Post->id);
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(
					array(	
						'admin' => true,
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
        $membershipLevels = $this->Post->MembershipLevel->find('list');
		$users = $this->Post->User->find('list');
		$this->set(compact('users','membershipLevels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

//			$permanent = $this->request->data['Post']['id'];
			unset($this->request->data['Post']['id']);
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Post->id = $id;
				$this->Post->saveField('archived',1);
				$this->Session->setFlash('Your post has been updated.');
				$this->redirect(
					array(	
						'admin' => true,
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
        $membershipLevels = $this->Post->MembershipLevel->find('list');
    	$users = $this->Post->User->find('list');
		$this->set(compact('users','membershipLevels'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function homepage_news() {
		$post = $this->Post->find(
			'all',
			array(
				'fields' => array('Post.title', 'Post.url_title', 'Post.posted'),
				'conditions' => array(
					'Post.active' => 1,
					'Post.archived' => 0,
        			array(
	    	    		'OR' => array(
	    	    			array('Post.membership_level_id' => null),
		    	    		array('Post.membership_level_id <=' => $this->userMembershipLevel)
		    	    	)					
					)                    
				),
				'limit' => 5,
				'order' => 'Post.posted DESC',
				'recursive' => -1
			)
		);
		return $post;
	}
	
	public function tags($tag) {
		$posts = $this->Post->Tag->find(
			'all',
			array(
				'conditions' => array(
					'Tag.url_title' => $tag
				),
				'order' => 'post_id ASC',
				'fields' => array('post_id'),
				'recursive' => -1,
				'contain' => array(
					'Post' => array(
						'fields' => array('Post.id'),
						'ChildPost' => array(
							'conditions' => array(
								'active' => 1,
								'archived' => 0
							),
							'fields' => array('ChildPost.title', 'ChildPost.url_title', 'ChildPost.user_id', 'ChildPost.anonymous', 'ChildPost.body', 'ChildPost.posted', 'ChildPost.parent_id'),
							'User' => array(
								'fields' => array('User.first_name', 'User.last_name', 'User.id')
							)
						),
						'Tag' => array(
							'fields' => array('Tag.title','Tag.url_title')
						)
					)					
				)
			)
		);
		
		$this->set(compact('posts'));
	}

}
