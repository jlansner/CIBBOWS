<?php echo $this->Form->create('Checkout'); ?>
	<fieldset>
		<legend>Checkout</legend>
	<?php
		echo $this->Form->hidden(
			'user_id',
			array(
				'value' => AuthComponent::user('id')
			)
		);
		
		echo $this->Form->hidden(
			'race_id',
			array(
				'value' => $race['Race']['id']
			)
		);

		if (count($race['ChildRace']) > 0) {
			if ($race['Race']['exclusive']) {
				// allow multiple section sign up
			} else {
				echo $this->Form->hidden(
					'parent_race_id',
					array(
						'value' => $race['Race']['id']
					)
				);
				echo $this->Form->input(
					'child_race_id',
					array(
						'type' => 'radio',
						'legend' => false,
						'before' => '<p>Section</p>',
						'separator' => '<br />',
						'escape' => false
					)
				);
			}
		}

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

		if ((AuthComponent::user('dob') == null) || (AuthComponent::user('dob') == "0000-00-00")) {
			echo $this->Form->input(
				'dob',
				array(
					'label' => 'Date of Birth',
					'type' => 'date',
//					'dateFormat' => 'MDY',
					'minYear' => date('Y') - 100,
					'maxYear' => date('Y'),
				)
			);
		} else {
			$birthDate = new DateTime(AuthComponent::user('dob'));
			$raceDate = new DateTime($race['Race']['date']);
			$interval = $birthDate->diff($raceDate);		
			$age = $interval->y;	
		
			echo $this->Form->hidden(
				'age',
				array(
					'value' => $age 
				)
			);
		}

		if (AuthComponent::user('gender_id')) {
			echo $this->Form->hidden(
				'gender_id',
				array(
					'value' => AuthComponent::user('gender_id')
				)
			);
		} else {
			echo $this->Form->input('gender_id');
		}		

		if (($userMembershipLevel) && (is_array($currentMemFee))) {
			echo '<p>Member Price: $' . $currentMemFee['price'] . '</p>';
			echo $this->Form->hidden(
				'payment',
				array(
					'value' => $currentMemFee['price']
				)
			);

		} else {
			echo '<p>Price: $' . $currentFee['price'] . '</p>';
			echo $this->Form->hidden(
				'payment',
				array(
					'value' => $currentFee['price']
				)
			);
		}

		echo $this->Form->input(
			'waiver',
			array(
				'label' => 'I agree to the terms of the waiver'
			)
		);
//		echo $this->Form->input('shirt_size_id');
	?>
	</fieldset>
<?php /*	  <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
    data-key="pk_test_PS7P63ptiMndUVPTjAr2bwKY"
    data-name="CIBBOWS"
    data-description="Race Registration"
    data-label="Register"
    data-email="<?php echo AuthComponent::user('email'); ?>"
    data-image="/128x128.png">
  </script>
*/ ?>

<script>/*
  var handler = StripeCheckout.configure({
    key: 'pk_test_PS7P63ptiMndUVPTjAr2bwKY',
    image: '/square-image.png',
    email: '<?php echo AuthComponent::user('email'); ?>',
    token: function(token, args) {
      // Use the token to create the charge with a server-side script.
    }
  });

  document.getElementById('customButton').addEventListener('click', function(e) {
    // Open Checkout with further options
    handler.open({
      name: 'CIBBOWS',
      description: 'Race Registration',
      amount: 2000
    });
    e.preventDefault();
  }); */
</script>
<?php
		echo $this->Form->end(
			array(
				'label' => 'Register',
				'id' => 'registerButton'
			)
		);
?>
