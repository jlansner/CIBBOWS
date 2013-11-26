<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend>Edit Address</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden(
			'user_id',
			array(
				'value' => AuthComponent::user('id')
			)
		);
		echo $this->Form->input('line1');
		echo $this->Form->input('line2');
		echo $this->Form->input('line3');
		echo $this->Form->input('city');
		echo $this->Form->input('postcode');
		echo $this->Form->input('county_province');
		echo $this->Form->input('country');
		echo $this->Form->input('other_details');
		echo $this->Form->input('phone');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>