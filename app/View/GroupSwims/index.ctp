<div class="groupSwims index">
	<h2><?php echo __('Group Swims'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('location_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($groupSwims as $groupSwim): ?>
	<tr>
		<td><?php echo h($groupSwim['GroupSwim']['id']); ?>&nbsp;</td>
		<td><?php echo h($groupSwim['GroupSwim']['date']); ?>&nbsp;</td>
		<td><?php echo h($groupSwim['GroupSwim']['time']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($groupSwim['Location']['title'], array('controller' => 'locations', 'action' => 'view', $groupSwim['Location']['id'])); ?>
		</td>
		<td><?php echo h($groupSwim['GroupSwim']['created']); ?>&nbsp;</td>
		<td><?php echo h($groupSwim['GroupSwim']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $groupSwim['GroupSwim']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $groupSwim['GroupSwim']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $groupSwim['GroupSwim']['id']), null, __('Are you sure you want to delete # %s?', $groupSwim['GroupSwim']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Group Swim'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
