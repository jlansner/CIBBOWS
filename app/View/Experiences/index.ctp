	<h2><?php echo __('Experiences'); ?></h2>
	<table class="zebraTable">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('Distance'); ?></th>
			<th><?php echo $this->Paginator->sort('Time'); ?></th></th>
			<th><?php echo $this->Paginator->sort('meters'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($experiences as $experience): ?>
	<tr>
		<td><?php echo h($experience['Experience']['id']); ?>&nbsp;</td>
		<td><?php echo h($experience['Experience']['name']); ?>&nbsp;</td>
		<td><?php echo ($experience['Experience']['distance_number'] + 0) . ' ' . $experience['Distance']['name']; ?>
		</td>
		<td><?php echo h($experience['Experience']['time']); ?>&nbsp;</td>
		<td><?php echo h($experience['Experience']['meters']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $experience['Experience']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $experience['Experience']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $experience['Experience']['id']), null, __('Are you sure you want to delete # %s?', $experience['Experience']['id'])); ?>
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
