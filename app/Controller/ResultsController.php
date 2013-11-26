<?php
App::uses('AppController', 'Controller');
/**
 * Results Controller
 *
 * @property Result $Result
 */
class ResultsController extends AppController {

	public $paginate = array(
		'order' => array(
            'Result.time' => 'ASC'
        )
	);


	public function index() {
		$this->Result->recursive = 0;
		$this->set('results', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($race_id = null) {
/*		if (!$this->Result->exists($id)) {
			throw new NotFoundException(__('Invalid result'));
		} */

		$results = $this->Result->find(
			'all',
			array(
				'conditions' => array(
					'Result.race_id' => $race_id
				),
				'order' => array('Result.time' => 'ASC')
			)
		);
		
		if (!$results) {
			throw new NotFoundException(__('Invalid race'));
			$this->redirect('/races/');
		}

		$this->set('results', $results);
		$this->set('results', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Result->create();
			if ($this->Result->save($this->request->data)) {
				$this->Session->setFlash(__('The result has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The result could not be saved. Please, try again.'));
			}
		}
		$users = $this->Result->User->find('list');
		$races = $this->Result->Race->find('list');
		$ageGroups = $this->Result->AgeGroup->find('list');
		$codes = $this->Result->Code->find('list');
		$genders = $this->Result->Gender->find('list');
		$this->set(compact('users', 'races', 'ageGroups', 'genders', 'codes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Result->exists($id)) {
			throw new NotFoundException(__('Invalid result'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Result->save($this->request->data)) {
				$this->Session->setFlash(__('The result has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The result could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Result.' . $this->Result->primaryKey => $id));
			$this->request->data = $this->Result->find('first', $options);
		}
		$users = $this->Result->User->find('list');
		$races = $this->Result->Race->find('list');
		$ageGroups = $this->Result->AgeGroup->find('list');
		$codes = $this->Result->Code->find('list');
		$genders = $this->Result->Gender->find('list');
		$this->set(compact('users', 'races', 'ageGroups', 'genders', 'codes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Result->id = $id;
		if (!$this->Result->exists()) {
			throw new NotFoundException(__('Invalid result'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Result->delete()) {
			$this->Session->setFlash(__('Result deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Result was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
