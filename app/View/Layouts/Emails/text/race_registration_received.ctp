Race Registration Received		

<?php echo $email['User']['name']; ?>,

Thank you for registering for <?php echo $email['Race']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Race']['date']); ?>. Your credit card has been charged $<?php echo $email['Registration']['payment']; ?>.

Your registration is not yet complete. Please submit the following information:

<?php if (!$qualified) { ?>
	- Qualifying Race <?php
	echo $this->Html->url(
		array(
			'controller' => 'qualifying_races',
			'action' => 'add_race',
			'full_base' => true
		)
	);
}
	
if (!$hasEmergencyContact) { ?>
	- Emergency Contact <?php
	echo $this->Html->url(
		array(
			'controller' => 'emergency_contact',
			'action' => 'add_contact',
			'full_base' => true
		)
	);
}

if (!$hasAddress) { ?>
	- Address <?php
	echo $this->Html->url(
		array(
			'controller' => 'addresses',
			'action' => 'edit_address',
			'full_base' => true
		)
	);
} ?>
