<?php
App::uses('AppController', 'Controller');
/**
 * BoardMembers Controller
 *
 * @property BoardMember $BoardMember
 */
class BoardMembersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BoardMember->recursive = 0;
		$this->set('boardMembers', $this->paginate());
	}

	public function index() {
		$boards = $this->BoardMember->BoardLevel->find(
			'all',
			array(
				'order' => array(
					'BoardLevel.rank'
				)
			)
		);
		
		$i = 0;
		foreach ($boards as $board) {
			$boardMembers[$i] = $this->BoardMember->find(
				'all',
				array(
					'conditions' => array(
						'BoardMember.board_level_id' => $board['BoardLevel']['id']
					),
					'contain' => array(
						'BoardTitle' => array(
							'fields' => array(
								'IFNULL(BoardTitle.rank,1000) as board_rank', 'BoardTitle.title'
							)
						),
						'User' => array(
							'fields' => array(
								'User.id', 'User.first_name', 'User.last_name', 'User.name'
							)
						)
					),
					'order' => array(
						'board_rank',
						'start_date',
						'last_name'
					)
				)
			);
			$i++;
		}
		$this->set(compact('boards','boardMembers'));
		
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BoardMember->exists($id)) {
			throw new NotFoundException(__('Invalid board member'));
		}
		$options = array('conditions' => array('BoardMember.' . $this->BoardMember->primaryKey => $id));
		$this->set('boardMember', $this->BoardMember->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BoardMember->create();
			if ($this->BoardMember->save($this->request->data)) {
				$this->Session->setFlash(__('The board member has been saved'));
				$this->redirect(
					array(
						'controller' => 'board_members',
						'action' => 'index',
						'admin' => true
					)
				);
			} else {
				$this->Session->setFlash(__('The board member could not be saved. Please, try again.'));
			}
		}
		$users = $this->BoardMember->User->find(
			'list',
			array(
				'order' => array(
					'last_name'
				)
			)
		);
		$boardLevels = $this->BoardMember->BoardLevel->find('list');
		$boardTitles = $this->BoardMember->BoardTitle->find('list');
		$this->set(compact('users','boardLevels','boardTitles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BoardMember->exists($id)) {
			throw new NotFoundException(__('Invalid board member'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BoardMember->save($this->request->data)) {
				$this->Session->setFlash(__('The board member has been saved'));
				$this->redirect(
					array(
						'action' => 'index',
						'admin' => true
					)
				);
			} else {
				$this->Session->setFlash(__('The board member could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BoardMember.' . $this->BoardMember->primaryKey => $id));
			$this->request->data = $this->BoardMember->find('first', $options);
		}
		$users = $this->BoardMember->User->find('list');
		$boardLevels = $this->BoardMember->BoardLevel->find('list');
		$boardTitles = $this->BoardMember->BoardTitle->find('list');
		$this->set(compact('users','boardLevels','boardTitles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BoardMember->id = $id;
		if (!$this->BoardMember->exists()) {
			throw new NotFoundException(__('Invalid board member'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BoardMember->delete()) {
			$this->Session->setFlash(__('Board member deleted'));
			$this->redirect(
				array(
					'action' => 'index',
					'admin' => true
				)
			);
		}
		$this->Session->setFlash(__('Board member was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
