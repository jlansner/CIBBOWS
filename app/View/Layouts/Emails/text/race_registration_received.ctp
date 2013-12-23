Race Registration Received		

<?php echo $email['User']['name']; ?>,

Thank you for registering for <?php echo $email['Race']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Race']['date']); ?>. Your credit card has been charged $<?php echo $email['Registration']['payment']; ?>.

Your registration is not yet complete. Please submit the following information:

<?php if (!$qualified) { ?>
	- Qualifying Race http://<?php echo env('HTTP_HOST'); ?>/qualifying_races/add_race
<?php }
	
if (!$hasEmergencyContact) { ?>
	- Emergency Contact http://<?php echo env('HTTP_HOST'); ?>/emergency_contacts/add_contact	
<?php }

if (!$hasAddress) { ?>
	- Address http://<?php echo env('HTTP_HOST'); ?>/addresses/edit_address
<?php } ?>
