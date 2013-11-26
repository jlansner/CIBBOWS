<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Edit Profile</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
		echo $this->Form->input('middle_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('gender_id');
		echo $this->Form->input(
			'dob',
			array(
				'minYear' => date('Y') - 100,
				'maxYear' => date('Y'),
			)
		);
		echo $this->Form->input('job_title');
		echo $this->Form->input('shirt_size_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
