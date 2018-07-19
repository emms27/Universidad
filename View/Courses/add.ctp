<div class="courses form">
<?php echo $this->Form->create('Course'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Curso'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('description', array('label'=>'Descripción'));
		echo $this->Form->input('teacher_id', array('label'=>'Profesor'));
		echo $this->Form->input('Student', array('label'=>'Estudiantes inscritos'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listado de Cursos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listado de Profesores'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Profesor'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listado de Estudiantes'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Estudiante'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
