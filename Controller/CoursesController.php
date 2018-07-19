<?php
App::uses('AppController', 'Controller');

class CoursesController extends AppController {
	public $components = array('RequestHandler','Getid3');
	public $helpers = array('Js' => array('Jquery'));

	public $paginate = array(
		'limit' => 5,
		'order' => array(
				'Course.id' => 'asc'
				)
		);

	public $layout = 'university';

	function viewPdf($id = null){
        if (!$id){
            $this->Session->setFlash('Id inválido para obtener pdf');
            $this->redirect(array('action'=>'index'), null, true);
        }

        Configure::write('debug',0); // Otherwise we cannot use this method while developing

        $id = intval($id);
		  
        $property = $this->Course->read(null, $id);//$this->__view($id); // here the data is pulled from the database and set for the view
		  $this->set('property',$property);
        if (empty($property))
        {
            $this->Session->setFlash('Sorry, there is no property with the submitted ID.');
            $this->redirect(array('action'=>'index'), null, true);
        }
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        $this->render();
   }
    
	function autoCompletado() {
		$this->set('courses', $this->Course->find('all', array(
				'conditions' => array(
					'Course.name LIKE '=> '%'.$this->request->query['term'].'%'
				),
				'fields' => array('id','name')
				)));
		$this->layout = 'ajax';
	}
	
	function getData($id = null) {
		$this->Course->id = $id;
		if(!$this->Course->exists()):
			throw new NotFoundException(__('No existe el curso'));
		endif;
		$this->set('course', $this->Course->read(null, $id));
		$this->layout = 'ajax';
	}
	
	public function index() {
		$this->Course->recursive = 0;
		$courses = $this->paginate();
      if ($this->request->is('requested')) { // Para el funcionamiento del llamado asíncrono
            return $courses;
      } else { $this->set('courses', $courses);}
	}
	
	public function view($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Curso no válido'));
		}
		$this->set('course', $this->Course->read(null, $id));		
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('El curso ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El curso no pudo guardarse. Intente otra vez.'));
			}
		}
		$teachers = $this->Course->Teacher->find('list');
		$students = $this->Course->Student->find('list');
		$this->set(compact('teachers', 'students'));
	}

	public function edit($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('El curso ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El curso no pudo guardarse. Intente otra vez.'));
			}
		} else {
			$this->request->data = $this->Course->read(null, $id);
		}
		$teachers = $this->Course->Teacher->find('list');
		$students = $this->Course->Student->find('list');
		$this->set(compact('teachers', 'students'));
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Curso no válido'));
		}
		if ($this->Course->delete()) {
			$this->Session->setFlash(__('Curso eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El curso no fue eliminado'));
		$this->redirect(array('action' => 'index'));
	}
}
