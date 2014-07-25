<h1 style="font-size: 24px; font-family: Arial, Helvetica, sans-serif;">Clinic Registration <?php
 if ($email['ClinicRegistration']['approved']) {
 	echo 'Approved';
 } else {
 	echo 'Received';
 }
?></h1>		

<p><?php echo $email['User']['name']; ?>,</p>

<?php if ($email['ClinicRegistration']['approved']) { ?>
	<p>Thank you for registering for the waitlist <?php echo $email['Clinic']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Clinic']['date']); ?>. We will email you if a spot becomes available in the clinic.</p>
	<?php } else { ?>
<p>Thank you for registering for <?php echo $email['Clinic']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Clinic']['date']); ?>.</p>
<?php } ?>

<p>Please check the <?php 
echo $this->Html->link(
	'event page',
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

?>
on the site for updated information as the clinic approaches.</p>