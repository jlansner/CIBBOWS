Event Registration Confirmation		

<?php echo $email['User']['name']; ?>,

Thank you for registering for <?php echo $email['Event']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Event']['date']); ?>. 
<?php if ($email['Registration']['payment'] > 0) { ?>
	Your credit card has been charged $<?php echo $email['Registration']['payment']; ?>.
<?php } ?>

We will send you more information as the event approaches.