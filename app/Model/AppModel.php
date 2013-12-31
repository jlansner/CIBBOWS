<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

	public $actsAs = array('Containable');

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['title'])) {
			$this->data[$this->alias]['url_title'] = $this->createURLTitle($this->data[$this->alias]['title']);
		}
		
		if (isset($this->data[$this->alias]['distance_number'])) {
			$this->data[$this->alias]['meters'] = $this->convertToMeters($this->data[$this->alias]['distance_number'],$this->data[$this->alias]['distance_id']);
		}
		
		if (AuthComponent::user('id')) {
			$this->data[$this->alias]['creator'] = AuthComponent::user('id');
		}
		
/*		if ($this->data[$this->alias]['membership_level_id'] == null) {
			$this->data[$this->alias]['membership_level_id'] = 0;
		} */
		return true;
	}

	public function createURLTitle($title) {
		$pagename = str_replace(" ","-",trim(stripslashes($title)));

		$replacements = "/[^a-zA-Z0-9\-]/";
		$pagename = strtolower(preg_replace($replacements,"",$pagename));
		$pagename = preg_replace("/[\-]+/","-",$pagename);
	
		if (strlen($pagename) > 40) {
			$char40 = substr($pagename,40,1);
			$pagename = substr($pagename,0,40);
	
			if ($char40 !== "-") {
				$pagename = substr($pagename,0,strripos($pagename,"-"));
			}
		}

		return $pagename;
	}
	
	public function convertToMeters($distance_number,$distance_id) {
		$ratio = $this->Distance->find(
			'first',
			array(
				'conditions' => array(
					'Distance.id' => $distance_id
				)
			)
		);
		$meters = $distance_number * $ratio['Distance']['meters'];
		
		return $meters;
	}
	
	public function getAgeGroup($age,$gender) {
		$ageGroup = $this->AgeGroup->find(
			'first',
			array(
				'fields' => array('id'),
				'conditions' => array(
					'AgeGroup.gender_id' => $gender,
					'AgeGroup.minimum_age <=' => $age,
					'AgeGroup.maximum_age >=' => $age
				)
			)
		);
		
		return $ageGroup['AgeGroup']['id'];		
	}
}
