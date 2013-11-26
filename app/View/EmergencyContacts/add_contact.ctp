<?php echo $this->Form->create('EmergencyContact'); ?>
	<fieldset>
		<legend>Add Emergency Contact</legend>
	<?php
		echo $this->Form->hidden(
			'user_id',
			array(
				'value' => AuthComponent::user('id')
			)
		);
		echo $this->Form->input('name');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('relationship');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
