<div class="volunteerNeeds form">
<?php echo $this->Form->create('VolunteerNeed'); ?>
	<fieldset>
		<legend><?php echo __('Edit Volunteer Need'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('volunteer_task_id');
		echo $this->Form->input('race_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('VolunteerNeed.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('VolunteerNeed.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Volunteer Needs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Volunteer Tasks'), array('controller' => 'volunteer_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Task'), array('controller' => 'volunteer_tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
	</ul>
</div>
