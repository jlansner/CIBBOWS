<div class="qualifyingSwims view">
<h2><?php  echo __('Qualifying Swim'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($qualifyingSwim['QualifyingSwim']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($qualifyingSwim['User']['name'], array('controller' => 'users', 'action' => 'view', $qualifyingSwim['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($qualifyingSwim['QualifyingSwim']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo h($qualifyingSwim['QualifyingSwim']['distance_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo $this->Html->link($qualifyingSwim['Distance']['id'], array('controller' => 'distances', 'action' => 'view', $qualifyingSwim['Distance']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meters'); ?></dt>
		<dd>
			<?php echo h($qualifyingSwim['QualifyingSwim']['meters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certification'); ?></dt>
		<dd>
			<?php echo h($qualifyingSwim['QualifyingSwim']['certification']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($qualifyingSwim['QualifyingSwim']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($qualifyingSwim['QualifyingSwim']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($qualifyingSwim['QualifyingSwim']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Qualifying Swim'), array('action' => 'edit', $qualifyingSwim['QualifyingSwim']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Qualifying Swim'), array('action' => 'delete', $qualifyingSwim['QualifyingSwim']['id']), null, __('Are you sure you want to delete # %s?', $qualifyingSwim['QualifyingSwim']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Swims'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Swim'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Clinic Registrations'); ?></h3>
	<?php if (!empty($qualifyingSwim['ClinicRegistration'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Clinic Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th><?php echo __('Qualifying Swim Id'); ?></th>
		<th><?php echo __('Qualifying Race Id'); ?></th>
		<th><?php echo __('Result Id'); ?></th>
		<th><?php echo __('Payment'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($qualifyingSwim['ClinicRegistration'] as $clinicRegistration): ?>
		<tr>
			<td><?php echo $clinicRegistration['id']; ?></td>
			<td><?php echo $clinicRegistration['user_id']; ?></td>
			<td><?php echo $clinicRegistration['clinic_id']; ?></td>
			<td><?php echo $clinicRegistration['name']; ?></td>
			<td><?php echo $clinicRegistration['age']; ?></td>
			<td><?php echo $clinicRegistration['gender_id']; ?></td>
			<td><?php echo $clinicRegistration['qualifying_swim_id']; ?></td>
			<td><?php echo $clinicRegistration['qualifying_race_id']; ?></td>
			<td><?php echo $clinicRegistration['result_id']; ?></td>
			<td><?php echo $clinicRegistration['payment']; ?></td>
			<td><?php echo $clinicRegistration['approved']; ?></td>
			<td><?php echo $clinicRegistration['created']; ?></td>
			<td><?php echo $clinicRegistration['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clinic_registrations', 'action' => 'view', $clinicRegistration['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clinic_registrations', 'action' => 'edit', $clinicRegistration['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clinic_registrations', 'action' => 'delete', $clinicRegistration['id']), null, __('Are you sure you want to delete # %s?', $clinicRegistration['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Clinic Registration'), array('controller' => 'clinic_registrations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Race Registrations'); ?></h3>
	<?php if (!empty($qualifyingSwim['RaceRegistration'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Race Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th><?php echo __('Age Group Id'); ?></th>
		<th><?php echo __('Qualifying Swim Id'); ?></th>
		<th><?php echo __('Qualifying Race Id'); ?></th>
		<th><?php echo __('Result Id'); ?></th>
		<th><?php echo __('Payment'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Shirt Size Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($qualifyingSwim['RaceRegistration'] as $raceRegistration): ?>
		<tr>
			<td><?php echo $raceRegistration['id']; ?></td>
			<td><?php echo $raceRegistration['user_id']; ?></td>
			<td><?php echo $raceRegistration['race_id']; ?></td>
			<td><?php echo $raceRegistration['name']; ?></td>
			<td><?php echo $raceRegistration['age']; ?></td>
			<td><?php echo $raceRegistration['gender_id']; ?></td>
			<td><?php echo $raceRegistration['age_group_id']; ?></td>
			<td><?php echo $raceRegistration['qualifying_swim_id']; ?></td>
			<td><?php echo $raceRegistration['qualifying_race_id']; ?></td>
			<td><?php echo $raceRegistration['result_id']; ?></td>
			<td><?php echo $raceRegistration['payment']; ?></td>
			<td><?php echo $raceRegistration['approved']; ?></td>
			<td><?php echo $raceRegistration['shirt_size_id']; ?></td>
			<td><?php echo $raceRegistration['created']; ?></td>
			<td><?php echo $raceRegistration['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'race_registrations', 'action' => 'view', $raceRegistration['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'race_registrations', 'action' => 'edit', $raceRegistration['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'race_registrations', 'action' => 'delete', $raceRegistration['id']), null, __('Are you sure you want to delete # %s?', $raceRegistration['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Test Swim Registrations'); ?></h3>
	<?php if (!empty($qualifyingSwim['TestSwimRegistration'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Test Swim Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th><?php echo __('Qualifying Swim Id'); ?></th>
		<th><?php echo __('Qualifying Race Id'); ?></th>
		<th><?php echo __('Result Id'); ?></th>
		<th><?php echo __('Payment'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($qualifyingSwim['TestSwimRegistration'] as $testSwimRegistration): ?>
		<tr>
			<td><?php echo $testSwimRegistration['id']; ?></td>
			<td><?php echo $testSwimRegistration['user_id']; ?></td>
			<td><?php echo $testSwimRegistration['test_swim_id']; ?></td>
			<td><?php echo $testSwimRegistration['name']; ?></td>
			<td><?php echo $testSwimRegistration['age']; ?></td>
			<td><?php echo $testSwimRegistration['gender_id']; ?></td>
			<td><?php echo $testSwimRegistration['qualifying_swim_id']; ?></td>
			<td><?php echo $testSwimRegistration['qualifying_race_id']; ?></td>
			<td><?php echo $testSwimRegistration['result_id']; ?></td>
			<td><?php echo $testSwimRegistration['payment']; ?></td>
			<td><?php echo $testSwimRegistration['approved']; ?></td>
			<td><?php echo $testSwimRegistration['created']; ?></td>
			<td><?php echo $testSwimRegistration['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'test_swim_registrations', 'action' => 'view', $testSwimRegistration['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'test_swim_registrations', 'action' => 'edit', $testSwimRegistration['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'test_swim_registrations', 'action' => 'delete', $testSwimRegistration['id']), null, __('Are you sure you want to delete # %s?', $testSwimRegistration['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('controller' => 'test_swim_registrations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
