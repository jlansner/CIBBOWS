<h1 style="font-size: 24px; font-family: Arial, Helvetica, sans-serif;">Race Registration Received</h1>		

<p><?php echo $email['User']['name']; ?>,</p>

<p>Thank you for registering for <?php echo $email['Race']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Race']['date']); ?>. Your credit card has been charged $<?php echo $email['Registration']['payment']; ?>.</p>

<p>Your registration is not yet complete. Please submit the following information:</p>

<ul>
	<?php if (!$qualified) { ?>
		<li><?php
			echo $this->Html->link(
				'Qualifying Race',
				array(
					'controller' => 'qualifying_races',
					'action' => 'add_race',
					'full_base' => true
				)
			);
		?></li>
	
	if (!$hasEmergencyContact) { ?>
		<li><?php
			echo $this->Html->link(
				'Emergency Contact',
				array(
					'controller' => 'emergency_contact',
					'action' => 'add_contact',
					'full_base' => true
				)
			);
		?></li>
	
	<?php }
	if (!$hasAddress) { ?>
		<li><?php
			echo $this->Html->link(
				'Address',
				array(
					'controller' => 'addresses',
					'action' => 'edit_address',
					'full_base' => true
				)
			);
		?></li>
	<?php } ?>
</ul>