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
			Gender:
			<?php echo $genders[$this->request->data['RaceRegistration']['gender_id']]; ?>
		</p>

		<p>
			Age on Race Day:
			<?php echo $this->request->data['RaceRegistration']['age']; ?>
		</p>
		
		<p>
			Race:
			<?php echo $race['Race']['title']; ?>
		</p>
	<?php
		echo $this->Form->hidden('user_id');
		echo $this->Form->hidden('race_id');
		echo $this->Form->hidden('parent_race_id');
		echo $this->Form->hidden('first_name');
		echo $this->Form->hidden('last_name');
		echo $this->Form->hidden('age');
		echo $this->Form->hidden('gender_id');
		echo $this->Form->hidden('payment');
		echo $this->Form->hidden('waiver'); 
//		echo $this->Form->input('shirt_size_id');

		echo $this->Html->link(
			'Cancel',
			array(
				'action' => 'register',
				$this->request->data['RaceRegistration']['race_id']
			)
		);
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