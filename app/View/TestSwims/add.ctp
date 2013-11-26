<div class="testSwims form">
<?php echo $this->Form->create('TestSwim'); ?>
	<fieldset>
		<legend><?php echo __('Add Test Swim'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('user_id');
		echo $this->Form->input('date');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('start_location');
		echo $this->Form->input('end_location');
		echo $this->Form->input('membership_level_id');
		echo $this->Form->input('max_swimmers');
		echo $this->Form->input('course_map');
		echo $this->Form->input('body');
		echo $this->Form->input(
			'distance_number',
			array(
				'label' => 'Distance'
			)
		);
		echo $this->Form->input(
			'distance_id',
			array(
				'label' => ''
			)
		);		echo $this->Form->input('experience_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Test Swims'), array('action' => 'index')); ?></li>
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
