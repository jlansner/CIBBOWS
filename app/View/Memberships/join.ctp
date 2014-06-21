<div class="row">
	<div class="column column12">
		<h1>Join CIBBOWS</h1>
		
		<p>Become a member of CIBBOWS today and enjoy discounts on races, invitations to special members-only swims and social events, and more!</p>
<?php

if (count($membershipFee)) {
	echo $this->Form->create('null'); ?>
		<?php
			echo $this->Form->hidden(
				'Membership.membership_level_id',
				array(
					'value' => $membershipFee['MembershipLevel']['id']
				)
			);
			echo $this->Form->hidden(
				'Membership.membership_fee_id',
				array(
					'value' => $membershipFee['MembershipFee']['id']
				)
			);
			
			echo '<p>' . $membershipFee['MembershipFee']['year'] . ' ' . $membershipFee['MembershipLevel']['title'] . ' - $' . $membershipFee['MembershipFee']['price'] . '</p>';
		?>

		<h2>Additional Donation</h2>

		<p>CIBBOWS is a not-for-profit, all-volunteer organization. Please consider making an additional donation along with your membership fee to support our work.</p>
	</div>
</div>

<div class="row">
	<div class="column column3">
		<div class="input number required">
			<?php echo $this->Form->label('Donation.amount', 'Donation Amount'); ?>
			<div class="donationInputWrapper">
				<span>$</span>
				<div class="donationInput">
					<?php echo $this->Form->number(
						'Donation.amount',
						array(
							'step' => 'any'
						)
					); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="column column4">
		<?php echo $this->Form->input(
			'Donation.body',
			array(
				'label' => 'Notes'
			)		
		); ?>
		
	</div>
</div>

<div class="row">
	<div class="column column12">
  <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
    data-key="<?php echo Configure::read('Stripe.DataKey'); ?>"
    data-name="CIBBOWS"
    data-description="Membership"
    data-label="Join"
    data-email="<?php echo AuthComponent::user('email'); ?>"
    data-image="/img/128x128.png">
  </script>

	<?php // echo $this->Form->end(__('Join')); 
} else { ?>
	
	<p>Membership is not available at this time.</p>
<?php } ?>
	</div>
</div>