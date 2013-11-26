<?php echo $this->Form->create('EmergencyContact'); ?>
	<fieldset>
		<legend>Edit Contact Info for <strong><?php echo $this->request->data['EmergencyContact']['name']; ?></strong></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('relationship');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
