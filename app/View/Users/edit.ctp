<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
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
				'empty' => ''
			)
		);
		echo $this->Form->input('job_title');
		echo $this->Form->input('race_director');
		echo $this->Form->input('shirt_size_id');
		echo $this->Form->input('group_id');
		echo $this->Form->input('activated');
		echo $this->Form->input('synced');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>
