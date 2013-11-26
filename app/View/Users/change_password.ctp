<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Change Password</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input(
			'old_password',
			array(
				'label' => 'Old Password',
				'type' => 'password'
			)
		);
		echo $this->Form->input(
			'password',
			array(
				'label' => 'New Password'
			)
			);
		echo $this->Form->input(
			'password2',
			array(
				'label' => 'Confirm New Password',
				'type' => 'password'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>