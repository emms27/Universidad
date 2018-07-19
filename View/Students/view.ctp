<div class="students view">
<h2><?php  echo __('Estudiante'); ?></h2>
	<dl>
		<dt><strong><?php echo __('Acciones'); ?></strong></dt>
		<dd class="actions">
			<?php echo $this->Html->link(__('Editar Estudiante'), array('action' => 'edit', $student['Student']['id']), array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Eliminar Estudiante'), array('action' => 'delete', $student['Student']['id']), array('class'=>'delete'), __('¿Realmente desea eliminar al estudiante: %s?', $student['Student']['name'] .' '.$student['Student']['last_name'])); ?>
		</dd>
		<dt><strong><?php echo __('Nombre'); ?></strong></dt>
		<dd>
			<?php echo h($student['Student']['name']); ?>
		</dd>
		<dt><strong><?php echo __('Apellidos'); ?></strong></dt>
		<dd>
			<?php echo h($student['Student']['last_name']); ?>
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Cursos del estudiante'); ?></h3>
	<?php if (!empty($student['Course'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripción'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($student['Course'] as $course): ?>
		<tr>
			<td><?php echo $course['id']; ?></td>
			<td><?php echo $course['name']; ?></td>
			<td><?php echo $course['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'courses', 'action' => 'view', $course['id']), array('class'=>'view')); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'courses', 'action' => 'edit', $course['id']), array('class'=>'edit')); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'courses', 'action' => 'delete', $course['id']), array('class'=>'delete'), __('¿Realmente desea eliminar el curso %s?', $course['name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Estudiante'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Estudiante'), array('action' => 'delete', $student['Student']['id']), null, __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listado de Estudiantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Estudiante'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listado de Cursos'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Curso'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
