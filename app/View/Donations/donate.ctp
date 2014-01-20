<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('Donation'); ?>
	<fieldset>
		<legend>Donate to CIBBOWS</legend>
	<?php

		if (AuthComponent::user('id')) {
			echo $this->Form->hidden(
				'user_id',
				array(
					'value' => AuthComponent::user('id')
				)
			);
			echo $this->Form->hidden(
				'first_name',
				array(
					'value' => AuthComponent::user('first_name')
				)
			);
			echo $this->Form->hidden(
				'last_name',
				array(
					'value' => AuthComponent::user('last_name')
				)
			);
			echo $this->Form->hidden(
				'email',
				array(
					'value' => AuthComponent::user('email')
				)
			);
			
		} else {
			echo $this->Form->input('first_name');
			echo $this->Form->input('last_name');
			echo $this->Form->input('email');
		}
		echo $this->Form->input(
			'amount',
			array(
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>