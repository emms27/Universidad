<div class="wrapper_autocomplete"> 
<?php
$this->layout = 'university';
/*
$form   = $this->Js->get('#form_buscar');
//$search = $this->Js->get('#name');
$form->event(
    'click',
    $this->Js->request(
        array('controller'=>'courses','action' => 'autoComplete'),
        array( 'async' => true, 
				   'update' => '#resultados',
					'dataExpression' => true,
					'method' => 'post',
					'data' => $this->Js->serializeForm(array('isForm'=>false, 'inline'=>true))
				)
    )
);
*//*
	echo $this->Form->create(null, array(
		'url' => array('controller'=>'courses','action' => 'autoComplete'),
		'id' => 'form_buscar'
		));*/
	echo $this->Form->create(null,array());
	echo $this->Form->input('name', array('label'=>'Busca un curso'));
	echo $this->Form->end('Buscar');
?>
<div id="resultados"></div>
</div>
<?php  // echo $this->Js->writeBuffer();?>
<script type="text/javascript">
	var js = jQuery.noConflict();
	(function($){
		js(document).ready(function(){
			js('#noticia-principal').load('html/article.html', function(){});
			js('#video').load('html/video.html', function(){});
//			js('#noticias-rel').load('html/articles.html', function(){});
			js('#podcast-rel').load('html/audio.html', function(){});
		});
	})(jQuery);
</script>
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$( "#name" ).autocomplete({     			
					minLength: 2,
					source: 'courses/autoCompletado',
					focus: function( event, ui )  { $( "#name" ).val( ui.item.Course.name ); return false;},
					select: function( event, ui ) {
						$("#resultados").hide('slow');
						$( "#name" ).val( ui.item.Course.name );
						var id = ui.item.Course.id;
						$.ajax({
							url: 'courses/getData/'+id,
							dataType: 'json',
							success: function(data){
									var curso = data.Course;
									var url = "courses/view/"+id;
									var html  = '<div id="inter_resultados"><div class="datos_curso">';
										 html += '<h3>Descripción del curso:</h3><div class="desc">';
										 html += '<ul><li>';
									    html += curso["description"] + '<br><a href="'+url+'">Ver más...' ;
									    html += '</a></li></ul></div></div></div>';
									$("#resultados").html(html);
									$("#resultados").show('slow');
								}//success
							});
						return false;
					}//select
				}).data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
								.data( "item.autocomplete", item )
								.append( "<a>" + item.Course.name + "</a>" )
								.appendTo( ul );
				};//autocomplete
	});// document
})(jQuery);
</script>
