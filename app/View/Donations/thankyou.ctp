<div class="row">
	<div class="column column12">

<h1>Thank You for Your donation.</h1>

	<p><?php echo $this->request->data['Donation']['first_name'] . " " . $this->request->data['Donation']['last_name']; ?>,<br />
		<br />
		
		Thank you for your tax-deductible donation of $<?php echo $this->request->data['Donation']['amount']; ?>. We have emailed a receipt to you at <?php echo $this->request->data['Donation']['email']; ?>.
	</p>
	</div>
</div>