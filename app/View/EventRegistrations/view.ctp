<div class="row">
	<div class="column column12">
<h1><?php echo $event['Event']['title']; ?></h1>
<h2>Registered Attendees</h2>


<?php 
 	echo $this->element(
 		'event_menu',
 		array(
			'event' => $event
		)
	);


 if (count($event['EventRegistration']) > 0) { ?>

		<table class="zebraTable">
		<thead>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Sex</th>
			</tr>
		</thead>
		<tbody>

		<?php foreach ($event['EventRegistration'] as $eventRegistration): ?>
			<tr>
				<td>
					<?php echo $this->Html->link(
					$eventRegistration['first_name'] . ' ' . $eventRegistration['last_name'],
					array(
						'controller' => 'users',
						'action' => 'view',
						$eventRegistration['user_id']
					)
				); ?>
				</td>
				<td><?php echo h($eventRegistration['age']); ?></td>
				<td><?php echo $eventRegistration['Gender']['title']; ?></td>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php } ?>
	</div>
</div>