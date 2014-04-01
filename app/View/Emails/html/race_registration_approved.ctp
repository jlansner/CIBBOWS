<h1 style="font-size: 24px; font-family: Arial, Helvetica, sans-serif;">Race Registration Approved</h1>		

<p><?php echo $email['User']['name']; ?>,</p>

<p>Thank you for registering for <?php echo $email['Race']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Race']['date']); ?>. Your credit card has been charged $<?php echo $email['Registration']['payment']; ?>.</p>

<p>We will send you more information as race day approaches.</p>