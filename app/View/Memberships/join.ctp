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

		<h2>Additional Donation (Optional)</h2>

		<p>CIBBOWS is a not-for-profit, all-volunteer organization. Please consider making an additional donation along with your membership fee to support our work.</p>

<div class="row">
	<div class="column column3">
		<div class="input number required">
			<?php echo $this->Form->label('Donation.amount', 'Additional Donation Amount'); ?>
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
    <?php echo $this->Form->label('Donation.body', 'Notes'); ?>
    <div class="donationInputWrapper">
      <div class="donationInput">
        <?php echo $this->Form->text(
			'Donation.body',
			array(
			)		
		); ?>
      </div>
    </div>		
	</div>
</div>

<div class="row">
	<div class="column column12">

<?php		
		echo $this->Form->input(
			'Membership.waiver',
			array(
				'label' => 'I agree to the terms of the <span class="linkSpan liabilityLink">liability release</span>',
				array(
					'escape' => FALSE
				)
			)
		);

	?>

  <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
    data-key="<?php echo Configure::read('Stripe.DataKey'); ?>"
    data-name="CIBBOWS"
    data-description="Membership"
    data-label="Join"
    data-email="<?php echo AuthComponent::user('email'); ?>"
    data-image="/img/128x128.png">
  </script>

	<?php // echo $this->Form->end(__('Join')); ?>
  </div>
</div>

    <?php } else { ?>

<p>Membership is not available at this time.</p>
<?php } ?>
<div class="liabilityWaiver">
	<span class="liabilityClose"><i class="fa fa-times-circle"></i></span>
	<h3>Liability Release</h3>
	<p>By using or accessing this website or participating in any CIBBOWS activity you are accepting all of the terms of this disclaimer. If you do not agree with anything in this notice you should not use or access this website or participate in any CIBBOWS activity. Nothing on this website should be taken to constitute professional advice or a formal recommendation and CIBBOWS hereby excludes all representations and warranties whatsoever (whether implied by law or otherwise) relating to the content and use of this website. SWIMMERS ALWAYS SWIM AT THEIR OWN RISK. In no event will CIBBOWS assume liability for any direct, incidental, indirect, consequential, punitive or special damages or any other damage whatsoever arising out of or in connection with the use of this website or any linked websites or participation in any CIBBOWS activities.
</p> 
</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.stripe-button-el').attr('disabled','disabled');

		$('body').on('change', '#MembershipWaiver', function() {
			console.log($(this).is(':checked'));
			if ($(this).is(':checked')) {
				$('.stripe-button-el').removeAttr('disabled');
			} else {
				$('.stripe-button-el').attr('disabled','disabled');
			}
		});
	});
</script>