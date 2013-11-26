<div class="genders view">
<h2><?php  echo __('Gender'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abbreviation'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['abbreviation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($gender['Gender']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gender'), array('action' => 'edit', $gender['Gender']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gender'), array('action' => 'delete', $gender['Gender']['id']), null, __('Are you sure you want to delete # %s?', $gender['Gender']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinic Registrations'), array('controller' => 'clinic_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Registration'), array('controller' => 'clinic_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('controller' => 'race_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Registrations'), array('controller' => 'test_swim_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('controller' => 'test_swim_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clinic Registrations'); ?></h3>
	<?php if (!empty($gender['ClinicRegistration'])): ?>
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
		foreach ($gender['ClinicRegistration'] as $clinicRegistration): ?>
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
	<?php if (!empty($gender['RaceRegistration'])): ?>
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
		foreach ($gender['RaceRegistration'] as $raceRegistration): ?>
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
	<?php if (!empty($gender['TestSwimRegistration'])): ?>
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
		foreach ($gender['TestSwimRegistration'] as $testSwimRegistration): ?>
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
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($gender['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Middle Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th><?php echo __('Dob'); ?></th>
		<th><?php echo __('Job Title'); ?></th>
		<th><?php echo __('Shirt Size Id'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Activated'); ?></th>
		<th><?php echo __('Synced'); ?></th>
		<th><?php echo __('Activation Code'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($gender['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['middle_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['gender_id']; ?></td>
			<td><?php echo $user['dob']; ?></td>
			<td><?php echo $user['job_title']; ?></td>
			<td><?php echo $user['shirt_size_id']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['activated']; ?></td>
			<td><?php echo $user['synced']; ?></td>
			<td><?php echo $user['activation_code']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
