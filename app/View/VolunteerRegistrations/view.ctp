<div class="row">
	<div class="column column12">
<h1><?php echo $race['Race']['title']; ?></h1>
<h2>Registered Volunteers</h2>


<?php

 	echo $this->element(
 		'race_menu',
 		array(
			'race' => $race
		)
	);

 if (count($race['VolunteerRegistration']) > 0) { ?>

		<table class="zebraTable">
		<thead>
				<tr>
					<th>Name</th>
					<?php if ($admin) { ?>
						<th>Email Address</th>
					 	<th>Notes</th>
					<?php } ?>
			</tr>
		</thead>
		<tbody>

		<?php foreach ($race['VolunteerRegistration'] as $volunteerRegistration): ?>
			<tr>
				<td>
					<?php echo $this->Html->link(
					$volunteerRegistration['first_name'] . ' ' . $volunteerRegistration['last_name'],
					array(
						'controller' => 'users',
						'action' => 'view',
						$volunteerRegistration['user_id']
					)
				); ?>
				</td>
					<?php if ($admin) { ?>
						<td><?php echo $volunteerRegistration['User']['email']; ?></td>
					 	<td><?php echo $volunteerRegistration['body']; ?></td>
					<?php } ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php } else { ?>
	<p>There are no volunteers for this race.</p>
<?php } ?>
	</div>
</div>