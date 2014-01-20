<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>Reset Password</legend>
	<?php
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>