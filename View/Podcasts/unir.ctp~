<?php // /app/views/podcasts/podcasts/index.ctp
// Pasamos info a la variable documentData del layout
$this->set('documentData', array('xmlns:itunes' => 'http://www.itunes.com/dtds/podcast-1.0.dtd'));
// Pasamos información a la variable channelData del layout
$this->set('channelData', array(
	'title' => 'Racó Tècnic Podcast',
	'link' => $this->Xml->url(array('controller' => 'podcasts', 'action' => 'index'), true),
	'description' => __("Racó Tècnic Audio & Video Podcasts", true) . '.',
	'language' => "es",
	'image' => array(
		'url' => $this->Xml->url('/img/logo.jpg', true),
		'link' => $this->Xml->url('/', true),
		'width' => 144,
		'height' => 144,
		'title' => "Racó Tècnic logo"
	)));

// Aquí pasamos la información a la variable $beforeContent del layout
$this->set('beforeContent',
	array(
		$this->Xml->elem('image', array(
			'namespace' => 'itunes',
			'href' => $this->Xml->url('/img/logo.jpg', true)
		)),
		$this->Xml->elem('author', array('namespace' => 'itunes'), "El Boletaire")
	)
);
// Empezamos a añadir <item>s a nuestro fichero podcast
foreach ($podcasts as $podcast)
{
	$time = strtotime($podcast['Podcast']['created']);

	$link = array(
		'controller' => 'foo',
		'action' => 'view',
		'slug' => $podcast['Podcast']['slug']
	);
	App::import('Sanitize');
	// This is the part where we clean the body text for output as the description
	// of the rss item, this needs to have only text to make sure the feed validates
	// Descripción del podcast
	$bodyText = preg_replace('=\(.*?\)=is', '', strip_tags($podcast['Podcast']['description']));
	$bodyText = $this->Text->stripLinks($bodyText);
	$bodyText = Sanitize::stripAll($bodyText);
	$bodyText = $this->Text->truncate($bodyText, array('limit' => 400, 'exact' => false));

	// Título del podcast
	$item = $this->Xml->elem('title', null, h($podcat['Podcast']['title']));
	// Autores
	$item .= $this->Xml->elem('author', array('namespace' => 'itunes'), h($podcast['Podcast']['authors']));
	// Enlace y guid del podcast
	$item .= $this->Xml->elem('link', null, $this->Html->url($link, true));
	$item .= $this->Xml->elem('guid', array('isPermaLink' => "true"), $this->Html->url($link, true));
	// Añadimos la descripción
	$item .= $this->Xml->elem('summary', array('namespace' => 'itunes'), h($bodyText));
	$item .= $this->Xml->elem('description', null, h($bodyText));
	// Fecha de publicación
	$item .= $this->Xml->elem('pubDate', null, $this->Rss->time($podcast['Podcast']['created']));

	// Añadimos la carátula
	if ( isset($podcast['Cover'][0]['file']) ) {
		$item .= $this->Xml->elem('image', array(
			'namespace' => 'itunes',
			'href' => $this->Xml->url('/img/' . $podcast['Cover'][0]['file'], true)
		));
	}
	// El fichero de podcast
	$item .= $this->Xml->elem('enclosure', array(
		'url' => Router::url('/files/podcasts/' . $podcast['Podcast']['file'], true),
		'length' => filesize($podcast['Podcast']['file']),
		'type' => 'audio/mpeg' // formato mime del archivo
	));

	echo  $this->Xml->elem('item', null, $item);
}
?>
