<div class="ageGroups index">
	<h2><?php echo __('Age Groups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('gender_id'); ?></th>
			<th><?php echo $this->Paginator->sort('minimum_age'); ?></th>
			<th><?php echo $this->Paginator->sort('maximum_age'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ageGroups as $ageGroup): ?>
	<tr>
		<td><?php echo h($ageGroup['AgeGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($ageGroup['AgeGroup']['title']); ?>&nbsp;</td>
		<td><?php echo h($ageGroup['AgeGroup']['url_title']); ?>&nbsp;</td>
		<td><?php echo h($ageGroup['Gender']['title']); ?>&nbsp;</td>
		<td><?php echo h($ageGroup['AgeGroup']['minimum_age']); ?>&nbsp;</td>
		<td><?php echo h($ageGroup['AgeGroup']['maximum_age']); ?>&nbsp;</td>
		<td><?php echo h($ageGroup['AgeGroup']['created']); ?>&nbsp;</td>
		<td><?php echo h($ageGroup['AgeGroup']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ageGroup['AgeGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ageGroup['AgeGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ageGroup['AgeGroup']['id']), null, __('Are you sure you want to delete # %s?', $ageGroup['AgeGroup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Age Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('controller' => 'race_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
