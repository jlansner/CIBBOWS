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
			$this->Paginator->settings = $this->paginate;
			$posts = $this->Paginator->paginate('Post');
		} catch (NotFoundException $e) {
			$this->redirect('/posts/');
		}
	
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
				'fields' => array('Post.title', 'Post.user_id', 'Post.anonymous', 'Post.body', 'Post.posted', 'User.first_name', 'User.last_name', 'User.id'),
				'conditions' => array(
					'Post.url_title' => $url_title,
					'Post.posted LIKE' => $year . '-' . $month . '-' . $day . '%',
					'Post.active' => 1,
					'Post.archived'=> 0
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
				$this->Post->saveField('permanent',$this->Post->id);
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
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

			$permanent = $this->request->data['Post']['id'];
			unset($this->request->data['Post']['id']);
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Post->id = $id;
				$this->Post->saveField('archived',1);
				$this->Session->setFlash('Your post has been updated.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
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
					'Post.archived' => 0
				),
				'limit' => 3,
				'order' => 'Post.posted DESC',
				'recursive' => -1
			)
		);
		return $post;
	}

}
