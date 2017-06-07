<div class="row">
	<div class="column column12">
<h1><?php echo $clinic['Clinic']['title']; ?></h1>
<h2>Registered Participants</h2>

 <ul class="raceNav">
 	<li>
  		<?php echo $this->Html->link(
			'Overview',
			array(
				'controller' => 'clinics',
				'action' => 'view',
				'year' => substr($clinic['Clinic']['date'],0,4),
				'month' => substr($clinic['Clinic']['date'],5,2),
				'day' => substr($clinic['Clinic']['date'],8,2),
				'url_title' => $clinic['Clinic']['url_title']
			)
		); ?>
 	</li>
 	<li class="active">Registered Participants</li>
 </ul>
 <br class="clear" />

<?php if (count($clinic['ClinicRegistration']) > 0) { ?>

		<table class="zebraTable">
		<thead>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Sex</th>
					<th>Status</th>
				<?php if ($admin) { ?>
					<th>Email Address</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>

		<?php foreach ($clinic['ClinicRegistration'] as $clinicRegistration): ?>
			<tr>
				<td>
					<?php echo $this->Html->link(
					$clinicRegistration['first_name'] . ' ' . $clinicRegistration['last_name'],
					array(
						'controller' => 'users',
						'action' => 'view',
						$clinicRegistration['user_id']
					)
				); ?>
				</td>
				<td><?php echo $clinicRegistration['age']; ?></td>
				<td><?php echo $clinicRegistration['Gender']['title']; ?></td>
				<td>
					<?php if ($clinicRegistration['approved'] == 1) { ?>
						<i class="fa fa-check edit" title="Approved"></i>
        		    <?php } ?>
				</td>
					<?php if ($admin) { ?>
						<td><?php echo $clinicRegistration['User']['email']; ?></td>
					<?php } ?>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php } ?>
	</div>
</div>