<?php 
    $result=NULL;
	$this->Js->JqueryEngine->jQueryObject = '$j';
	echo $this->Html->scriptBlock('var $j = jQuery.noConflict();',	array('inline' => false));
	$result .= $this->Js->get('.wrapper_students')->effect('fadeIn');
	$students = $this->Js->get('.students');
	$students->event('click',$result);
?>
<div class="courses view">
<h2><?php  echo __('Curso'); ?></h2>
	<dl>
		<dt><strong><?php echo __('Acciones'); ?></strong></dt>
		<dd class="actions">
			<?php echo $this->Html->link(__('Editar Curso'), array('action' => 'edit', $course['Course']['id']), array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Eliminar Curso'), array('action' => 'delete', $course['Course']['id']), array('class'=>'delete'), __('¿Realmente desea eliminar el curso: %s?', $course['Course']['name'])); ?>
		</dd>
		<dt><strong><?php echo __('Nombre'); ?></strong></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
		</dd>
		<dt><strong><?php echo __('Descripción'); ?></strong></dt>
		<dd>
			<?php echo h($course['Course']['description']); ?>
		</dd>
		<dt><strong><?php echo __('Profesor'); ?></strong></dt>
		<dd>
			<?php echo $this->Html->link($course['Teacher']['name'] . ' ' . $course['Teacher']['last_name'], array('controller' => 'teachers', 'action' => 'view', $course['Teacher']['id'])); ?>
		</dd>
	</dl>
</div>
<div class="related">
	<div class="students"><h3><?php echo __('Estudiantes inscritos'); ?></h3></div>
	<div class="wrapper_students">
	<?php if (!empty($course['Student'])): ?>
	<?php
		foreach ($course['Student'] as $student): ?>
			<div class="student">
			<p><?php echo $student['id']; ?>
				<?php echo $student['name']; ?>
				<?php echo $student['last_name']; ?></p>
			</div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>
</div>
