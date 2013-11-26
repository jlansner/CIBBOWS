<div class="results index">
	<h2><?php echo __('Results'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('race_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('place'); ?></th>
			<th><?php echo $this->Paginator->sort('age_place'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($results as $result): ?>
	<tr>
		<td><?php echo h($result['Result']['id']); ?>&nbsp;</td>
		<td><?php echo h($result['Result']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($result['Result']['last_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($result['User']['name'], array('controller' => 'users', 'action' => 'view', $result['User']['id'])); ?>
		</td>
		<td><?php echo h($result['Result']['time']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($result['Race']['title'], array('controller' => 'races', 'action' => 'view', $result['Race']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($result['AgeGroup']['title'], array('controller' => 'age_groups', 'action' => 'view', $result['AgeGroup']['id'])); ?>
		</td>
		<td><?php echo h($result['Result']['age']); ?>&nbsp;</td>
		<td><?php echo h($result['Gender']['title']); ?>&nbsp;</td>
		<td><?php echo h($result['Result']['place']); ?>&nbsp;</td>
		<td><?php echo h($result['Result']['age_place']); ?>&nbsp;</td>
		<td><?php echo h($result['Result']['created']); ?>&nbsp;</td>
		<td><?php echo h($result['Result']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $result['Result']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $result['Result']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $result['Result']['id']), null, __('Are you sure you want to delete # %s?', $result['Result']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Result'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Age Groups'), array('controller' => 'age_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age Group'), array('controller' => 'age_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinic Registrations'), array('controller' => 'clinic_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Registration'), array('controller' => 'clinic_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('controller' => 'race_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Registrations'), array('controller' => 'test_swim_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('controller' => 'test_swim_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Codes'), array('controller' => 'codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code'), array('controller' => 'codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
