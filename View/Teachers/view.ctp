<div class="teachers view">
<h2><?php  echo __('Profesor'); ?></h2>
	<dl>
		<dt><strong><?php echo __('Acciones'); ?></strong></dt>
		<dd class="actions">
			<?php echo $this->Html->link(__('Editar Profesor'), array('action' => 'edit', $teacher['Teacher']['id']), array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Eliminar Profesor'), array('action' => 'delete', $teacher['Teacher']['id']), array('class'=>'delete'), __('¿Realmente desea eliminar al profesor: %s?', $teacher['Teacher']['name'] .' '.$teacher['Teacher']['last_name'])); ?>
		</dd>
		<dt><strong><?php echo __('Nombre'); ?></strong></dt>
		<dd>
			<?php echo h($teacher['Teacher']['name']); ?>
			<?php echo h($teacher['Teacher']['last_name']); ?>
		</dd>
		<dt><strong><?php echo __('Curriculum Vitae'); ?></strong></dt>
		<dd>
			<?php echo h($teacher['Teacher']['cv']); ?>
		</dd>
		
	</dl>
</div>
<div class="cls"></div>
<div class="related">
	<h3><?php echo __('Cursos del profesor'); ?></h3>
	<?php if (!empty($teacher['Course'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Descripción'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($teacher['Course'] as $course): ?>
		<tr>
			<td><?php echo $course['id']; ?></td>
			<td><?php echo $course['name']; ?></td>
			<td><?php echo $course['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'courses', 'action' => 'view', $course['id']), array('class'=>'view')); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'courses', 'action' => 'edit', $course['id']), array('class'=>'edit') ); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'courses', 'action' => 'delete', $course['id']), array('class'=>'delete'), __('¿Realmente desea eliminar el curso: %s?', $course['name'])); ?>
				<?php echo $this->Html->link(__('PDF'), array('controller'=>'courses', 'action'=>'viewPdf', $course['id']), array('class'=>'pdf')); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<div class="cls"></div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Profesor'), array('action' => 'edit', $teacher['Teacher']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Profesor'), array('action' => 'delete', $teacher['Teacher']['id']), null, __('¿Realmente desea eliminar al profesor: %s?', $teacher['Teacher']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Eliminar Profesores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Profesor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listado de Cursos'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Curso'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>

</div>
