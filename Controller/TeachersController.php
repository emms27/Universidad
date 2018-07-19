<?php
App::uses('AppController', 'Controller');

class TeachersController extends AppController {
	
	public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Teacher.id' => 'asc'
        )
    );
   
   public $layout = 'university';
      
	public function index() {
		$this->Teacher->recursive = 0;
		$this->set('teachers', $this->paginate());
	}
	
	function viewPdf($id = null){
        if (!$id){
            $this->Session->setFlash('Id inválido para obtener pdf');
            $this->redirect(array('action'=>'index'), null, true);
        }

        Configure::write('debug',0);

        $id = intval($id);
		  
        $property = $this->Teacher->read(null, $id);
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
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Profesor no válido'));
		}
		$this->set('teacher', $this->Teacher->read(null, $id));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Teacher->create();
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('El profesor ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El profesor no puede ser guardado. Intente otra vez.'));
			}
		}
	}

	public function edit($id = null) {
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Teacher->save($this->request->data)) {
				$this->Session->setFlash(__('El profesor ha sido guardado'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El profesor no puede ser guardado. Intente otra vez.'));
			}
		} else {
			$this->request->data = $this->Teacher->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Profesor no válido'));
		}
		if ($this->Teacher->delete()) {
			$this->Session->setFlash(__('Profesor eliminado'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El profesor no fue eliminado'));
		$this->redirect(array('action' => 'index'));
	}
}
