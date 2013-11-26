<div class="volunteerTasks view">
<h2><?php  echo __('Volunteer Task'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($volunteerTask['VolunteerTask']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($volunteerTask['VolunteerTask']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($volunteerTask['VolunteerTask']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($volunteerTask['VolunteerTask']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($volunteerTask['VolunteerTask']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($volunteerTask['VolunteerTask']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Volunteer Task'), array('action' => 'edit', $volunteerTask['VolunteerTask']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Volunteer Task'), array('action' => 'delete', $volunteerTask['VolunteerTask']['id']), null, __('Are you sure you want to delete # %s?', $volunteerTask['VolunteerTask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Tasks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Task'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Needs'), array('controller' => 'volunteer_needs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Need'), array('controller' => 'volunteer_needs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Registrations'), array('controller' => 'volunteer_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Registration'), array('controller' => 'volunteer_registrations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Volunteer Needs'); ?></h3>
	<?php if (!empty($volunteerTask['VolunteerNeed'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Volunteer Task Id'); ?></th>
		<th><?php echo __('Race Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($volunteerTask['VolunteerNeed'] as $volunteerNeed): ?>
		<tr>
			<td><?php echo $volunteerNeed['id']; ?></td>
			<td><?php echo $volunteerNeed['volunteer_task_id']; ?></td>
			<td><?php echo $volunteerNeed['race_id']; ?></td>
			<td><?php echo $volunteerNeed['created']; ?></td>
			<td><?php echo $volunteerNeed['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'volunteer_needs', 'action' => 'view', $volunteerNeed['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'volunteer_needs', 'action' => 'edit', $volunteerNeed['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'volunteer_needs', 'action' => 'delete', $volunteerNeed['id']), null, __('Are you sure you want to delete # %s?', $volunteerNeed['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Volunteer Need'), array('controller' => 'volunteer_needs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Volunteer Registrations'); ?></h3>
	<?php if (!empty($volunteerTask['VolunteerRegistration'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Race Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Volunteer Task Id'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($volunteerTask['VolunteerRegistration'] as $volunteerRegistration): ?>
		<tr>
			<td><?php echo $volunteerRegistration['id']; ?></td>
			<td><?php echo $volunteerRegistration['user_id']; ?></td>
			<td><?php echo $volunteerRegistration['race_id']; ?></td>
			<td><?php echo $volunteerRegistration['name']; ?></td>
			<td><?php echo $volunteerRegistration['volunteer_task_id']; ?></td>
			<td><?php echo $volunteerRegistration['approved']; ?></td>
			<td><?php echo $volunteerRegistration['created']; ?></td>
			<td><?php echo $volunteerRegistration['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'volunteer_registrations', 'action' => 'view', $volunteerRegistration['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'volunteer_registrations', 'action' => 'edit', $volunteerRegistration['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'volunteer_registrations', 'action' => 'delete', $volunteerRegistration['id']), null, __('Are you sure you want to delete # %s?', $volunteerRegistration['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Volunteer Registration'), array('controller' => 'volunteer_registrations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
