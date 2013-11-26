<div class="membershipLevels view">
<h2><?php  echo __('Membership Level'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($membershipLevel['MembershipLevel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($membershipLevel['MembershipLevel']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($membershipLevel['MembershipLevel']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($membershipLevel['MembershipLevel']['rank']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($membershipLevel['MembershipLevel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($membershipLevel['MembershipLevel']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Membership Level'), array('action' => 'edit', $membershipLevel['MembershipLevel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Membership Level'), array('action' => 'delete', $membershipLevel['MembershipLevel']['id']), null, __('Are you sure you want to delete # %s?', $membershipLevel['MembershipLevel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinic Fees'), array('controller' => 'clinic_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Fee'), array('controller' => 'clinic_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Fees'), array('controller' => 'membership_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Fee'), array('controller' => 'membership_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Fees'), array('controller' => 'race_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Fee'), array('controller' => 'race_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Fees'), array('controller' => 'test_swim_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Fee'), array('controller' => 'test_swim_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clinic Fees'); ?></h3>
	<?php if (!empty($membershipLevel['ClinicFee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Clinic Id'); ?></th>
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
		foreach ($membershipLevel['ClinicFee'] as $clinicFee): ?>
		<tr>
			<td><?php echo $clinicFee['id']; ?></td>
			<td><?php echo $clinicFee['clinic_id']; ?></td>
			<td><?php echo $clinicFee['start_date']; ?></td>
			<td><?php echo $clinicFee['end_date']; ?></td>
			<td><?php echo $clinicFee['price']; ?></td>
			<td><?php echo $clinicFee['priority']; ?></td>
			<td><?php echo $clinicFee['membership_level_id']; ?></td>
			<td><?php echo $clinicFee['created']; ?></td>
			<td><?php echo $clinicFee['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clinic_fees', 'action' => 'view', $clinicFee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clinic_fees', 'action' => 'edit', $clinicFee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clinic_fees', 'action' => 'delete', $clinicFee['id']), null, __('Are you sure you want to delete # %s?', $clinicFee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Clinic Fee'), array('controller' => 'clinic_fees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Clinics'); ?></h3>
	<?php if (!empty($membershipLevel['Clinic'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Title'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Max Swimmers'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($membershipLevel['Clinic'] as $clinic): ?>
		<tr>
			<td><?php echo $clinic['id']; ?></td>
			<td><?php echo $clinic['user_id']; ?></td>
			<td><?php echo $clinic['title']; ?></td>
			<td><?php echo $clinic['url_title']; ?></td>
			<td><?php echo $clinic['date']; ?></td>
			<td><?php echo $clinic['start_time']; ?></td>
			<td><?php echo $clinic['end_time']; ?></td>
			<td><?php echo $clinic['location_id']; ?></td>
			<td><?php echo $clinic['membership_level_id']; ?></td>
			<td><?php echo $clinic['max_swimmers']; ?></td>
			<td><?php echo $clinic['created']; ?></td>
			<td><?php echo $clinic['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clinics', 'action' => 'view', $clinic['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clinics', 'action' => 'edit', $clinic['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clinics', 'action' => 'delete', $clinic['id']), null, __('Are you sure you want to delete # %s?', $clinic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($membershipLevel['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Permanent'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Title'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Creator'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($membershipLevel['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['permanent']; ?></td>
			<td><?php echo $event['title']; ?></td>
			<td><?php echo $event['url_title']; ?></td>
			<td><?php echo $event['date']; ?></td>
			<td><?php echo $event['body']; ?></td>
			<td><?php echo $event['location']; ?></td>
			<td><?php echo $event['membership_level_id']; ?></td>
			<td><?php echo $event['creator']; ?></td>
			<td><?php echo $event['created']; ?></td>
			<td><?php echo $event['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Membership Fees'); ?></h3>
	<?php if (!empty($membershipLevel['MembershipFee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Priority'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($membershipLevel['MembershipFee'] as $membershipFee): ?>
		<tr>
			<td><?php echo $membershipFee['id']; ?></td>
			<td><?php echo $membershipFee['membership_level_id']; ?></td>
			<td><?php echo $membershipFee['start_date']; ?></td>
			<td><?php echo $membershipFee['end_date']; ?></td>
			<td><?php echo $membershipFee['price']; ?></td>
			<td><?php echo $membershipFee['priority']; ?></td>
			<td><?php echo $membershipFee['created']; ?></td>
			<td><?php echo $membershipFee['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'membership_fees', 'action' => 'view', $membershipFee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'membership_fees', 'action' => 'edit', $membershipFee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'membership_fees', 'action' => 'delete', $membershipFee['id']), null, __('Are you sure you want to delete # %s?', $membershipFee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Membership Fee'), array('controller' => 'membership_fees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Memberships'); ?></h3>
	<?php if (!empty($membershipLevel['Membership'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('End Date'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($membershipLevel['Membership'] as $membership): ?>
		<tr>
			<td><?php echo $membership['id']; ?></td>
			<td><?php echo $membership['start_date']; ?></td>
			<td><?php echo $membership['end_date']; ?></td>
			<td><?php echo $membership['membership_level_id']; ?></td>
			<td><?php echo $membership['created']; ?></td>
			<td><?php echo $membership['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'memberships', 'action' => 'view', $membership['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'memberships', 'action' => 'edit', $membership['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'memberships', 'action' => 'delete', $membership['id']), null, __('Are you sure you want to delete # %s?', $membership['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Race Fees'); ?></h3>
	<?php if (!empty($membershipLevel['RaceFee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Race Id'); ?></th>
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
		foreach ($membershipLevel['RaceFee'] as $raceFee): ?>
		<tr>
			<td><?php echo $raceFee['id']; ?></td>
			<td><?php echo $raceFee['race_id']; ?></td>
			<td><?php echo $raceFee['start_date']; ?></td>
			<td><?php echo $raceFee['end_date']; ?></td>
			<td><?php echo $raceFee['price']; ?></td>
			<td><?php echo $raceFee['priority']; ?></td>
			<td><?php echo $raceFee['membership_level_id']; ?></td>
			<td><?php echo $raceFee['created']; ?></td>
			<td><?php echo $raceFee['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'race_fees', 'action' => 'view', $raceFee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'race_fees', 'action' => 'edit', $raceFee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'race_fees', 'action' => 'delete', $raceFee['id']), null, __('Are you sure you want to delete # %s?', $raceFee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Race Fee'), array('controller' => 'race_fees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Races'); ?></h3>
	<?php if (!empty($membershipLevel['Race'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Title'); ?></th>
		<th><?php echo __('Series Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Checkin Start Time'); ?></th>
		<th><?php echo __('Checkin End Time'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Start Location'); ?></th>
		<th><?php echo __('End Location'); ?></th>
		<th><?php echo __('Checkin Location'); ?></th>
		<th><?php echo __('Postrace Location'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Minimum Age'); ?></th>
		<th><?php echo __('Max Swimmers'); ?></th>
		<th><?php echo __('Max Volunteers'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Course Map'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Distance Id'); ?></th>
		<th><?php echo __('Meters'); ?></th>
		<th><?php echo __('Experience Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($membershipLevel['Race'] as $race): ?>
		<tr>
			<td><?php echo $race['id']; ?></td>
			<td><?php echo $race['parent_id']; ?></td>
			<td><?php echo $race['user_id']; ?></td>
			<td><?php echo $race['title']; ?></td>
			<td><?php echo $race['url_title']; ?></td>
			<td><?php echo $race['series_id']; ?></td>
			<td><?php echo $race['date']; ?></td>
			<td><?php echo $race['checkin_start_time']; ?></td>
			<td><?php echo $race['checkin_end_time']; ?></td>
			<td><?php echo $race['start_time']; ?></td>
			<td><?php echo $race['end_time']; ?></td>
			<td><?php echo $race['start_location']; ?></td>
			<td><?php echo $race['end_location']; ?></td>
			<td><?php echo $race['checkin_location']; ?></td>
			<td><?php echo $race['postrace_location']; ?></td>
			<td><?php echo $race['membership_level_id']; ?></td>
			<td><?php echo $race['minimum_age']; ?></td>
			<td><?php echo $race['max_swimmers']; ?></td>
			<td><?php echo $race['max_volunteers']; ?></td>
			<td><?php echo $race['logo']; ?></td>
			<td><?php echo $race['course_map']; ?></td>
			<td><?php echo $race['body']; ?></td>
			<td><?php echo $race['distance']; ?></td>
			<td><?php echo $race['distance_id']; ?></td>
			<td><?php echo $race['meters']; ?></td>
			<td><?php echo $race['experience_id']; ?></td>
			<td><?php echo $race['created']; ?></td>
			<td><?php echo $race['modified']; ?></td>
			<td><?php echo $race['lft']; ?></td>
			<td><?php echo $race['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'races', 'action' => 'view', $race['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'races', 'action' => 'edit', $race['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'races', 'action' => 'delete', $race['id']), null, __('Are you sure you want to delete # %s?', $race['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Test Swim Fees'); ?></h3>
	<?php if (!empty($membershipLevel['TestSwimFee'])): ?>
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
		foreach ($membershipLevel['TestSwimFee'] as $testSwimFee): ?>
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
	<h3><?php echo __('Related Test Swims'); ?></h3>
	<?php if (!empty($membershipLevel['TestSwim'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Title'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Start Location'); ?></th>
		<th><?php echo __('End Location'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Max Swimmers'); ?></th>
		<th><?php echo __('Course Map'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Distance Id'); ?></th>
		<th><?php echo __('Meters'); ?></th>
		<th><?php echo __('Experience Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($membershipLevel['TestSwim'] as $testSwim): ?>
		<tr>
			<td><?php echo $testSwim['id']; ?></td>
			<td><?php echo $testSwim['title']; ?></td>
			<td><?php echo $testSwim['url_title']; ?></td>
			<td><?php echo $testSwim['user_id']; ?></td>
			<td><?php echo $testSwim['date']; ?></td>
			<td><?php echo $testSwim['start_time']; ?></td>
			<td><?php echo $testSwim['end_time']; ?></td>
			<td><?php echo $testSwim['start_location']; ?></td>
			<td><?php echo $testSwim['end_location']; ?></td>
			<td><?php echo $testSwim['membership_level_id']; ?></td>
			<td><?php echo $testSwim['max_swimmers']; ?></td>
			<td><?php echo $testSwim['course_map']; ?></td>
			<td><?php echo $testSwim['body']; ?></td>
			<td><?php echo $testSwim['distance']; ?></td>
			<td><?php echo $testSwim['distance_id']; ?></td>
			<td><?php echo $testSwim['meters']; ?></td>
			<td><?php echo $testSwim['experience_id']; ?></td>
			<td><?php echo $testSwim['created']; ?></td>
			<td><?php echo $testSwim['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'test_swims', 'action' => 'view', $testSwim['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'test_swims', 'action' => 'edit', $testSwim['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'test_swims', 'action' => 'delete', $testSwim['id']), null, __('Are you sure you want to delete # %s?', $testSwim['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
