<div class="row">
	<div class="column column12">
		<h1>Donate to CIBBOWS</h1>
		
		<p>CIBBOWS is a non-profit organization, supported entirely by your generous donations.</p>
	</div>
</div>
<?php echo $this->Form->create('Donation');

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
	
} else { ?>
	<div class="row">
		<div class="column column4">
			<?php echo $this->Form->input('first_name'); ?>
		</div>
		<div class="column column4">
			<?php echo $this->Form->input('last_name'); ?>
		</div>
	</div>
	<div class="row">
		<div class="column column8">
			<?php echo $this->Form->input('email'); ?>
		</div>
	</div>
<?php } ?>

<div class="row">
	<div class="column column3">
		<div class="input number required">
			<?php echo $this->Form->label('amount', 'Donation Amount'); ?>
			<div class="donationInputWrapper">
				<span>$</span>
				<div class="donationInput">
					<?php echo $this->Form->number(
						'amount',
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
			'body',
			array(
				'type' => 'text',
				'label' => 'Notes'
			)		
		); ?>
		
	</div>
</div>
<div class="row">
	<div class="column column12">
		<?php echo $this->Form->end(__('Submit')); ?>
	</div>
