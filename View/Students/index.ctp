<div class="students index">
	<h2><?php echo __('Estudiantes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name', 'Apellidos'); ?></th>
			<th class="actions"></th>
	</tr>
	<?php
	foreach ($students as $student): ?>
	<tr>
		<td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['name']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['last_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $student['Student']['id']), array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $student['Student']['id']), array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $student['Student']['id']), array('class'=>'delete'), __('¿Realmente desea eliminar al estudiante # %s?', $student['Student']['name'].' '.$student['Student']['last_name'])); ?>
			<?php echo $this->Html->link(__('PDF'), array('action'=>'viewPdf', $student['Student']['id']), array('class'=>'pdf'));?>
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
		<li><?php echo $this->Html->link(__('Agregar Estudiante'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listado de Cursos'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Curso'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
