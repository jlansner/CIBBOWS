<div class="row">
	<div class="column column12">
		<h1>Reset Password</h1>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
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
</div>