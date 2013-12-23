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
				'empty' => 'No Experience Necessary',
				'selected' => $parent['Race']['experience_id']
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>