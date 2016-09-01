<div class="row">
	<div class="column column12">
		<h1>Checkout</h1>
<?php echo $this->Form->create(
	'null',
	array(
		'url' => array(
			'controller' => 'event_registrations',
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
			Event:
			<?php echo $event['Event']['title'];
			
			if (isset($this->request->data['EventRegistration']['child_event_id'])) {
				echo ' &ndash; ' . $childEvent['Event']['title'];
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
			Age on Event Day:
			<?php echo $this->request->data['EventRegistration']['age']; ?>
		</p>
				
		<p>
			Registration Fee: $<?php echo $this->request->data['EventRegistration']['payment']; 
			$showTotal = false;

			if ($this->request->data['EventRegistration']['join']) {
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
				echo "<br /><strong>Total Cost:</strong> $" . $this->request->data['EventRegistration']['total_payment'];
			}

			?>
		</p>
		
	<?php
		echo $this->Form->hidden('EventRegistration.user_id');
		echo $this->Form->hidden('EventRegistration.event_id');
		echo $this->Form->hidden('EventRegistration.first_name');
		echo $this->Form->hidden('EventRegistration.last_name');
		echo $this->Form->hidden('EventRegistration.age');
		echo $this->Form->hidden('Event.minimum_age');
		echo $this->Form->hidden('EventRegistration.payment');
		echo $this->Form->hidden('EventRegistration.total_payment');
		echo $this->Form->hidden('EventRegistration.waiver');
		echo $this->Form->hidden('User.gender_id');
		echo $this->Form->hidden('EventRegistration.join');
		echo $this->Form->hidden('Donation.amount');
		echo $this->Form->hidden('Donation.body');

	?>
	</fieldset>
<?php
 if ($this->request->data['EventRegistration']['total_payment'] > 0) {
?>
<script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
    data-key="<?php echo Configure::read('Stripe.DataKey'); ?>"
    data-name="CIBBOWS"
    data-description="Event Registration"
    data-label="Register"
    data-email="<?php echo AuthComponent::user('email'); ?>"
    data-image="/img/128x128.png">
  </script>
<?php } else {
		echo $this->Form->end(
			array(
				'label' => 'Register',
				'id' => 'registerButton'
			)
		); } ?>

</div>
</div>