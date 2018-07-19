<div class="teachers index">
	<h2><?php echo __('Profesores'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name','Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name', 'Apellidos'); ?></th>
			<th><?php echo $this->Paginator->sort('cv','Curriculum vitae'); ?></th>
			<th class="actions"></th>
	</tr>
	<?php
	foreach ($teachers as $teacher): ?>
	<tr>
		<td><?php echo h($teacher['Teacher']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__(h($teacher['Teacher']['name'])), array('action'=>'view', $teacher['Teacher']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(__(h($teacher['Teacher']['last_name'])), array('action'=>'view', $teacher['Teacher']['id'])); ?>&nbsp;</td>
		<td><?php echo h($teacher['Teacher']['cv']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $teacher['Teacher']['id']), array('class'=>'view')); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $teacher['Teacher']['id']), array('class'=>'edit')); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $teacher['Teacher']['id']), array('class'=>'delete'), __('¿Realmente desea eliminar al profesor # %s?', $teacher['Teacher']['id'])); ?>
			<?php echo $this->Html->link(__('PDF'), array('action'=>'viewPdf', $teacher['Teacher']['id']), array('class'=>'pdf'));?>
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
		<li><?php echo $this->Html->link(__('Agregar Profesor'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listado de Cursos'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Agregar Curso'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
