<div class="row">
	<div class="column column12">
<?php
echo $this->Form->create(
	'Donation',
	array(
		'controller' => 'donations',
		'action' => 'confirm'		
	)
); ?>
	<fieldset>
		<legend>Confirm Donation</legend>
	<?php
		echo $this->Form->hidden('user_id');
		echo $this->Form->hidden('first_name');
		echo $this->Form->hidden('last_name');
		echo $this->Form->hidden('email');
		echo $this->Form->hidden('amount');
	?>
	<p>
	Name: <?php echo $this->request->data['Donation']['first_name'] . " " . $this->request->data['Donation']['last_name']; ?><br />
	Email Address: <?php echo $this->request->data['Donation']['email']; ?><br />
	Amount: $<?php echo number_format($this->request->data['Donation']['amount'],2); ?>
	</p>
	</fieldset>
 <script
    src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button"
    data-key="<?php echo Configure::read('Stripe.DataKey'); ?>"
    data-name="CIBBOWS"
    data-description="Donation"
    data-label="Donate"
    data-email="<?php echo $this->request->data['Donation']['email']; ?>"
    data-image="/128x128.png">
  </script>
<?php // echo $this->Form->end(__('Submit')); ?>
</div>
</div>