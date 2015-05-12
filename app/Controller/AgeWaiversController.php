<?php
App::uses('AppController', 'Controller');
/**
 * AgeWaivers Controller
 *
 * @property AgeWaiver $AgeWaiver
 */
class AgeWaiversController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AgeWaiver->recursive = 0;
		$this->set('ageWaivers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AgeWaiver->exists($id)) {
			throw new NotFoundException(__('Invalid age waiver'));
		}
		$options = array('conditions' => array('AgeWaiver.' . $this->AgeWaiver->primaryKey => $id));
		$this->set('ageWaiver', $this->AgeWaiver->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AgeWaiver->create();
			if ($this->AgeWaiver->save($this->request->data)) {
				$this->Session->setFlash(__('The age waiver has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age waiver could not be saved. Please, try again.'));
			}
		}
		$users = $this->AgeWaiver->User->find('list');
		$races = $this->AgeWaiver->Race->find(
			'list',
			array(
				'conditions' => array(
					'Race.date >=' => date('Y-m-d')
				)
			)
		);
		$this->set(compact('users','races'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AgeWaiver->exists($id)) {
			throw new NotFoundException(__('Invalid age waiver'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AgeWaiver->save($this->request->data)) {
				$this->Session->setFlash(__('The age waiver has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The age waiver could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AgeWaiver.' . $this->AgeWaiver->primaryKey => $id));
			$this->request->data = $this->AgeWaiver->find('first', $options);
		}
		$users = $this->AgeWaiver->User->find('list');
		$races = $this->AgeWaiver->Race->find(
			'list',
			array(
				'conditions' => array(
					'Race.date >=' => date('Y-m-d')
				)
			)
		);
		$this->set(compact('users','races'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AgeWaiver->id = $id;
		if (!$this->AgeWaiver->exists()) {
			throw new NotFoundException(__('Invalid age waiver'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AgeWaiver->delete()) {
			$this->Session->setFlash(__('Age Waiver deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Age Waiver was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

}
