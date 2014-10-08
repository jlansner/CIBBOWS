<?php
App::uses('AppController', 'Controller');
/**
 * Series Controller
 *
 * @property Series $Series
 */
class SeriesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Series->recursive = 0;
		$this->set('series', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
/*		if (!$this->Series->exists($id)) {
			throw new NotFoundException(__('Invalid series'));
		} */
		
		$series = $this->Series->find(
			'first',
			array(
				'conditions' => array(
					'Series.url_title' => $id
				),
				//'fields' => array('Series.id')
			)
		);
		
//		$this->loadModel('Race');
		$race = $this->Series->Race->find(
			'first',
			array(
				'conditions' => array(
					'Race.series_id' => $series['Series']['id'],
					'Race.parent_id' => null
				),
				'order' => array('Race.date DESC'),
				'fields' => array('Race.date', 'Race.url_title')
			)
		);

		if ($race) {
			$this->redirect(
				array(
					'controller' => 'races',
					'action' => 'view',
					'year' => substr($race['Race']['date'], 0, 4),
					'url_title' => $race['Race']['url_title']
				)
			);
		} else {
			$this->set('series',$series);
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Series->create();
			if ($this->Series->save($this->request->data)) {
				$this->Session->setFlash(__('The series has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The series could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Series->exists($id)) {
			throw new NotFoundException(__('Invalid series'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Series->save($this->request->data)) {
				$this->Session->setFlash(__('The series has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The series could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Series.' . $this->Series->primaryKey => $id));
			$this->request->data = $this->Series->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Series->id = $id;
		if (!$this->Series->exists()) {
			throw new NotFoundException(__('Invalid series'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Series->delete()) {
			$this->Session->setFlash(__('Series deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Series was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
