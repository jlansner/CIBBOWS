<div class="routes index">
	<h2><?php echo __('Routes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('start_location'); ?></th>
			<th><?php echo $this->Paginator->sort('end_location'); ?></th>
			<th><?php echo $this->Paginator->sort('distance'); ?></th>
			<th><?php echo $this->Paginator->sort('distance_id'); ?></th>
			<th><?php echo $this->Paginator->sort('meters'); ?></th>
			<th><?php echo $this->Paginator->sort('map'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($routes as $route): ?>
	<tr>
		<td><?php echo h($route['Route']['id']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['title']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['url_title']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['start_location']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['end_location']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['distance']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($route['Distance']['id'], array('controller' => 'distances', 'action' => 'view', $route['Distance']['id'])); ?>
		</td>
		<td><?php echo h($route['Route']['meters']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['map']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['created']); ?>&nbsp;</td>
		<td><?php echo h($route['Route']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $route['Route']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $route['Route']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $route['Route']['id']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Route'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
	</ul>
</div>
