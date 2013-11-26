<div class="series view">
<h2><?php  echo __('Series'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($series['Series']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($series['Series']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($series['Series']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($series['Series']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($series['Series']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Series'), array('action' => 'edit', $series['Series']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Series'), array('action' => 'delete', $series['Series']['id']), null, __('Are you sure you want to delete # %s?', $series['Series']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Series'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Series'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Races'); ?></h3>
	<?php if (!empty($series['Race'])): ?>
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
		foreach ($series['Race'] as $race): ?>
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
