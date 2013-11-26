<div class="races form">
<?php echo $this->Form->create('Race'); ?>
	<fieldset>
		<legend><?php echo __('Add Race'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input(
			'user_id',
			array(
				'label' => 'Race Director'
			)
		);
		echo $this->Form->input('series_id');
		echo $this->Form->input('date');
		echo $this->Form->input('end_date');
		echo $this->Form->input(
			'checkin_start_time',
			array(
				'selected' => '7:00:00'
				)
		);
		echo $this->Form->input(
			'checkin_end_time',
			array(
				'selected' => '8:00:00'
			)
		);
		echo $this->Form->input(
			'start_time',
			array(
				'selected' => '9:00:00'
			)
		);
		echo $this->Form->input(
			'end_time',
			array(
				'selected' => '13:00:00'
			)
		);
		echo $this->Form->input('start_location');
		echo $this->Form->input('end_location');
		echo $this->Form->input('checkin_location');
		echo $this->Form->input('postrace_location');
		echo $this->Form->input(
			'membership_level_id',
			array(
				'label' => 'Membership Requirement',
				'empty' => 'Non-Member'
			)
		);
		echo $this->Form->input('minimum_age');
		echo $this->Form->input('max_swimmers');
		echo $this->Form->input('max_volunteers');
		echo $this->Form->input('logo');
		echo $this->Form->input('course_map');
		echo $this->Form->input(
			'teaser',
			array(
//				'required' => false,
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input(
			'body',
			array(
//				'required' => false,
				'class' => 'ckeditor'
			)
		);
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
		echo $this->Form->input(
			'experience_id',
			array(
				'label' => 'Experience Requirement',
				'empty' => 'No Experience Necessary'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Races'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Series'), array('controller' => 'series', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Series'), array('controller' => 'series', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Experiences'), array('controller' => 'experiences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Experience'), array('controller' => 'experiences', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Fees'), array('controller' => 'race_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Fee'), array('controller' => 'race_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('controller' => 'race_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('controller' => 'race_registrations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Needs'), array('controller' => 'volunteer_needs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Need'), array('controller' => 'volunteer_needs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Volunteer Registrations'), array('controller' => 'volunteer_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Volunteer Registration'), array('controller' => 'volunteer_registrations', 'action' => 'add')); ?> </li>
	</ul>
</div>
