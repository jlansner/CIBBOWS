<div class="races form">
<?php echo $this->Form->create('Race'); ?>
	<fieldset>
		<legend><?php echo __('Add Section - ' . $parent['Race']['title']); ?></legend>
	<?php
		echo $this->Form->hidden(
			'parent_id',
			array(
				'value' => $parent['Race']['id']
			)
		);
		echo $this->Form->input('title');
		echo $this->Form->input(
			'user_id',
			array(
				'label' => 'Race Director',
				'selected' => $parent['Race']['user_id']
			)
		);
		echo $this->Form->input(
			'date',
			array(
				'selected' => $parent['Race']['date']
			)
		);
		echo $this->Form->input(
			'checkin_start_time',
			array(
				'selected' => $parent['Race']['checkin_start_time']
			)
		);
		echo $this->Form->input(
			'checkin_end_time',
			array(
				'selected' => $parent['Race']['checkin_end_time']
			)
		);
		echo $this->Form->input(
			'start_time',
			array(
				'selected' => $parent['Race']['start_time']
			)
		);
		echo $this->Form->input(
			'end_time',
			array(
				'selected' => $parent['Race']['end_time']
			)
		);
		echo $this->Form->input(
			'start_location',
			array(
				'selected' => $parent['Race']['start_location']
			)
		);
		echo $this->Form->input(
			'end_location',
			array(
				'selected' => $parent['Race']['end_location']
			)
		);
		echo $this->Form->input(
			'checkin_location',
			array(
				'selected' => $parent['Race']['checkin_location']
			)
		);
		echo $this->Form->input(
			'postrace_location',
			array(
				'selected' => $parent['Race']['postrace_location']
			)
		);
		echo $this->Form->input(
			'membership_level_id',
			array(
				'label' => 'Membership Requirement',
				'selected' => $parent['Race']['membership_level_id'],
				'empty' => 'Non-Member'
			)
		);
		echo $this->Form->input(
			'minimum_age',
			array(
				'value' => $parent['Race']['minimum_age']
			)
		);
		echo $this->Form->input(
			'max_swimmers',
			array(
				'value' => $parent['Race']['max_swimmers']
			)
		);
		echo $this->Form->input(
			'max_volunteers',
			array(
				'value' => $parent['Race']['max_volunteers']
			)
		);
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
				'label' => 'Distance',
				'value' => trim($parent['Race']['distance_number'],'.0')
			)
		);
		echo $this->Form->input(
			'distance_id',
			array(
				'label' => '',
				'selected' => $parent['Race']['distance_id']
			)
		);
		echo $this->Form->input(
			'experience_id',
			array(
				'label' => 'Expereince Requirement',
				'selected' => $parent['Race']['experience_id']
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
