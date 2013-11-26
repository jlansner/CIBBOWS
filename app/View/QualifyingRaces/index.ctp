<div class="qualifyingRaces index">
	<h2><?php echo __('Qualifying Races'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('distance'); ?></th>
			<th><?php echo $this->Paginator->sort('distance_number_id'); ?></th>
			<th><?php echo $this->Paginator->sort('meters'); ?></th>
			<th><?php echo $this->Paginator->sort('approved'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($qualifyingRaces as $qualifyingRace): ?>
	<tr>
		<td><?php echo h($qualifyingRace['QualifyingRace']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($qualifyingRace['User']['name'], array('controller' => 'users', 'action' => 'view', $qualifyingRace['User']['id'])); ?>
		</td>
		<td><?php echo h($qualifyingRace['QualifyingRace']['title']); ?>&nbsp;</td>
		<td><?php echo h($qualifyingRace['QualifyingRace']['date']); ?>&nbsp;</td>
		<td><?php echo h($qualifyingRace['QualifyingRace']['url']); ?>&nbsp;</td>
		<td><?php echo h($qualifyingRace['QualifyingRace']['distance_number']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($qualifyingRace['Distance']['name'], array('controller' => 'distances', 'action' => 'view', $qualifyingRace['Distance']['id'])); ?>
		</td>
		<td><?php echo h($qualifyingRace['QualifyingRace']['meters']); ?>&nbsp;</td>
		<td><?php echo h($qualifyingRace['QualifyingRace']['approved']); ?>&nbsp;</td>
		<td><?php echo h($qualifyingRace['QualifyingRace']['created']); ?>&nbsp;</td>
		<td><?php echo h($qualifyingRace['QualifyingRace']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $qualifyingRace['QualifyingRace']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $qualifyingRace['QualifyingRace']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $qualifyingRace['QualifyingRace']['id']), null, __('Are you sure you want to delete # %s?', $qualifyingRace['QualifyingRace']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Qualifying Race'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinic Registrations'), array('controller' => 'clinic_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Registration'), array('controller' => 'clinic_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('controller' => 'race_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Registrations'), array('controller' => 'test_swim_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('controller' => 'test_swim_registrations', 'action' => 'add')); ?> </li>
	</ul>
</div>
