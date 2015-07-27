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
//					'date <=' => date('Y-m-d')
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
			if (strtotime($racesList[0]['Race']['date']) < time()) {
				$year = substr($racesList[0]['Race']['date'],0,4);
			} else {
				$year = substr($racesList[1]['Race']['date'],0,4);				
			}
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
							'ChildRace.id','ChildRace.title',''
						),
						'order' => array(
							'ChildRace.menu_rank'
						)
					)
				),
				'fields' => array(
					'Race.id','Race.title','Race.url_title','Race.body','Race.postrace_body','Race.date'
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
					'Code' => array(
						'fields' => array('title','abbreviation','body'),
						'order' => array('Code.rank')
					)
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
						'Code' => array(
							'fields' => array('title','abbreviation','body'),
							'order' => array('Code.rank')
						)
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

	public function admin_add_results() {
		$races = $this->Result->Race->find('list');

		if ($this->request->is('post')) {
			$result = array();
			$race = $this->Result->Race->find(
				'first',
				array(
					'conditions' => array(
						'Race.id' => $this->request->data['Result']['race_id']
					)
				)
			);

			$lines = explode("\n", $this->request->data['Result']['results']);
			$head = str_getcsv(array_shift($lines));

			$array = array();
			foreach ($lines as $line) {
			    $array[] = array_combine($head, str_getcsv($line));
			}
			
			$i = 0;
			foreach ($array as $line) {
				if (strpos($line['Name'],',')) {
					$name = split(',',$line['Name']);
					$result[$i]['Result']['first_name'] = trim($name[1]);
					$result[$i]['Result']['last_name'] = trim($name[0]);
				} else {
					$name = split(' ',$line['Name'],2);
					$result[$i]['Result']['first_name'] = trim($name[0]);
					$result[$i]['Result']['last_name'] = trim($name[1]);					
				}
				$user_id = $this->Result->User->find(
					'first',
					array(
						'conditions' => array(
							'User.first_name' => $result[$i]['Result']['first_name'],
							'User.last_name' => $result[$i]['Result']['last_name']
						)
					)
				);
				
				$result[$i]['Result']['user_id'] = $user_id['User']['id'];
				$result[$i]['Result']['age'] = $line['Age'];

				if (trim($line['Gender']) == 'M') {
					$result[$i]['Result']['gender_id'] = 1;
				} else {
					$result[$i]['Result']['gender_id'] = 2;
				}
				
				$age_group_id = $this->Result->AgeGroup->find(
					'first',
					array(
						'conditions' => array(
							'AgeGroup.gender_id' => $result[$i]['Result']['gender_id'],
							'AgeGroup.minimum_age <=' => $result[$i]['Result']['age'],
							'AgeGroup.maximum_age >=' => $result[$i]['Result']['age']
						)
					)
				);

				$result[$i]['Result']['age_group_id'] = $age_group_id['AgeGroup']['id'];
				
				if ($line['Time'] == 'DNF') {
					$result[$i]['Result']['time'] = "00:00:00";
					$result[$i]['CodesResult']['code_id'] = 1;				
				} else if (strlen($line['Time']) < 6) {
					$result[$i]['Result']['time'] = "00:" . $line['Time'];
				} else {
					$result[$i]['Result']['time'] = $line['Time'];
				}
				$result[$i]['Result']['place'] = $line['Pl'];
				$result[$i]['Result']['age_place'] = $line['Div Pl'];
				$result[$i]['Result']['race_id'] = $race['Race']['id'];
				$result[$i]['Result']['meters'] = $race['Race']['meters'];
				$result[$i]['Result']['wetsuit'] = $this->request->data['Result']['wetsuit'];
				
				$r = $result[$i];
				$this->Result->create();
				$this->Result->save($r);				
				$i++;
				
				if ($line['Time'] == 'DNF') {
					$result[$i]['CodesResult']['result_id'] = $this->Result->getLastInsertId();
					$r = $result[$i];
					$this->Result->CodesResult->create();
					$this->Result->CodesResult->save($r);
				}
				
			}

		}

		
		$this->set(compact('races','result'));
		
	}

	public function admin_add_race_results($race_id) {

		if ($this->request->is('post')) {
			$lines = explode("\n", $this->request->data['Result']['results']);
			$head = str_getcsv(array_shift($lines)); // use first line to define keys

			$array = array();
			foreach ($lines as $line) {
			    $array[] = array_combine($head, str_getcsv($line)); // convert CSV to key => value array
			}
			
			$i = 0;

			$result['Result']['race_id'] = $this->request->data['Result']['child_race_id'];
			
			$race = $this->Result->Race->find(
				'first',
				array(
					'conditions' => array(
						'Race.id' => $result['Result']['race_id']
					),
					'fields' => array(
						'Race.meters'
					)
				)
			);
			
			$ageGroups = $this->Result->AgeGroup->find(
				'list'
			);
			
			
			foreach ($ageGroups as $key => $value) {
				$agePlaces[$key] = 1; // create array for age group ranking
			}
			
			foreach ($array as $line) {

				$swimmer = $this->Result->Race->RaceRegistration->find(
					'first',
					array(
						'conditions' => array(
							'RaceRegistration.race_id' => $race_id,
							'RaceRegistration.race_number' => $line['race_number']
						),
						'fields' => array(
							'RaceRegistration.user_id',
							'RaceRegistration.age_group_id'
						),
						'recursive' => -1
					)
				);
				
				$swimmerAgeGroup = $swimmer['RaceRegistration']['age_group_id'];

				$result['Result']['user_id'] = $swimmer['RaceRegistration']['user_id'];
				$result['Result']['age_group_id'] = $swimmerAgeGroup;
				$result['Result']['race_number'] = $line['race_number'];			
				$result['Result']['first_name'] = $line['first_name'];
				$result['Result']['last_name'] = $line['last_name'];
				$result['Result']['age'] = $line['age'];
				$result['Result']['place'] = $line['place'];
				$result['Result']['age_place'] = $agePlaces[$swimmerAgeGroup]; // get age group place
				$agePlaces[$swimmerAgeGroup]++; //increment age group place
				$result['Result']['meters'] = $race['Race']['meters'];
				$result['Result']['wetsuit'] = $this->request->data['Result']['wetsuit'];

				if (trim($line['gender']) == 'M') {
					$result['Result']['gender_id'] = 1;
				} else {
					$result['Result']['gender_id'] = 2;
				}

				if ($line['time'] == 'DNF') {
					$result['Result']['time'] = "00:00:00";
					$result['Result']['age_place'] = $line['age_place'];
					$result['CodesResult']['code_id'] = 1;				
				} else if (strlen($line['time']) < 6) {
					$result['Result']['time'] = "00:" . $line['time']; // convert mm:ss to hh:mm:ss
				} else {
					$result['Result']['time'] = $line['time'];
				}

				$this->Result->create();
				$this->Result->save($result);
				
				if ($line['time'] == 'DNF') {
					$result['CodesResult']['result_id'] = $this->Result->getLastInsertId();
					$this->Result->CodesResult->create();
					$this->Result->CodesResult->save($result);
				}
			}
		}
		
		$childRaces = $this->Result->Race->find(
			'list',
			array(
				'conditions' => array(
					'parent_id' => $race_id
				)
			)
		);
		
		$this->set(compact('childRaces'));
		
	}
}