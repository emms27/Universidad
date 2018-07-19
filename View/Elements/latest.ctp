<?php
	function show_words( $contenido, $cantidadPalabras ) {
 		$contenido = explode(' ', $contenido);
 		$contenido = array_slice($contenido, 0, $cantidadPalabras);
 		$contenido = implode(' ', $contenido);
 		return $contenido;
	}
?>
<h1>Últimos cursos</h1>
<?php $courses = $this->requestAction('courses/index/sort:id/direction:desc/limit:3');?>
<?php foreach ($courses as $course): ?>
﻿<article>
	<div class="img-noticia"></div>
	<div class="titulo-noticia">
		<h2><?php echo $this->Html->link($course['Course']['name'], 
			array('controller'=>'courses','action'=>'view', $course['Course']['id'])); ?>
		</h2>
	</div>
	<div class="noticia-social-icons-rel">
		<!-- AddThis Button BEGIN -->
		<div class="addthis_toolbox addthis_floating_style addthis_16x16_style">
		<a class="addthis_button_preferred_1"></a>
		<a class="addthis_button_preferred_2"></a>
		<a class="addthis_button_preferred_3"></a>
		<a class="addthis_button_preferred_4"></a>
		<a class="addthis_button_compact"></a>
		</div>
		<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fd517bb2d09e5e3"></script>
		<!-- AddThis Button END -->
	</div>
	<div class="noticia-content-rel">
		<p>
		<?php echo show_words($course['Course']['description'],35) . '... '; ?>
		</p>
	</div>
</article>
<?php endforeach; ?>
