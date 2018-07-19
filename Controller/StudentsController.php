<?php
App::uses('AppController', 'Controller');

class StudentsController extends AppController {
	public $helpers = array('Js' => array('Jquery'));
	
	public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Student.id' => 'asc'
        )
    );
	
	public $layout = 'university';
	
	public function index() {
		$this->Student->recursive = 0;
		$this->set('students', $this->paginate());
	}

	function viewPdf($id = null){
        if (!$id){
            $this->Session->setFlash('Id inválido para obtener pdf');
            $this->redirect(array('action'=>'index'), null, true);
        }

        Configure::write('debug',0);

        $id = intval($id);
		  
        $property = $this->Student->read(null, $id);
		  $this->set('property',$property);
        if (empty($property))
        {
            $this->Session->setFlash('Sorry, there is no property with the submitted ID.');
            $this->redirect(array('action'=>'index'), null, true);
        }
        $this->layout = 'pdf';
        $this->render();
   }
   
	public function view($id = null) {
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Estudiante no válido'));
		}
		$this->set('student', $this->Student->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('El estudiante ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estudiante no pudo guardarse. Intente otra vez.'));
			}
		}
		$courses = $this->Student->Course->find('list');
		$this->set(compact('courses'));
	}

	public function edit($id = null) {
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Estudiante no válido'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('El estudiante ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El estudiante no pudo guardarse. Intente otra vez.'));
			}
		} else {
			$this->request->data = $this->Student->read(null, $id);
		}
		$courses = $this->Student->Course->find('list');
		$this->set(compact('courses'));
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Estudiante no válido'));
		}
		if ($this->Student->delete()) {
			$this->Session->setFlash(__('Estudiante eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El estudiante no fue eliminado'));
		$this->redirect(array('action' => 'index'));
	}
}
