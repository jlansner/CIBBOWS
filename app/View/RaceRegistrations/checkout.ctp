<div class="row">
	<div class="column column12">
<?php echo $this->Form->create(
	'RaceRegistration',
	array(
		'action' => 'checkout'
	)
); ?>
	<fieldset>
		<legend>Checkout</legend>
		
		<p>
			Name:
			<?php echo $this->request->data['RaceRegistration']['first_name']; ?>
			<?php echo $this->request->data['RaceRegistration']['last_name']; ?>
		</p>

		<p>
			Race:
			<?php echo $race['Race']['title'];
			
			if (isset($this->request->data['RaceRegistration']['child_race_id'])) {
				echo ' &ndash; ' . $childRace['Race']['title'];
			} ?>
		</p>
		
		<p>
			Gender:
			<?php echo $genders[$this->request->data['RaceRegistration']['gender_id']]; ?>
		</p>

		<p>
			Age on Race Day:
			<?php echo $this->request->data['RaceRegistration']['age']; ?>
		</p>
		
		<p>
			Wetsuit:
			<?php if ($this->request->data['RaceRegistration']['wetsuit']) {
				echo 'Yes';
			} else {
				echo 'No';
			}
			echo $this->Form->hidden('wetsuit');
			?>
		</p>
		
		<p>
			Fee:
			<?php echo $this->request->data['RaceRegistration']['payment']; ?>
		</p>
		
	<?php
		echo $this->Form->hidden('user_id');
		if (isset($this->request->data['RaceRegistration']['child_race_id'])) {
			echo $this->Form->hidden('parent_race_id');
			echo $this->Form->hidden(
				'race_id',
				array(
					'value' => $this->request->data['RaceRegistration']['child_race_id']
				)
			);
		} else {
			echo $this->Form->hidden('race_id');
		}
		echo $this->Form->hidden('first_name');
		echo $this->Form->hidden('last_name');
		echo $this->Form->hidden('age');
		echo $this->Form->hidden('gender_id');
		echo $this->Form->hidden('payment');
		echo $this->Form->hidden('waiver'); 
//		echo $this->Form->input('shirt_size_id');

	?>
	</fieldset>
<?php
		echo $this->Html->link(
			'Cancel',
			array(
				'action' => 'register',
				$this->request->data['RaceRegistration']['race_id'],
			),
			array(
				'class' => 'linkButton'
			)
		);
?>
<script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
    data-key="<?php echo Configure::read('Stripe.DataKey'); ?>"
    data-name="CIBBOWS"
    data-description="Race Registration"
    data-label="Register"
    data-email="<?php echo AuthComponent::user('email'); ?>"
    data-image="/img/128x128.png">
  </script>


</div>
</div>