<div class="volunteerRegistrations view">
<h2><?php  echo __('Volunteer Registration'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($volunteerRegistration['VolunteerRegistration']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($volunteerRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $volunteerRegistration['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($volunteerRegistration['Race']['title'], array('controller' => 'races', 'action' => 'view', $volunteerRegistration['Race']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($volunteerRegistration['VolunteerRegistration']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volunteer Task'); ?></dt>
		<dd>
			<?php echo $this->Html->link($volunteerRegistration['VolunteerTask']['title'], array('controller' => 'volunteer_tasks', 'action' => 'view', $volunteerRegistration['VolunteerTask']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($volunteerRegistration['VolunteerRegistration']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($volunteerRegistration['VolunteerRegistration']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($volunteerRegistration['VolunteerRegistration']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Volunteer Registration'), array('action' => 'edit', $volunteerRegistration['VolunteerRegistration']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Volunteer Registration'), array('action' => 'delete', $volunteerRegistration['VolunteerRegistration']['id']), null, __('Are you sure you want to delete # %s?', $volunteerRegistration['VolunteerRegistration']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Registrations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Registration'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Tasks'), array('controller' => 'volunteer_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Task'), array('controller' => 'volunteer_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
