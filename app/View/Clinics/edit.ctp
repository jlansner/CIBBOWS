<div class="clinics form">
<?php echo $this->Form->create('Clinic'); ?>
	<fieldset>
		<legend><?php echo __('Edit Clinic'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
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
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('location_id');
		echo $this->Form->input(
			'membership_level_id',
			array(
				'empty' => 'Non-Member'
			)
		);
		echo $this->Form->input('max_swimmers');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
