Race Registration Approved		

<?php echo $email['User']['name']; ?>,

Thank you for registering for <?php echo $email['Race']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Race']['date']); ?>. Your credit card has been charged $<?php echo $email['Registration']['payment']; ?>.

We will send you more information as race day approaches.