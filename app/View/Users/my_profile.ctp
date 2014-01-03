<h1>My Profile</h1>

<div id="profileTabs">
	<ul>
		<li><a href="#general">General Information</a></li>
		<li><a href="#qualifying">Qualifying Swims</a></li>
		<li><a href="#results">Results</a></li>
		<li><a href="#registrations">Registrations</a></li>
	</ul>
	
	<div id="general">
	<h2 class="inline-block">Personal Information</h2> 
	<?php echo $this->Html->Link('<i class="fa fa-pencil edit"></i>', array('controller' => 'users', 'action' => 'edit_profile'), array('escape' => FALSE)); ?>
	
	
	<p>
		<?php echo h($user['User']['first_name']); ?>
		<?php echo h($user['User']['middle_name']); ?>
		<?php echo h($user['User']['last_name']); ?><br />
		Gender: <?php echo h($user['Gender']['title']); ?><br />
		Date of Birth: <?php echo $this->Time->format('F j, Y',$user['User']['dob']); ?><br />
		Job Title:  <?php echo h($user['User']['job_title']); ?><br />
		T-Shirt Size: <?php echo h($user['ShirtSize']['title']); ?>
	</p>
	
	<?php if (!empty($user['Membership'])) {
		$i = 0;
		foreach ($user['Membership'] as $membership) {
			if ($membership['end_date'] > date('Y-m-d')) { ?>
				<p>
					Your membership will expire on <?php echo $this->Time->format('F j, Y', $membership['end_date']); ?>.
					<?php if ($membership['end_date'] < date('Y-m-d', strtotime('+2 months'))) {
						echo $this->html->Link('Renew your membership', array('controller' => 'memberships', 'action' => 'join'));
					} ?>
				</p>
			<?php } else { ?>
				<p>Your membership has expired.
				<?php echo $this->html->Link('Reactive your membership', array('controller' => 'memberships', 'action' => 'join')); ?>
				</p>
			<?php }
		}
	} else { 
		echo '<p>' . $this->html->Link('Become a member', array('controller' => 'memberships', 'action' => 'join')) . '</p>';	
	}
	?>
	
	<h2 class="inline-block">Address</h2>
	<?php echo $this->Html->Link('<i class="fa fa-pencil edit"></i>', array('controller' => 'addresses', 'action' => 'edit_address'), array('escape' => FALSE)); ?>
					
	<?php if (!empty($user['Address'])):
		foreach ($user['Address'] as $address): ?>
			<p>
				<?php if ($address['line1']) { echo $address['line1'] . '<br />'; } ?>
				<?php if ($address['line2']) { echo $address['line2'] . '<br />'; } ?>
				<?php if ($address['line3']) { echo $address['line3'] . '<br />'; } ?>
				<?php echo $address['city'] . ', ' . $address['county_province'] . ' ' . $address['postcode']; ?><br />
				<?php if ($address['country']) { echo $address['country'] . '<br />'; } ?>
				<?php if ($address['other_details']) { echo $address['other_details'] . '<br />'; } ?>
				<?php echo $address['phone']; ?>
			</p>
		<?php endforeach;
	endif; ?>
	
	
	<h2>Emergency Contacts</h2>
	
		<?php if (!empty($user['EmergencyContact'])):
			$i = 0;
			?>
			<table class="zebraTable">
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone Number</th>
						<th>Email Address</th>
						<th>Relationship</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($user['EmergencyContact'] as $emergencyContact): ?>
				<tr>
					<td><?php echo $emergencyContact['name']; ?></td>
					<td><?php echo $emergencyContact['phone']; ?></td>
					<td><?php echo $emergencyContact['email']; ?></td>
					<td><?php echo $emergencyContact['relationship']; ?></td>
					<td><?php echo $this->html->Link(
					'<i class="fa fa-pencil edit"></i>',
					array(
						'controller' => 'emergency_contacts',
						'action' => 'edit_contact',
						$emergencyContact['id']
					),
					array(
						'escape' => FALSE
					)
					); ?>
					<?php if (count($user['EmergencyContact']) > 1) {
	echo $this->Form->postLink(
		'<i class="fa fa-times delete"></i>',
		array(
			'controller' => 'emergency_contacts',
			'action' => 'delete_contact',
			$emergencyContact['id']
		),
		array(
			'escape' => FALSE
		),
		__('Are you sure you want to delete ' . $emergencyContact['name'] . ' as an emergency contact?', $emergencyContact['id'])
	); ?>
						</td>
	
					<?php } ?>
				</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
	<?php endif; ?>
	
	<p>
		<?php echo $this->html->Link('<i class="fa fa-plus add"></i> Add Emergency Contact', array('controller' => 'emergency_contacts', 'action' => 'add_contact'), array('escape' => FALSE)); ?>
	</p>
	
	<?php /*
	<h3>Linked Profiles</h3>
	
	<?php if (!empty($user['ExternalProfile'])):
		$i = 0; ?>
		<p>
		<?php foreach ($user['ExternalProfile'] as $externalProfile): ?>
			 <a href="<?php echo $externalProfile['url']; ?>"><?php echo $externalProfile['title']; ?></a>
			 
			 <?php if ($externalProfile['approved'] == 1) { ?>
			 	&#x2713;
			 <?php } ?>
			 <br />
		<?php endforeach; ?>
		</p>
	<?php endif; ?>
	
	<p>
		<a href="#">Link additional profile</a>
	</p>
	*/ ?>
	</div>

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
				<?php echo $this->html->Link(
					'<i class="fa fa-pencil edit"></i>',
					array(
						'controller' => 'qualifying_races',
						'action' => 'edit_race',
						$qualifyingRace['id']
					),
					array(
						'escape' => FALSE
					)
				);
					echo $this->Form->postLink(
		'<i class="fa fa-times delete"></i>',
		array(
			'controller' => 'qualifying_races',
			'action' => 'delete_race',
			$qualifyingRace['id']
		),
		array(
			'escape' => FALSE
		),
		__('Are you sure you want to delete ' . $qualifyingRace['title'] . ' from your qualifying races?', $qualifyingRace['id'])
	); ?>
			</td>
						<?php } ?>	
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<p>
		<?php echo $this->html->Link('<i class="fa fa-plus add"></i> Add Qualifying Race', array('controller' => 'qualifying_races', 'action' => 'add_race'), array('escape' => FALSE)); ?>
	</p>

<?php /*
<h3>Qualifying Swims</h3>
<?php if (!empty($user['QualifyingSwim'])): ?>
	<table class="zebraTable">
		<thead>
	<tr>
		<th>Date</th>
		<th>Distance</th>
		<th>Approved</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($user['QualifyingSwim'] as $qualifyingSwim): ?>
		<tr>
			<td><?php echo $qualifyingSwim['date']; ?></td>
			<td><?php echo $qualifyingSwim['distance'] . $qualifyingSwim['distance_id']; ?></td>
			<td><?php echo $qualifyingSwim['approved']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

<p>
	<a href="#">Add Qualifying Swim</a>
</p> */ ?>
</div>

<div id="results">

<h3>Results</h3>
<?php if (!empty($user['Result'])): ?>
	<table class="zebraTable">
		<thead>
	<tr>
		<th>Race</th>
		<th>Date</th>
		<th>Distance</th>
		<th>Time</th>
		<th>Place</th>
		<th>Age</th>
		<th>Age Group</th>
		<th>Age Place</th>		
	</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($user['Result'] as $result): ?>
		<tr>
			<td><?php echo $this->Html->link($result['Race']['title'], array('controller' => 'races', 'action' => 'view', substr($result['Race']['date'],0,4), $result['Race']['url_title'])); ?></td>
			<td><?php echo $this->Time->format('n/j/y',$result['Race']['date']); ?></td>
			<td><?php echo ($result['Race']['distance_number'] + 0) . $result['Race']['Distance']['abbreviation']; ?></td>
			<td><?php echo ltrim($result['time'],'0:'); ?></td>
			<td><?php echo $result['place']; ?></td>
			<td><?php echo $result['age']; ?></td>
			<td><?php echo $result['AgeGroup']['title']; ?></td>
			<td><?php echo $result['age_place']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>
</div>

<div id="registrations">
<h3>Registrations</h3>

	<h4>Race Registrations</h4>
	<?php if (!empty($user['RaceRegistration'])) { ?>
	<table class="zebraTable">
		<thead>
	<tr>
		<th>Race</th>
		<th>Date</th>
		<th>Distance</th>
		<th>Status</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($user['RaceRegistration'] as $raceRegistration): ?>
		<tr>
			<td><?php echo $raceRegistration['Race']['title']; ?></td>
			<td><?php echo $this->Time->format('n/j/y',$raceRegistration['Race']['date']); ?></td>
			<td><?php echo ($raceRegistration['Race']['distance_number'] + 0) . $raceRegistration['Race']['Distance']['abbreviation']; ?></td>
			<td>
			<?php if ($raceRegistration['approved']) { ?>
				<i class="fa fa-check edit" title="Approved"></i>
			<?php } else { 
				if (($raceRegistration['no_qualifier']) || (($raceRegistration['result_id'] == null) && ($raceRegistration['qualifying_race_id'] == null) && ($raceRegistration['qualifying_swim_id'] == null))) { 
					echo $this->html->Link(
						'<i class="fa fa-clock-o orange" title="Qualfying Swim Needed"></i>',
						array(
							'controller' => 'qualifying_races',
							'action' => 'add_race'
						),
						array('escape' => FALSE)
					);
				 }
			
				if (!$raceRegistration['has_address']) {
					echo $this->Html->Link(
						'<i class="fa fa-home orange" title="Address Needed"></i>',
						array(
							'controller' => 'addresses',
							'action' => 'edit_address'
						),
						array(
							'escape' => FALSE)
						);
				}
				
				if (!$raceRegistration['has_emergency_contact']) {
					echo $this->html->Link(
						'<i class="fa fa-user-md orange" title="Emergency Contact Needed"></i>',
						array(
							'controller' => 'emergency_contacts',
							'action' => 'add_contact'
						),
						array(
							'escape' => FALSE)
						);
					
				}  	
			} 
			  ?>
			
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php } else { ?>
	<p>You are not registered for any races.</p>
<?php } ?>

<h4>Clinic Registrations</h4>
	<?php if (!empty($user['ClinicRegistration'])) { ?>
	<table class="zebraTable">
		<thead>
	<tr>
		<th>Clinic</th>
		<th>Date</th>
		<th>Status</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($user['ClinicRegistration'] as $clinicRegistration): ?>
		<tr>
			<td><?php echo $this->Html->link($clinicRegistration['Clinic']['title'], array('controller' => 'clinics', 'action' => 'view', $clinicRegistration['Clinic']['id'])); ?></td>
			<td><?php echo $this->Time->format('n/j/y',$clinicRegistration['Clinic']['date']); ?></td>
			<td><?php if ($clinicRegistration['approved']) { ?>
				<i class="fa fa-check edit" title="Approved"></i>
			<?php } ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php } else { ?>
	<p>You are not registered for any clinics.</p>
<?php } ?>

	<h4>Test Swim Registrations</h4>
	<?php if (!empty($user['TestSwimRegistration'])) { ?>
	<table class="zebraTable">
		<thead>
	<tr>
		<th>Test Swim</th>
		<th>Date</th>
		<th>Distnace</th>
		<th>Status</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($user['TestSwimRegistration'] as $testSwimRegistration): ?>
		<tr>
			<td><?php echo $testSwimRegistration['test_swim_id']; ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php } else { ?>
	<p>You are not registered for any test swims.</p>
<?php } ?>


	<h4>Volunteer Registrations</h3>
	<?php if (!empty($user['VolunteerRegistration'])) { ?>
	<table class="zebraTable">
		<thead>
	<tr>
		<th>Event</th>
		<th>Date</th>
		<th>Assignment</th>
		<th>Status</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$i = 0;
		foreach ($user['VolunteerRegistration'] as $volunteerRegistration): ?>
		<tr>
			<td><?php echo $volunteerRegistration['volunteer_task_id']; ?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php } else { ?>
	<p>You are not registered for any volunteer assignments.</p>
<?php } ?>
</div>
</div>