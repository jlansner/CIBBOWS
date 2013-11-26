<div class="shirtSizes view">
<h2><?php  echo __('Shirt Size'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shirtSize['ShirtSize']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($shirtSize['ShirtSize']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($shirtSize['ShirtSize']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abbreviation'); ?></dt>
		<dd>
			<?php echo h($shirtSize['ShirtSize']['abbreviation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($shirtSize['ShirtSize']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($shirtSize['ShirtSize']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shirt Size'), array('action' => 'edit', $shirtSize['ShirtSize']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shirt Size'), array('action' => 'delete', $shirtSize['ShirtSize']['id']), null, __('Are you sure you want to delete # %s?', $shirtSize['ShirtSize']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shirt Sizes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shirt Size'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('controller' => 'race_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Race Registrations'); ?></h3>
	<?php if (!empty($shirtSize['RaceRegistration'])): ?>
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
		foreach ($shirtSize['RaceRegistration'] as $raceRegistration): ?>
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
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($shirtSize['User'])): ?>
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
		foreach ($shirtSize['User'] as $user): ?>
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
