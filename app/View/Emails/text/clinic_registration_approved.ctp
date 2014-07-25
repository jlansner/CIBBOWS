Clinic Registration <?php
 if ($email['ClinicRegistration']['approved']) {
 	echo 'Approved';
 } else {
 	echo 'Received';
 }
?>		

<?php echo $email['User']['name']; ?>,

<?php if ($email['ClinicRegistration']['approved']) { ?>
Thank you for registering for the waitlist <?php echo $email['Clinic']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Clinic']['date']); ?>. We will email you if a spot becomes available in the clinic.
<?php } else { ?>
Thank you for registering for <?php echo $email['Clinic']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Clinic']['date']); ?>.
<?php } ?>

Please check the event page at <?php
echo $this->Html->url(
	array(
		'controller' => 'clinics',
		'action' => 'view',
		'year' => substr($email['Clinic']['date'],0,4),
		'month' => substr($email['Clinic']['date'],5,2),
		'day' => substr($email['Clinic']['date'],8,2),
		'url_title' => $email['Clinic']['url_title'],
		'full_base' => true
	)
); 

?> for updated information as the clinic approaches.</p>