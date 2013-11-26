<div class="qualifyingSwims form">
<?php echo $this->Form->create('QualifyingSwim'); ?>
	<fieldset>
		<legend><?php echo __('Add Qualifying Swim'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('date');
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
		);
		echo $this->Form->input('certification');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Qualifying Swims'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinic Registrations'), array('controller' => 'clinic_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Registration'), array('controller' => 'clinic_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('controller' => 'race_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Registrations'), array('controller' => 'test_swim_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('controller' => 'test_swim_registrations', 'action' => 'add')); ?> </li>
	</ul>
</div>
