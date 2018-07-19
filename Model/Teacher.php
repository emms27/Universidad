<?php
App::uses('AppModel', 'Model');

class Teacher extends AppModel {
/*	public $virtualFields = array(
   	'name' => 'CONCAT(Teacher.name, " ", Teacher.last_name)'
	);*/

	public $displayField = 'name';

	public $validate = array(
		'name' => array(
			'rule'=>'notEmpty',
			'message'=>'El nombre no puede ser vacío'
			),
		'last_name' => array(
			'rule'=>'notEmpty',
			'message'=>'Los apellidos no pueden ser vacíos'
			),
		);
	public $hasMany = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'teacher_id',
			'dependent' => true,
		)
	);
}
