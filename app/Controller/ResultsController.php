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
	public function view($series_name = null, $year = null) {
/*		if (!$this->Result->exists($id)) {
			throw new NotFoundException(__('Invalid result'));
		} */
		
		$series = $this->Result->Race->Series->find(
			'first',
			array(
				'conditions' => array(
					'url_title' => $series_name
				),
				'fields' => array(
					'Series.id','Series.url_title'
				),
				'recursive' => -1
			)
		);
		
		$racesList = $this->Result->Race->find(
			'all',
			array(
				'conditions' => array(
					'series_id' => $series['Series']['id'],
					'parent_id' => null,
					'date <=' => date('Y-m-d')
				),
				'fields' => array(
					'Race.id','Race.date','Race.url_title'
				),
				'order' => array(
					'Race.date DESC'
				),
				'recursive' => -1
			)
		);
		
		if (!$year) {
			$year = substr($racesList[0]['Race']['date'],0,4);
		}

		$races = $this->Result->Race->find(
			'first',
			array(
				'conditions' => array(
					'series_id' => $series['Series']['id'],
					'date LIKE' => $year . '%',
					'parent_id' => null,
				),
				'contain' => array(
					'ChildRace' => array(
						'fields' => array(
							'ChildRace.id','ChildRace.title',
						)
					)
				),
				'fields' => array(
					'Race.id','Race.title','Race.url_title'
				)
			)
		);

		$results['Parent'] = $this->Result->find(
			'all',
			array(
				'conditions' => array(
					'Result.race_id' => $races['Race']['id']
				),
				'fields' => array(
					'Result.id','Result.first_name','Result.last_name','Result.user_id','Result.time','Result.age_group_id','Result.age','Result.gender_id','Result.place','Result.age_place'
				),
				'order' => array(
					'Result.place ASC',
					'Result.last_name ASC'
				),
				'contain' => array(
					'Gender' => array(
						'fields' => array('title')
					),
					'AgeGroup' => array(
						'fields' => array('title')
					),
					'Code'
				)
			)
		);

		foreach ($races['ChildRace'] as $childRace) {
			$results['Child'][] = $this->Result->find(
				'all',
				array(
					'conditions' => array(
						'Result.race_id' => $childRace['id']
					),
					'fields' => array(
						'Result.id','Result.first_name','Result.last_name','Result.user_id','Result.time','Result.age_group_id','Result.age','Result.gender_id','Result.place','Result.age_place'
					),
					'order' => array(
						'Result.place ASC',
						'Result.last_name ASC'
					),
					'contain' => array(
						'Gender' => array(
							'fields' => array('title')
						),
						'AgeGroup' => array(
							'fields' => array('title')
						),
						'Code'
					)
				)
			);
			
		}
		
		if (!$results) {
			throw new NotFoundException(__('Invalid race'));
			$this->redirect('/races/');
		}

		$this->set(compact('results','racesList','races','year','series'));
//		$this->set('results', $this->paginate());
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
