<div class="volunteerNeeds index">
	<h2><?php echo __('Volunteer Needs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('volunteer_task_id'); ?></th>
			<th><?php echo $this->Paginator->sort('race_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($volunteerNeeds as $volunteerNeed): ?>
	<tr>
		<td><?php echo h($volunteerNeed['VolunteerNeed']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($volunteerNeed['VolunteerTask']['title'], array('controller' => 'volunteer_tasks', 'action' => 'view', $volunteerNeed['VolunteerTask']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($volunteerNeed['Race']['title'], array('controller' => 'races', 'action' => 'view', $volunteerNeed['Race']['id'])); ?>
		</td>
		<td><?php echo h($volunteerNeed['VolunteerNeed']['created']); ?>&nbsp;</td>
		<td><?php echo h($volunteerNeed['VolunteerNeed']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $volunteerNeed['VolunteerNeed']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $volunteerNeed['VolunteerNeed']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $volunteerNeed['VolunteerNeed']['id']), null, __('Are you sure you want to delete # %s?', $volunteerNeed['VolunteerNeed']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Volunteer Need'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Volunteer Tasks'), array('controller' => 'volunteer_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Task'), array('controller' => 'volunteer_tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
	</ul>
</div>
