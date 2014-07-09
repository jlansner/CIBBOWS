<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Edit Profile</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
		echo $this->Form->input('middle_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input(
			'gender_id',
			array(
				'empty' => ''
			)
		);
		echo $this->Form->input(
			'dob',
			array(
				'minYear' => date('Y') - 100,
				'maxYear' => date('Y'),
				'empty' => ''
			)
		);
		echo $this->Form->input('job_title');
		echo $this->Form->input(
			'shirt_size_id',
			array(
				'empty' => ''
			)
		);
		echo $this->Form->input(
			'medical',
			array(
				'label' => 'Indicate important medical information and/or conditions (if none, please indicate none)'
			)
		);
	?>
	<p>
		<?php echo $this->Html->link(
			'Change Password',
			array(
				'action' => 'change_password'
			)
		); ?>
	</p>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>