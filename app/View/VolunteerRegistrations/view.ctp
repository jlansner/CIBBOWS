<div class="row">
	<div class="column column12">
<h1><?php echo $race['Race']['title']; ?></h1>
<h2>Registered Volunteers</h2>

 <ul class="raceNav">
 	<li>
  		<?php echo $this->Html->link(
			'Overview',
			array(
				'controller' => 'races',
				'action' => 'view',
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title']
			)
		); ?>
 	</li>
 	<li> 		<?php echo $this->Html->link(
			'Registered Swimmers',
			array(
				'controller' => 'race_registrations',
				'action' => 'view',
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title']
			)
		); ?>
	</li>
 	 <li>
 		<?php echo $this->Html->link(
			'Results',
			array(
				'controller' => 'results',
				'action' => 'view',
				'url_title' => $race['Series']['url_title']
			)
		); ?>
 	</li>
 	<li class="active">
 		Registered Volunteers
 	</li>
 </ul>
 <br class="clear" />

<?php if (count($race['VolunteerRegistration']) > 0) { ?>

		<table class="zebraTable">
		<thead>
				<tr>
					<th>Name</th>
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
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php } else { ?>
	<p>There are no volunteers for this race.</p>
<?php } ?>
	</div>
</div>