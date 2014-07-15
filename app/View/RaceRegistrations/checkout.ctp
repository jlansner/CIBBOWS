<div class="row">
	<div class="column column12">
		<h1>Checkout</h1>
<?php echo $this->Form->create(
	'null',
	array(
		'url' => array(
			'controller' => 'race_registrations',
			'action' => 'checkout'
		)
	)
); ?>
	<fieldset>
		
		<p>
			Name:
			<?php echo AuthComponent::user('name'); ?>
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
			<?php echo $genders[$this->request->data['User']['gender_id']]; ?>
		</p>

		<p>
			Date of Birth:
			<?php echo $this->Time->format('F j, Y',$this->request->data['User']['dob']); ?>
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
			Registration Fee: $<?php echo $this->request->data['RaceRegistration']['payment']; 
			$showTotal = false;

			if ($this->request->data['RaceRegistration']['join']) {
				echo "<br />Membership Fee: $" . $this->request->data['MembershipFee']['price'];
				$showTotal = true; 
			}

			if ($this->request->data['Donation']['amount'] > 0) {
				echo "<br />Additional Donation: $" . $this->request->data['Donation']['amount'];
				if (trim($this->request->data['Donation']['body']) != '') {
					echo ' - ' . $this->request->data['Donation']['body']; 
				}
				$showTotal = true; 
			}
			
			if ($showTotal) {
				echo "<br /><strong>Total Cost:</strong> $" . $this->request->data['RaceRegistration']['total_payment'];
			}

			?>
		</p>
		
	<?php
		echo $this->Form->hidden('RaceRegistration.user_id');
		echo $this->Form->hidden('RaceRegistration.race_id');
		echo $this->Form->hidden('RaceRegistration.child_race_id');
		echo $this->Form->hidden('RaceRegistration.first_name');
		echo $this->Form->hidden('RaceRegistration.last_name');
		echo $this->Form->hidden('RaceRegistration.age');
		echo $this->Form->hidden('Race.minimum_age');
		echo $this->Form->hidden('RaceRegistration.payment');
		echo $this->Form->hidden('RaceRegistration.total_payment');
		echo $this->Form->hidden('RaceRegistration.waiver');
		echo $this->Form->hidden('User.gender_id');
		echo $this->Form->hidden('RaceRegistration.join');
		echo $this->Form->hidden('User.shirt_size_id');
		echo $this->Form->hidden('Donation.amount');
		echo $this->Form->hidden('Donation.body');

	?>
	</fieldset>
<?php
/*
		echo $this->Html->link(
			'Cancel',
			array(
				'action' => 'register',
				$this->request->data['RaceRegistration']['race_id'],
			),
			array(
				'class' => 'cancelButton'
			)
		);
  */
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