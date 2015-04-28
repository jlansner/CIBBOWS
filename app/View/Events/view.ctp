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
	if ($race['CurrentNonMemberEventFee']['price']) {
		$regOpen = true;
	} 
	
	if ($race['CurrentMemberEventFee']['price']) {
		$memRegOpen = true;
 	}

	 if ($event['Event']['registration_required']) {
	 	echo $this->element(
	 		'event_menu',
	 		array(
				'event' => $event
			)
		);
		
		if (($regOpen) || (($memRegOpen) && ($userMembershipLevel == 1))) {
			echo $this->Html->link(
				'Register',
				array(
					'controller' => 'event_registrations',
					'action' => 'register',
					$event['Event']['id']
				)
			);
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

	<p><?php echo $event['Event']['body']; ?></p>

<?php } else { ?>

	<p><?php echo $event['Event']['teaser']; ?></p>

	<?php echo $this->element('roadblock'); ?>
<?php } ?>
	</div>
</div>