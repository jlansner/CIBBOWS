<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Register</legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
//		echo $this->Form->input('middle_name');
		echo $this->Form->input('last_name');
/*		echo $this->Form->input('gender_id');
		echo $this->Form->input(
			'dob',
			array(
				'minYear' => date('Y') - 100,
				'maxYear' => date('Y'),
				'selected' => '1950-01-01'
			)
		); */
		echo $this->Form->input('password');
		echo $this->Form->input(
			'password2',
			array(
				'label' => 'Confirm Password',
				'type' => 'password'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>