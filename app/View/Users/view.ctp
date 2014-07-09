<div class="row">
	<div class="column column12">

<h1>		<?php echo h($user['User']['first_name']); ?>
		<?php echo h($user['User']['middle_name']); ?>
		<?php echo h($user['User']['last_name']); ?></h1>

		Gender: <?php echo h($user['Gender']['title']); ?><br />
		
<?php if ($admin) { ?>
		Date of Birth: <?php echo $this->Time->format('F j, Y',$user['User']['dob']); ?><br />
		Job Title:  <?php echo h($user['User']['job_title']); ?><br />
		T-Shirt Size: <?php echo h($user['ShirtSize']['title']); ?>
<?php } ?>


<?php if ($admin) { ?>
<div class="related">

	<?php if (!empty($user['Address'])): ?>
		<h2>Address</h2>

	<?php	foreach ($user['Address'] as $address): ?>
			<p>
				<?php if ($address['line1']) { echo $address['line1'] . '<br />'; } ?>
				<?php if ($address['line2']) { echo $address['line2'] . '<br />'; } ?>
				<?php if ($address['line3']) { echo $address['line3'] . '<br />'; } ?>
				<?php echo $address['city'] . ', ' . $address['county_province'] . ' ' . $address['postcode']; ?><br />
				<?php if ($address['country']) { echo $address['country'] . '<br />'; } ?>
				<?php if ($address['other_details']) { echo $address['other_details'] . '<br />'; } ?>
				<?php 
				if (preg_match('/[0-9]{10}/',$address['phone'])) {
						echo '(' . substr($address['phone'],0,3) . ') ' . substr($address['phone'],3,3) . '-' . substr($address['phone'],6);
					} else {
						echo $address['phone'];
					}?>
			</p>
		<?php endforeach;
	endif; ?>
	
</div>
<?php } ?>

<?php if ($admin) { ?>
	<div id="qualifying">
<h3>Qualifying Races</h3>
<?php if (!empty($user['QualifyingRace'])): ?>
	<table class="zebraTable">
		<thead>
	<tr>
		<th>Title</th>
		<th>Date</th>
		<th>Distance</th>
		<th>Time</th>
		<th>Status</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($user['QualifyingRace'] as $qualifyingRace): ?>
		<tr>
			<td><?php echo $this->Html->link($qualifyingRace['title'], $qualifyingRace['url'], array('target' => '_blank')); ?></td>
			<td><?php echo $this->Time->format('n/j/y', $qualifyingRace['date']); ?></td>
			<td><?php echo ($qualifyingRace['distance_number'] + 0) . $qualifyingRace['Distance']['abbreviation']; ?></td>
			<td><?php echo ltrim($qualifyingRace['time'],'0:'); ?></td>
			<td><?php 
			if ($qualifyingRace['approved']) { ?>
				<i class="fa fa-check edit" title="Approved"></i></td>
				<td></td>
			<?php } else { ?>
				<i class="fa fa-circle-o delete" title="Pending"></i>
			</td>
			<td>
			<?php
			echo $this->Html->link(
				'<i class="fa fa-check edit"></i>',
				array(
					'controller' => 'qualifying_races',
					'action' => 'approve',
					$qualifyingRace['id']
				),
				array(
					'escape' => FALSE,
					'title' => 'Approve'
				)
			);
			echo $this->Html->link(
				'<i class="fa fa-pencil edit"></i>',
				array(
					'controller' => 'qualifying_races',
					'action' => 'edit',
					$qualifyingRace['id']
				),
				array(
					'escape' => FALSE,
					'title' => 'Edit'
				)
			);
			
			echo $this->Form->postLink(
				'<i class="fa fa-times delete"></i>',
				array(
					'controller' => 'qualifying_races',
					'action' => 'delete',
					$qualifyingRace['id']
				),
				array(
					'escape' => FALSE,
					'title' => 'Delete'
				),
				__('Are you sure you want to delete ' . $qualifyingRace['title'] . ' for ' . $user['User']['name'], $qualifyingRace['id'])
			);
	 ?>
			</td>
						<?php } ?>	
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>
</div>
<?php } ?>
</div>
</div>