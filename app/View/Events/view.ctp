<div class="row">
	<div class="column column12">
<h1><?php echo h($event['Event']['title']); ?></h1>
<?php if ($event['Event']['registration_required']) { ?>
	<h2>Overview</h2>
<?php } ?>
<p>Date: <?php echo $this->Time->format('F j, Y',$event['Event']['date']); ?></p>

<?php if ($userMembershipLevel >= $event['Event']['membership_level_id']) {
	$regOpen = false;
	$memRegOpen = false;
	if ($event['CurrentNonMemberEventFee']['price']) {
		$regOpen = true;
	} 
	
	if ($event['CurrentMemberEventFee']['price']) {
		$memRegOpen = true;
 	}

	 if ($event['Event']['registration_required']) {
	 	echo $this->element(
	 		'event_menu',
	 		array(
				'event' => $event
			)
		);
		
		if (strtotime('now') > strtotime($event['Event']['date'])) {
	
		} else if ($totalReg >= $event['Event']['max_attendees']) {
			echo 'Registration for this event is full.';
		} else if ($reg) {
			echo 'You are already registered for this event.';
		} else {
	
			if (($regOpen) || (($memRegOpen) && ($userMembershipLevel == 1))) {
				echo $this->Html->link(
					'Register',
					array(
						'controller' => 'event_registrations',
						'action' => 'register',
						$event['Event']['id']
					)
				);
			} else if ($memRegOpen) {
				echo 'Registration is currently open only for members.';
			} else {
				echo 'Registraton for this event is not available at this time.';
			}
		}
	 }
?>
	<p>Start: <?php echo $this->Time->format('g:i a',$event['Event']['start_time']); ?></p>

	<?php if ($event['Event']['end_time']) { ?>
		<p>End: <?php echo $this->Time->format('g:i a',$event['Event']['end_time']); ?></p>

	<?php } ?>
	<p>Location: <?php
	if ($event['Event']['location_id']) {
		echo $this->Html->link(
			$event['Location']['title'],
			array(
				'controller' => 'locations',
				'action' => 'view',
				$event['Location']['url_title']
			)
		);
	} else {
	 echo $event['Event']['place'];
	} ?></p>

<?php if ($event['Event']['max_attendees']) { ?>
	<p>Maximum Attendees: <?php echo $event['Event']['max_attendees']; ?></p>
<?php } ?>
	<p><?php echo $event['Event']['body']; ?></p>

<?php } else { ?>

	<p><?php echo $event['Event']['teaser']; ?></p>

	<?php echo $this->element('roadblock'); ?>
<?php } ?>
	</div>
</div>