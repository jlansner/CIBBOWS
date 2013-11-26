<div class="testSwims view">
<h2><?php  echo __('Test Swim'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwim['User']['name'], array('controller' => 'users', 'action' => 'view', $testSwim['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Time'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Time'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['end_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Location'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['start_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Location'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['end_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwim['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $testSwim['MembershipLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Swimmers'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['max_swimmers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Map'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['course_map']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['distance_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwim['Distance']['name'], array('controller' => 'distances', 'action' => 'view', $testSwim['Distance']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meters'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['meters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Experience'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwim['Experience']['name'], array('controller' => 'experiences', 'action' => 'view', $testSwim['Experience']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($testSwim['TestSwim']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Test Swim'), array('action' => 'edit', $testSwim['TestSwim']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Test Swim'), array('action' => 'delete', $testSwim['TestSwim']['id']), null, __('Are you sure you want to delete # %s?', $testSwim['TestSwim']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Experiences'), array('controller' => 'experiences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Experience'), array('controller' => 'experiences', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Fees'), array('controller' => 'test_swim_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Fee'), array('controller' => 'test_swim_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Registrations'), array('controller' => 'test_swim_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('controller' => 'test_swim_registrations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Test Swim Fees'); ?></h3>
	<?php if (!empty($testSwim['TestSwimFee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Test Swim Id'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Priority'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($testSwim['TestSwimFee'] as $testSwimFee): ?>
		<tr>
			<td><?php echo $testSwimFee['id']; ?></td>
			<td><?php echo $testSwimFee['test_swim_id']; ?></td>
			<td><?php echo $testSwimFee['start_date']; ?></td>
			<td><?php echo $testSwimFee['end_date']; ?></td>
			<td><?php echo $testSwimFee['price']; ?></td>
			<td><?php echo $testSwimFee['priority']; ?></td>
			<td><?php echo $testSwimFee['membership_level_id']; ?></td>
			<td><?php echo $testSwimFee['created']; ?></td>
			<td><?php echo $testSwimFee['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'test_swim_fees', 'action' => 'view', $testSwimFee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'test_swim_fees', 'action' => 'edit', $testSwimFee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'test_swim_fees', 'action' => 'delete', $testSwimFee['id']), null, __('Are you sure you want to delete # %s?', $testSwimFee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Test Swim Fee'), array('controller' => 'test_swim_fees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Test Swim Registrations'); ?></h3>
	<?php if (!empty($testSwim['TestSwimRegistration'])): ?>
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
		foreach ($testSwim['TestSwimRegistration'] as $testSwimRegistration): ?>
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
