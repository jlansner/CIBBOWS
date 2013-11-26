<div class="volunteerNeeds view">
<h2><?php  echo __('Volunteer Need'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($volunteerNeed['VolunteerNeed']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volunteer Task'); ?></dt>
		<dd>
			<?php echo $this->Html->link($volunteerNeed['VolunteerTask']['title'], array('controller' => 'volunteer_tasks', 'action' => 'view', $volunteerNeed['VolunteerTask']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($volunteerNeed['Race']['title'], array('controller' => 'races', 'action' => 'view', $volunteerNeed['Race']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($volunteerNeed['VolunteerNeed']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($volunteerNeed['VolunteerNeed']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Volunteer Need'), array('action' => 'edit', $volunteerNeed['VolunteerNeed']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Volunteer Need'), array('action' => 'delete', $volunteerNeed['VolunteerNeed']['id']), null, __('Are you sure you want to delete # %s?', $volunteerNeed['VolunteerNeed']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Needs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Need'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Tasks'), array('controller' => 'volunteer_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Task'), array('controller' => 'volunteer_tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
	</ul>
</div>
