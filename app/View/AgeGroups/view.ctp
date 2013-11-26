<div class="ageGroups view">
<h2><?php  echo __('Age Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ageGroup['AgeGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($ageGroup['AgeGroup']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($ageGroup['AgeGroup']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minimum Age'); ?></dt>
		<dd>
			<?php echo h($ageGroup['AgeGroup']['minimum_age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maximum Age'); ?></dt>
		<dd>
			<?php echo h($ageGroup['AgeGroup']['maximum_age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ageGroup['AgeGroup']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ageGroup['AgeGroup']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Age Group'), array('action' => 'edit', $ageGroup['AgeGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Age Group'), array('action' => 'delete', $ageGroup['AgeGroup']['id']), null, __('Are you sure you want to delete # %s?', $ageGroup['AgeGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Age Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('controller' => 'race_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Race Registrations'); ?></h3>
	<?php if (!empty($ageGroup['RaceRegistration'])): ?>
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
		foreach ($ageGroup['RaceRegistration'] as $raceRegistration): ?>
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
	<h3><?php echo __('Related Results'); ?></h3>
	<?php if (!empty($ageGroup['Result'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th><?php echo __('Race Id'); ?></th>
		<th><?php echo __('Age Group Id'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Place'); ?></th>
		<th><?php echo __('Age Place'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ageGroup['Result'] as $result): ?>
		<tr>
			<td><?php echo $result['id']; ?></td>
			<td><?php echo $result['first_name']; ?></td>
			<td><?php echo $result['last_name']; ?></td>
			<td><?php echo $result['user_id']; ?></td>
			<td><?php echo $result['time']; ?></td>
			<td><?php echo $result['race_id']; ?></td>
			<td><?php echo $result['age_group_id']; ?></td>
			<td><?php echo $result['age']; ?></td>
			<td><?php echo $result['gender']; ?></td>
			<td><?php echo $result['place']; ?></td>
			<td><?php echo $result['age_place']; ?></td>
			<td><?php echo $result['created']; ?></td>
			<td><?php echo $result['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'results', 'action' => 'view', $result['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'results', 'action' => 'edit', $result['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'results', 'action' => 'delete', $result['id']), null, __('Are you sure you want to delete # %s?', $result['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
