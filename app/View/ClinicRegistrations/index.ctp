<div class="clinicRegistrations index">
	<h2><?php echo __('Clinic Registrations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('clinic_id'); ?></th>
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
	<?php foreach ($clinicRegistrations as $clinicRegistration): ?>
	<tr>
		<td><?php echo h($clinicRegistration['ClinicRegistration']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clinicRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $clinicRegistration['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($clinicRegistration['Clinic']['title'], array('controller' => 'clinics', 'action' => 'view', $clinicRegistration['Clinic']['id'])); ?>
		</td>
		<td><?php echo h($clinicRegistration['ClinicRegistration']['name']); ?>&nbsp;</td>
		<td><?php echo h($clinicRegistration['ClinicRegistration']['age']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clinicRegistration['Gender']['title'], array('controller' => 'genders', 'action' => 'view', $clinicRegistration['Gender']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($clinicRegistration['QualifyingSwim']['id'], array('controller' => 'qualifying_swims', 'action' => 'view', $clinicRegistration['QualifyingSwim']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($clinicRegistration['QualifyingRace']['title'], array('controller' => 'qualifying_races', 'action' => 'view', $clinicRegistration['QualifyingRace']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($clinicRegistration['Result']['id'], array('controller' => 'results', 'action' => 'view', $clinicRegistration['Result']['id'])); ?>
		</td>
		<td><?php echo h($clinicRegistration['ClinicRegistration']['payment']); ?>&nbsp;</td>
		<td><?php echo h($clinicRegistration['ClinicRegistration']['approved']); ?>&nbsp;</td>
		<td><?php echo h($clinicRegistration['ClinicRegistration']['created']); ?>&nbsp;</td>
		<td><?php echo h($clinicRegistration['ClinicRegistration']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clinicRegistration['ClinicRegistration']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clinicRegistration['ClinicRegistration']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clinicRegistration['ClinicRegistration']['id']), null, __('Are you sure you want to delete # %s?', $clinicRegistration['ClinicRegistration']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Clinic Registration'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
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
