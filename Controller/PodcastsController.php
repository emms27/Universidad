<?php
App::uses('AppController', 'Controller');

class PodcastsController extends AppController {
	public $components = array('RequestHandler','Getid3');

	//public $helpers = array('Xml', 'Rss', 'Html');

	public function index(){
			// Desactivamos el renderizado automático
			$this->autoRender = false;
		if ( $this->RequestHandler->prefers('pod') ) {
			// Hacemos lo que tengamos que hacer para poblar nuestro podcast
			// $podcasts = $this->Podcast->find(...)
			// Cargamos la vista y el layout del podcast
 		  $this->render('podcasts/index','xml/podcast');
		}
		// Si no es podcast hacemos el render normal
		else $this->render();
	}

	function crear(){
/*Para unir mp3 en un solo fichero no tenéis más que pasarle como primer parámetro la ruta del fichero de salida y como segundo parámetro pasarle un array con las ubicaciones de los ficheros mp3:*/
	$destino = WWW_ROOT . 'files' . DS . 'podcasts' . DS . 'hola. mp3';
	$mp3 = array(
	WWW_ROOT . 'files' . DS . 'mp3' . DS . 'a.mp3',
	WWW_ROOT . 'files' . DS . 'mp3' . DS . 'b.mp3',
	WWW_ROOT . 'files' . DS . 'mp3' . DS . 'c.mp3',
	WWW_ROOT . 'files' . DS . 'mp3' . DS . 'd.mp3',
	WWW_ROOT . 'files' . DS . 'mp3' . DS . 'e.mp3'
	);
	if ($this->Getid3->joinMp3($destino, $mp3)){
          $this->Session->setFlash('fichero creado correctamente');
	}
	else{pr($this->Getid3->errors);}

}


}
