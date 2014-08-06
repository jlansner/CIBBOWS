<div class="row">
	<div class="column column12">
<h1><?php echo $race['Race']['title']; ?></h1>
<h2>Registered Swimmers</h2>

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
 	<li class="active">Registered Swimmers</li>
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
 	<li>
 		<?php echo $this->Html->link(
			'Registered Volunteers',
			array(
				'controller' => 'volunteer_registrations',
				'action' => 'view',
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title']
			)
		); ?>
 	</li>

 </ul>
 <br class="clear" />

<?php if (count($race['RaceRegistration']) > 0) { ?>
	<?php if (count($race['ChildRace']) == 0) {  ?>

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
		<tbody>

		<?php foreach ($race['RaceRegistration'] as $raceRegistration): ?>
			<tr>
				<td>
					<?php echo $this->Html->link(
					$raceRegistration['first_name'] . ' ' . $raceRegistration['last_name'],
					array(
						'controller' => 'users',
						'action' => 'view',
						$raceRegistration['user_id']
					)
				); ?>
				</td>
				<td><?php echo h($raceRegistration['age']); ?></td>
				<td><?php echo $raceRegistration['Gender']['title']; ?></td>
				<td><?php echo $raceRegistration['AgeGroup']['title']; ?></td>
				<td>
					<?php if ($raceRegistration['approved'] == 1) { ?>
						<i class="fa fa-check edit" title="Approved"></i>
					<?php } else {
						if (($race['Race']['experience_id'] !== null) && (($raceRegistration['result_id'] == null) && ($raceRegistration['qualifying_race_id'] == null) && ($raceRegistration['qualifying_swim_id'] == null))) { ?>
							<i class="fa fa-clock-o orange" title="Qualfying Swim Needed"></i>
						<?php }	else { ?>
              <i class="fa fa-check edit" title="Registration Approved"></i>
            <?php }
					} ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php } else { ?>

		<?php foreach ($race['ChildRace'] as $childRace) { ?>
			<h3><?php echo $childRace['title']; ?></h3>

			<?php // if (count($childRace['RaceRegistration']) > 0) { ?>
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
		<tbody>

		<?php foreach ($race['RaceRegistration'] as $raceRegistration): ?>
			<?php if ($raceRegistration['child_race_id'] == $childRace['id']) { ?>
			<tr>
				<td>
					<?php echo $this->Html->link($raceRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $raceRegistration['User']['id'])); ?>
				</td>
				<td><?php echo h($raceRegistration['age']); ?></td>
				<td><?php echo $raceRegistration['Gender']['title']; ?></td>
				<td><?php echo $raceRegistration['AgeGroup']['title']; ?></td>
				<td>
					<?php if ($raceRegistration['approved'] == 1) { ?>
						<i class="fa fa-check edit" title="Approved"></i>
					<?php } else {
						if (($raceRegistration['no_qualifier']) || (($raceRegistration['result_id'] == null) && ($raceRegistration['qualifying_race_id'] == null) && ($raceRegistration['qualifying_swim_id'] == null))) { ?>
							<i class="fa fa-clock-o orange" title="Qualfying Swim Needed"></i>
						<?php }
						
					} ?>
				</td>
			</tr>
			<?php } ?>
		<?php endforeach; ?>
		</tbody>
	</table>
<?php // }
		}
	}
}

?>
	</div>
</div>