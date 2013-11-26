<div class="clinicRegistrations form">
<?php echo $this->Form->create('ClinicRegistration'); ?>
	<fieldset>
		<legend><?php echo __('Edit Clinic Registration'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('clinic_id');
		echo $this->Form->input('name');
		echo $this->Form->input('age');
		echo $this->Form->input('gender_id');
		echo $this->Form->input('qualifying_swim_id');
		echo $this->Form->input('qualifying_race_id');
		echo $this->Form->input('result_id');
		echo $this->Form->input('payment');
		echo $this->Form->input('approved');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClinicRegistration.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ClinicRegistration.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Clinic Registrations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Swims'), array('controller' => 'qualifying_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Swim'), array('controller' => 'qualifying_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Races'), array('controller' => 'qualifying_races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Race'), array('controller' => 'qualifying_races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
