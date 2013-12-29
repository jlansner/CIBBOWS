
<?php

if (count($membershipFee)) {
	echo $this->Form->create('Membership'); ?>
	<fieldset>
		<legend>Join CIBBOWS</legend>
		<?php
			echo $this->Form->hidden(
				'membership_level_id',
				array(
					'value' => $membershipFee['MembershipLevel']['id']
				)
			);
			echo $this->Form->hidden(
				'membership_fee_id',
				array(
					'value' => $membershipFee['MembershipFee']['id']
				)
			);
			
			echo '<p>' . $membershipFee['MembershipFee']['year'] . ' ' . $membershipFee['MembershipLevel']['title'] . ' - $' . $membershipFee['MembershipFee']['price'] . '</p>';
		?>
	</fieldset>
  <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
    data-key="pk_test_PS7P63ptiMndUVPTjAr2bwKY"
    data-name="CIBBOWS"
    data-description="Membership"
    data-label="Join"
    data-email="<?php echo AuthComponent::user('email'); ?>"
    data-image="/128x128.png">
  </script>

	<?php // echo $this->Form->end(__('Join')); 
} else { ?>
	
	<p>Membership is not available at this time.</p>
<?php } ?>
