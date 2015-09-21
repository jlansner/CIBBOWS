<div class="row">
	<div class="column column12">
	<h1>Race Registrations</h1>
	<table class="zebraTable">
	<tr>
			<th>ID</th>
			<th>User ID</th>
			<th>Race ID</th>
			<th>Name</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Age Group</th>
			<th>Qualifying Swim</th>
			<th>Qualifying Race</th>
			<th>Result</th>
			<th>Payment</th>
			<th>Approved</th>
			<th>Shirt Size</th>
			<th>Created</th>
			<th>Modified</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($raceRegistrations as $raceRegistration): ?>
	<tr>
		<td><?php echo h($raceRegistration['RaceRegistration']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $raceRegistration['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['Race']['title'], array('controller' => 'races', 'action' => 'view', $raceRegistration['Race']['id'])); ?>
		</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['first_name']); ?> <?php echo h($raceRegistration['RaceRegistration']['last_name']); ?></td>
		<td><?php echo h($raceRegistration['RaceRegistration']['age']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['Gender']['title'], array('controller' => 'genders', 'action' => 'view', $raceRegistration['Gender']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['AgeGroup']['title'], array('controller' => 'age_groups', 'action' => 'view', $raceRegistration['AgeGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['QualifyingSwim']['id'], array('controller' => 'qualifying_swims', 'action' => 'view', $raceRegistration['QualifyingSwim']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['QualifyingRace']['title'], array('controller' => 'qualifying_races', 'action' => 'view', $raceRegistration['QualifyingRace']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['Result']['id'], array('controller' => 'results', 'action' => 'view', $raceRegistration['Result']['id'])); ?>
		</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['payment']); ?>&nbsp;</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['approved']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['ShirtSize']['title'], array('controller' => 'shirt_sizes', 'action' => 'view', $raceRegistration['ShirtSize']['id'])); ?>
		</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['created']); ?>&nbsp;</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(
				'View',
				array(
					'admin' => false,
					'action' => 'view',
					$raceRegistration['RaceRegistration']['id']
				)
			); ?>
			<?php echo $this->Html->link(
				'Edit',
				 array(
					'admin' => false,'action' => 'edit',
					$raceRegistration['RaceRegistration']['id']
				)
			); ?>
			<?php echo $this->Form->postLink(__('Delete'), array(
				'admin' => false,'action' => 'delete', $raceRegistration['RaceRegistration']['id']), null, __('Are you sure you want to delete # %s?', $raceRegistration['RaceRegistration']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

</div>