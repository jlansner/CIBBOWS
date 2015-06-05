<div class="row">
	<div class="column column12">
		
<h2><?php echo h($clinic['Clinic']['title']); ?></h2>

	<p>Date: <?php echo $this->Time->format('F j, Y',$clinic['Clinic']['date']); ?></p>

	<?php if ($userMembershipLevel >= $clinic['Clinic']['membership_level_id']) { ?>

 <ul class="raceNav">
 	<li class="active">Overview</li>
 	<li>
 		<?php echo $this->Html->link(
			'Registered Swimmers',
			array(
				'controller' => 'clinic_registrations',
				'action' => 'view',
				'year' => substr($clinic['Clinic']['date'],0,4),
				'month' => substr($clinic['Clinic']['date'],5,2),
				'day' => substr($clinic['Clinic']['date'],8,2),
				'url_title' => $clinic['Clinic']['url_title']
			)
		); ?>
 	</li>
</ul>
<br class="clear" />
<p>
	<!--
		<?php var_export($clinic); ?>
	-->
<?php
	if ($clinic['Clinic']['registration_required']) {
		if (strtotime('now') > strtotime($clinic['Clinic']['date'])) {

		} else if ($reg) {
			echo 'You are already registered for this clinic.';
			if (!$clinic['Clinic']['fee']) {
				echo '<br />' . $this->Form->postLink(
					'Delete your registration',
					array(
						'controller' => 'clinic_registrations',
						'action' => 'delete_registration',
						$reg['ClinicRegistration']['id']
					),
					null,
					'Are you sure you want to delete your registration?'
				);
			}
		} else {
			echo $this->Html->link(
				'Register',
				array(
					'controller' => 'clinic_registrations',
					'action' => 'register',
					$clinic['Clinic']['id']
				)
			);
		}
	}
?>
</p>

		<p>Start Time: <?php echo $this->Time->format('g:i a', $clinic['Clinic']['start_time']); ?></p>

		<p>End Time: <?php echo $this->Time->format('g:i a', $clinic['Clinic']['end_time']); ?></p>

		<p>Location: <?php echo $this->Html->link($clinic['Location']['title'], array('controller' => 'locations', 'action' => 'view', $clinic['Location']['id'])); ?></p>

		<p>Coach: <?php echo $this->Html->link(
			$clinic['User']['name'],
			array(
				'controller' => 'users',
				'action' => 'view',
				$clinic['User']['id']
			)
		); ?></p>

		<p>Max Swimmers: <?php echo h($clinic['Clinic']['max_swimmers']); ?></p>

		<p><?php echo $clinic['Clinic']['body']; ?></p>

	<?php } else { ?>
		<p><?php echo $clinic['Clinic']['teaser']; ?></p>

		<?php echo $this->element('roadblock'); ?>
	<?php } ?>
	</div>
</div>
