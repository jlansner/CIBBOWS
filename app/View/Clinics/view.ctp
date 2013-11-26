<h2><?php echo h($clinic['Clinic']['title']); ?></h2>

	<p>Date: <?php echo $this->Time->format('F j, Y',$clinic['Clinic']['date']); ?></p>

	<?php if ($userMembershipLevel >= $clinic['Clinic']['membership_level_id']) { ?>

		<p>Start Time: <?php echo $this->Time->format('g:i a', $clinic['Clinic']['start_time']); ?></p>

		<p>End Time: <?php echo $this->Time->format('g:i a', $clinic['Clinic']['end_time']); ?></p>

		<p>Location: <?php echo $this->Html->link($clinic['Location']['title'], array('controller' => 'locations', 'action' => 'view', $clinic['Location']['id'])); ?></p>

		<p>Coach: <?php echo $this->Html->link($clinic['User']['name'], array('controller' => 'users', 'action' => 'view', $clinic['User']['id'])); ?></p>

		<p>Max Swimmers: <?php echo h($clinic['Clinic']['max_swimmers']); ?></p>

		<p><?php echo $clinic['Clinic']['body']; ?></p>

	<?php } else { ?>
		<p><?php echo $clinic['Clinic']['teaser']; ?></p>

		<?php echo $this->element('roadblock'); ?>
	<?php } ?>
