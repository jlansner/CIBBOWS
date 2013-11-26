<div class="raceRegistrations form">
<?php echo $this->Form->create('RaceRegistration'); ?>
	<fieldset>
		<legend><?php echo __('Edit Race Registration'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('race_id');
		echo $this->Form->input('name');
		echo $this->Form->input('age');
		echo $this->Form->input('gender_id');
		echo $this->Form->input('age_group_id');
		echo $this->Form->input('qualifying_swim_id');
		echo $this->Form->input('qualifying_race_id');
		echo $this->Form->input('result_id');
		echo $this->Form->input('payment');
		echo $this->Form->input('approved');
		echo $this->Form->input('shirt_size_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RaceRegistration.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RaceRegistration.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Age Groups'), array('controller' => 'age_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age Group'), array('controller' => 'age_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Swims'), array('controller' => 'qualifying_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Swim'), array('controller' => 'qualifying_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Races'), array('controller' => 'qualifying_races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Race'), array('controller' => 'qualifying_races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shirt Sizes'), array('controller' => 'shirt_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shirt Size'), array('controller' => 'shirt_sizes', 'action' => 'add')); ?> </li>
	</ul>
</div>
