
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('reset','style','fonts', 'generic.university',
											 'ui-lightness/jquery-ui-1.8.23.custom','http://fonts.googleapis.com/css?family=Amaranth'));
		echo $this->Html->script(array('jquery-1.8.1.min','jquery-ui-1.8.23.custom.min'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<header>
		<h1><a href="<?php echo $this->base;?>">Universidad del Pastel</a></h1>
		<nav>
			<ul>
				<li><?php echo $this->Html->link('Cursos', array('controller'=>'courses', 'action'=>'index'));?></li>
				<li><?php echo $this->Html->link('Profesores', array('controller'=>'teachers', 'action'=>'index'));?></li>
				<li><?php echo $this->Html->link('Estudiantes', array('controller'=>'students', 'action'=>'index'));?></li>
				<li><?php echo $this->Html->link('Buscar', array('controller'=>'pages', 'action'=>'display', 'home'));?></li>
			</ul>
		</nav>
	</header>
	<div class="wrapper_all">
	<section class="content_left">
		<section id="render">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</section>
		<section id="video"></section>
		<section id="noticia-principal"></section>
	</section>
	<section class="content_right">
		<aside id="podcast-rel">
		</aside>
		<aside id="noticias-rel"><?php echo $this->element("latest");?></aside>
	</section>
	</div>
	<footer>
	</footer>
	<?php echo $this->element('sql_dump'); ?>
	<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
</body>
</html>
