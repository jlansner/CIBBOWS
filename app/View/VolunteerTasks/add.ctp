<div class="volunteerTasks form">
<?php echo $this->Form->create('VolunteerTask'); ?>
	<fieldset>
		<legend><?php echo __('Add Volunteer Task'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Volunteer Tasks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Volunteer Needs'), array('controller' => 'volunteer_needs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Need'), array('controller' => 'volunteer_needs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Registrations'), array('controller' => 'volunteer_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Registration'), array('controller' => 'volunteer_registrations', 'action' => 'add')); ?> </li>
	</ul>
</div>
