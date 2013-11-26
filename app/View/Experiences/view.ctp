<div class="experiences view">
<h2><?php  echo __('Experience'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($experience['Experience']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($experience['Experience']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo h($experience['Experience']['distance_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo $this->Html->link($experience['Distance']['id'], array('controller' => 'distances', 'action' => 'view', $experience['Distance']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meters'); ?></dt>
		<dd>
			<?php echo h($experience['Experience']['meters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($experience['Experience']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($experience['Experience']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Experience'), array('action' => 'edit', $experience['Experience']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Experience'), array('action' => 'delete', $experience['Experience']['id']), null, __('Are you sure you want to delete # %s?', $experience['Experience']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Experiences'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Experience'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Races'); ?></h3>
	<?php if (!empty($experience['Race'])): ?>
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
		foreach ($experience['Race'] as $race): ?>
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
	<h3><?php echo __('Related Test Swims'); ?></h3>
	<?php if (!empty($experience['TestSwim'])): ?>
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
		foreach ($experience['TestSwim'] as $testSwim): ?>
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
