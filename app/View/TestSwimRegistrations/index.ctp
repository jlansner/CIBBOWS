<div class="testSwimRegistrations index">
	<h2><?php echo __('Test Swim Registrations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('test_swim_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('gender_id'); ?></th>
			<th><?php echo $this->Paginator->sort('qualifying_swim_id'); ?></th>
			<th><?php echo $this->Paginator->sort('qualifying_race_id'); ?></th>
			<th><?php echo $this->Paginator->sort('result_id'); ?></th>
			<th><?php echo $this->Paginator->sort('payment'); ?></th>
			<th><?php echo $this->Paginator->sort('approved'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($testSwimRegistrations as $testSwimRegistration): ?>
	<tr>
		<td><?php echo h($testSwimRegistration['TestSwimRegistration']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testSwimRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $testSwimRegistration['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($testSwimRegistration['TestSwim']['title'], array('controller' => 'test_swims', 'action' => 'view', $testSwimRegistration['TestSwim']['id'])); ?>
		</td>
		<td><?php echo h($testSwimRegistration['TestSwimRegistration']['name']); ?>&nbsp;</td>
		<td><?php echo h($testSwimRegistration['TestSwimRegistration']['age']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testSwimRegistration['Gender']['title'], array('controller' => 'genders', 'action' => 'view', $testSwimRegistration['Gender']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($testSwimRegistration['QualifyingSwim']['id'], array('controller' => 'qualifying_swims', 'action' => 'view', $testSwimRegistration['QualifyingSwim']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($testSwimRegistration['QualifyingRace']['title'], array('controller' => 'qualifying_races', 'action' => 'view', $testSwimRegistration['QualifyingRace']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($testSwimRegistration['Result']['id'], array('controller' => 'results', 'action' => 'view', $testSwimRegistration['Result']['id'])); ?>
		</td>
		<td><?php echo h($testSwimRegistration['TestSwimRegistration']['payment']); ?>&nbsp;</td>
		<td><?php echo h($testSwimRegistration['TestSwimRegistration']['approved']); ?>&nbsp;</td>
		<td><?php echo h($testSwimRegistration['TestSwimRegistration']['created']); ?>&nbsp;</td>
		<td><?php echo h($testSwimRegistration['TestSwimRegistration']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $testSwimRegistration['TestSwimRegistration']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $testSwimRegistration['TestSwimRegistration']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $testSwimRegistration['TestSwimRegistration']['id']), null, __('Are you sure you want to delete # %s?', $testSwimRegistration['TestSwimRegistration']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Swims'), array('controller' => 'qualifying_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Swim'), array('controller' => 'qualifying_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Races'), array('controller' => 'qualifying_races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Race'), array('controller' => 'qualifying_races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
