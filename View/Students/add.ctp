<div class="students form">
<?php echo $this->Form->create('Student'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Estudiante'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label'=>'Nombre'));
		echo $this->Form->input('last_name', array('label'=>'Apellidos'));
		echo $this->Form->input('Course', array('label'=>'Cursos'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listado de Estudiantes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listado de Cursos'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Curso'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
