<div class="courses index">
	<h2><?php echo __('Cursos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('description','Descripción'); ?></th>
			<th><?php echo $this->Paginator->sort('teacher_id', 'Profesor'); ?></th>
			<th class="actions"></th>
	</tr>
	<?php
	foreach ($courses as $course): ?>
	<tr>
		<td><?php echo h($course['Course']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__(h($course['Course']['name'])), array('action'=>'view', $course['Course']['id'])); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($course['Teacher']['name'] . ' ' . $course['Teacher']['last_name'], array('controller' => 'teachers', 'action' => 'view', $course['Teacher']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $course['Course']['id']), array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $course['Course']['id']), array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $course['Course']['id']), array('class'=>'delete'), __('Realmente desea eliminar el curso # %s?', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('PDF'), array('action'=>'viewPdf', $course['Course']['id']), array('class'=>'pdf') );?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count}, comenzando en {:start}, finalizando en {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Curso'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listado de Profesores'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Profesor'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listado de Estudiantes'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Estudiante'), array('controller' => 'students', 'action' => 'add')); ?> </li>
	</ul>
</div>
