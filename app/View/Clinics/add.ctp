<div class="clinics form">
<?php echo $this->Form->create(
	'Clinic',
	array(
		'url' => array(
			'controller' => 'clinics',
			'action' => 'add',
			'id' => null			
		)
	)	
); ?>
	<fieldset>
		<legend><?php echo __('Add Clinic'); ?></legend>
	<?php
		echo $this->Form->input(
			'user_id',
			array(
				'label' => 'Coach'
			)
		);
		echo $this->Form->input('title');
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
		echo $this->Form->input('date');
		echo $this->Form->input(
			'start_time',
			array(
				'selected' => '9:00:00'
			)
		);
		echo $this->Form->input(
			'end_time',
			array(
				'selected' => '10:00:00'
			)
		);
		echo $this->Form->input('location_id');
		echo $this->Form->input(
			'membership_level_id',
			array(
				'empty' => 'Non-Member'
			)
		);
		echo $this->Form->input('registration_required');

		echo $this->Form->input(
			'fee',
			array(
				'label' => 'Payment Required'
			)
		);
		echo $this->Form->input('max_swimmers');
		echo $this->Form->input('max_waitlist');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>