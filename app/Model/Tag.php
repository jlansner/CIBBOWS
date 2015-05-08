<?php
App::uses('AppModel', 'Model');

class Tag extends AppModel {
	public $hasAndBelongsToMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
		),
	);
}

?>