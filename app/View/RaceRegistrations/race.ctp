<div class="raceRegistrations index">
	<h1><?php echo $race['Race']['title']; ?></h1>
	<h2>Registered Swimmers</h2>
	<table class="zebraTable">
	<thead>
			<tr>
			<th>Name</th>
			<th>Age</th>
			<th>Sex</th>
			<th>Age Group</th>
			<th>Status</th>
	</tr>
	</thead>

	<?php foreach ($raceRegistrations as $raceRegistration): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($raceRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $raceRegistration['User']['id'])); ?>
		</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['age']); ?></td>
		<td><?php echo $raceRegistration['Gender']['title']; ?></td>
		<td><?php echo $raceRegistration['AgeGroup']['title']; ?></td>
		<td>
			<?php if ($raceRegistration['RaceRegistration']['approved'] == 1) { ?>
				<i class="fa fa-check edit" title="Approved"></i>
			<?php } else {
				if (($raceRegistration['RaceRegistration']['result_id'] == null) || ($raceRegistration['RaceRegistration']['qualifying_race_id'] == null) || ($raceRegistration['RaceRegistration']['qualifying_swim_id'] == null)) { ?>
					<i class="fa fa-clock-o orange" title="Qualfying Swim Needed"></i>
				<?php }
				
				if (!$raceRegistration['RaceRegistration']['has_address']) { ?>
					<i class="fa fa-home orange" title="Address Needed"></i>
				<?php }
				
				if (!$raceRegistration['RaceRegistration']['has_emergency_contact']) { ?>
					<i class="fa fa-user-md orange" title="Emergency Contact Needed"></i>
				<?php }
			} ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
