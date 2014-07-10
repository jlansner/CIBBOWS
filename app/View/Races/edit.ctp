<?php echo $this->Form->create('Race'); ?>
	<fieldset>
		<legend><?php echo __('Edit Race'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input(
			'user_id',
			array(
				'label' => 'Race Director')
		);
		echo $this->Form->input('series_id');
		echo $this->Form->input('date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('checkin_start_time');
		echo $this->Form->input('checkin_end_time');
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
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
			'postrace_body',
			array(
//				'required' => false,
				'type' => 'textarea',
				'class' => 'ckeditor'
			)
		);
	?>
		<div class="input text required">
			<?php
		echo $this->Form->input(
			'distance_number',
			array(
				'label' => 'Distance',
				'value' => ($this->request->data['Race']['distance_number'] + 0),
				'div' => false,
				'type' => 'text'
			)
		);
		echo $this->Form->input(
			'distance_id',
			array(
				'label' => false,
				'div' => false
			)
		);
	?>
	</div>
<?php
		echo $this->Form->input(
			'experience_id',
			array(
				'label' => 'Expereince Requirement',
				'empty' => 'No Experience Necessary'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
