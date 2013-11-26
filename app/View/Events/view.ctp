<h2><?php echo h($event['Event']['title']); ?></h2>
<p>Date: <?php echo $this->Time->format('F j, Y',$event['Event']['date']); ?></p>

<?php if ($userMembershipLevel >= $event['Event']['membership_level_id']) { ?>

	<p>Start: <?php echo $this->Time->format('g:i a',$event['Event']['start_time']); ?></p>

	<?php if ($event['Event']['end_time']) { ?>
		<p>End: <?php echo $this->Time->format('g:i a',$event['Event']['end_time']); ?></p>

	<?php } ?>
	<p>Location: <?php echo h($event['Event']['location']); ?>

	<p><?php echo h($event['Event']['body']); ?></p>

<?php } else { ?>

	<p><?php echo $event['Event']['teaser']; ?></p>

	<?php echo $this->element('roadblock'); ?>
<?php } ?>
</div>

