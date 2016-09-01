<div class="row">
	<div class="column column12">
<h1><?php echo $race['Race']['title']; ?></h1>
<h2>Registered Swimmers</h2>


<?php 
 	echo $this->element(
 		'race_menu',
 		array(
			'race' => $race
		)
	);


if ($admin) { ?>
	<p>
	<?php echo $this->Html->link(
		'Download swimmer list in Excel',
		array(
			'controller' => 'race_registrations',
			'action' => 'swimmer_list',
			$race['Race']['id']
		)
	); ?>
	</p>
	
	<p>
<?php echo $this->Html->link(
		'Assign cap numbers',
		array(
			'controller' => 'race_registrations',
			'action' => 'assign_cap_numbers',
			$race['Race']['id']
		)
	); ?>		
	</p>
	
<?php } ?>
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
				<?php if ($admin) { ?>
					<th>Cap Number</th>
				<?php } ?>
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
							<?php if ($admin) {
							echo $this->Form->postLink(
								'Approve',
								array(
									'admin' => false,
									'action' => 'approve',
									$raceRegistration['id']
								)
							);	
							 } ?>
						<?php }	else { ?>
              <i class="fa fa-check edit" title="Registration Approved"></i>
            <?php }
					} ?>
				</td>
			<?php if ($admin) { ?>
				<td><?php echo $raceRegistration['race_number']; ?></td>
			<?php } ?>
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
				<?php if ($admin) { ?>
					<th>Cap Number</th>
				<?php } ?>
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
			<?php if ($admin) { ?>
				<td><?php echo $raceRegistration['race_number']; ?></td>
			<?php } ?>
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