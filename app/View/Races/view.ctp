<div class="row>">
	<div class="column column12">

<h1><?php echo h($race['Race']['title']); ?></h1>
<h2>Overview</h2>
<?php // echo h($race['Race']['logo']); ?>

<p>
<?php
echo $this -> Time -> format('F j, Y', $race['Race']['date']);

if (($race['Race']['end_date']) && ($race['Race']['date'] != $race['Race']['end_date'])) {
	echo ' &ndash; ' . $this -> Time -> format('F j, Y', $race['Race']['end_date']);
}
?>
</p>

<?php

if ($userMembershipLevel >= $race['Race']['membership_level_id']) {

	$regOpen = false;
	$memRegOpen = false;
	if ($race['CurrentNonMemberRaceFee']['price']) {
		$regOpen = true;
	} 
	
	if ($race['CurrentMemberRaceFee']['price']) {
		$memRegOpen = true;
 	}
 
 	echo $this->element(
 		'race_menu',
 		array(
			'race' => $race
		)
	);
 ?>
 
<p>
<?php

	if (strtotime('now') > strtotime($race['Race']['end_date'])) {

	} else if (trim($race['Race']['registration_link']) !== "") {
		echo '<a href="' . $race['Race']['registration_link'] . '" target="_blank">Register as a swimmer</a>';
	} else if ($totalReg >= $race['Race']['max_swimmers']) {
		echo 'Registration for this race is full.';
	} else if ($reg) {
		if ($race['Race']['exclusive']) {

		} else {
			echo 'You are already registered as a swimmer for this race.';
		}
	} else {
		if (($regOpen) || (($memRegOpen) && ($userMembershipLevel == 1))) {
			if ($race['Race']['registration_link']) {
				echo $this->Html->link(
					'Register as a Swimmer',
					$race['Race']['registration_link'],
					array(
						'target' => '_blank'
					)
				);
			} else {
				echo $this->Html->link(
					'Register',
					array(
						'controller' => 'race_registrations',
						'action' => 'register',
						$race['Race']['id']
					)
				);
			}
		} else if ($memRegOpen) {
			echo 'Registration is currently open only for members.';
		} else {
			echo 'Registraton for this race is not available at this time.';
		}
	}

?>
</p>

<p>
<?php 
if ($race['Race']['registration_link'] == "") {

	if (strtotime('now') > strtotime($race['Race']['end_date'])) {

	} else if ($volReg) {
		echo 'You are already registered as a volunteer.</p>
		
		<p>';

		echo $this->Html->link(
			'Register for additional tasks',
			array(
				'controller' => 'volunteer_registrations',
				'action' => 'register',
				$race['Race']['id']
			)
		);


	} else {
		echo $this->Html->link(
			'Register as a Volunteer',
			array(
				'controller' => 'volunteer_registrations',
				'action' => 'register',
				$race['Race']['id']
			)
		);
	}
}
	?>
</p>

	<?php 
	if ((strtotime('now') > strtotime($race['Race']['end_date'])) && (trim($race['Race']['postrace_body']) !== "")) {
		echo $race['Race']['postrace_body'];
	} else {
		echo $race['Race']['body']; 
	}
	?>
	
	<table class="zebraTable">
		<tr>
			<th colspan="2">Race Details</th>
		</tr>

	<?php
	if ($this->Time->isFuture($race['Race']['date'])) {
		if (!(($race['Race']['end_date']) && ($race['Race']['date'] != $race['Race']['end_date']))) { ?>
		<tr>
			<td>Check-in Location:</td>
			<td><?php echo $race['CheckinLocation']['title'] . ' ' . $this->Html->link(
				'(map/details)',
				array(
					'controller' => 'locations',
					'action' => 'view',
					'url_title' => $race['CheckinLocation']['url_title']
				)
			); ?></td>
		</tr>

		<?php $different = false;
		 foreach ($race['ChildRace'] as $childrace) {
			if ($childrace['checkin_start_time'] !== $race['Race']['checkin_start_time']) {
		//		$different = true; restore when ready
			}
		} 
		
		if ($different) { ?>
			<tr>
				<td>Check-in Start Time:<?php
				foreach ($race['ChildRace'] as $childrace) {
					echo '<br />' . $childrace['title'];
				}
				
				?></td>
				<td><?php 
				foreach ($race['ChildRace'] as $childrace) {
					echo '<br />' . $this -> Time -> format('g:i a', $childrace['checkin_start_time']); 
				}?></td>
			</tr>
		<?php } else { ?>
			<tr>
				<td>Check-in Start Time:</td>
				<td><?php echo $this -> Time -> format('g:i a', $race['Race']['checkin_start_time']); ?></td
			</tr>
			
		<?php } ?>
		<tr>
			<td>Check-in End Time:</td>
			<td><?php echo $this -> Time -> format('g:i a', $race['Race']['checkin_end_time']); ?></td>
		</tr>

		<tr>
			<td>Start Location:</td>
			<td><?php echo $race['StartLocation']['title'] . ' ' . $this -> Html -> link(
				'(map/details)',
				array(
					'controller' => 'locations', 
					'action' => 'view', 
					'url_title' => $race['StartLocation']['url_title']
				)
			); ?></td>
		</tr>

		<?php $different = false;
		 foreach ($race['ChildRace'] as $childrace) {
			if ($childrace['start_time'] !== $race['Race']['start_time']) {
			//	$different = true; restore when ready
			}
		} 
		
		if ($different) { ?>
			<tr>
				<td>Start Time:<?php
				foreach ($race['ChildRace'] as $childrace) {
					echo '<br />' . $childrace['title'];
				}
				
				?></td>
				<td><?php 
				foreach ($race['ChildRace'] as $childrace) {
					echo '<br />' . $this -> Time -> format('g:i a', $childrace['start_time']); 
				}?></td>
			</tr>
		<?php } else { ?>
		<tr>
			<td>Start Time:</td>
			<td><?php echo $this -> Time -> format('g:i a', $race['Race']['start_time']); ?></td>
		</tr>

	<?php } ?>
		<tr>
			<td>End Location:</td>
			<td><?php echo $race['EndLocation']['title'] . ' ' . $this -> Html -> link(
				'(map/details)', 
				array(
					'controller' => 'locations', 
					'action' => 'view', 
					'url_title' => $race['EndLocation']['url_title']
				)
			); ?></td>
		</tr>

		<tr>
			<td>End Time:</td>
			<td><?php echo $this -> Time -> format('g:i a', $race['Race']['end_time']); ?></td>
		</tr>

		<tr>
			<td>Postrace Location:</td>
			<td><?php echo $race['PostraceLocation']['title'] . ' ' . $this -> Html -> link(
				'(map/details)', 
				array(
					'controller' => 'locations',
					'action' => 'view', 
					'url_title' => $race['PostraceLocation']['url_title']
				)
			); ?></td>
		</tr>

	<?php } 
	 } ?>



	<?php if (empty($race['ChildRace'])) { ?>

		<tr>
			<td>Distance:</td>
			<td><?php echo $race['Race']['distance_number'] + 0; ?>

			<?php if ($race['Race']['distance_number'] == 1) {
				echo $race['Distance']['name'];
			} else {
				echo $race['Distance']['plural'];
			} ?>
			</td>
		</tr>
	<? } ?>
	<?php if ($this->Time->isFuture($race['Race']['date'])) { ?>

	<tr>
		<td>Minimum Age:</td>
		<td><?php echo h($race['Race']['minimum_age']); ?></td>
	</tr>

	<tr>
		<td>Maximum Number of Swimmers:</td>
		<td><?php echo h($race['Race']['max_swimmers']); ?> (<?php echo $totalReg; ?> swimmers currently registered)</td>
	</tr>
	<?php if ((count($race['ChildRace']) == 0) && ((!empty($race['NonMemberRaceFee'])) || (!empty($race['MemberRaceFee'])))) { ?>

	<tr>
		<td>Fees</td>
		<td>

			<?php if (!empty($race['NonMemberRaceFee'])) { ?>
				<p><em>All Swimmers</em><br />
				<?php foreach ($race['NonMemberRaceFee'] as $raceFee) { ?>
					<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
					<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
					$<?php echo $raceFee['price']; ?>
					<br />
				<?php } ?>
				</p>
			<?php } ?>

			<?php if (!empty($race['MemberRaceFee'])) { ?>
				<p><em>Members</em><br />
				<?php foreach ($race['MemberRaceFee'] as $raceFee) { ?>
					<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
					<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
					$<?php echo $raceFee['price']; ?>
					<br />
				<?php } ?>
				</p>
			<?php } ?>
			
		</td>
		</tr>
<?php } ?>

	<?php if ($race['Race']['experience_id']) { ?>
			<tr>
				<td>Experience Requirement:</td>
				<td><?php echo $race['Experience']['name']; ?></td>
			</tr>
	<?php } ?>
<?php } ?>

<?php if ($race['Race']['course_map']) { ?>
	<tr>
		<td>Course Map:</td>
		<td><?php echo 
			$this->Html->image(
				'coursemaps/' . $race['Race']['course_map'],
				array(
					'alt' => $race['Race']['title'] . ' map'
				)
			); ?></td>
	</tr>
<?php } ?>
</table>		
	<?php if (empty($race['ChildRace'])) { ?>

		<?php } else { ?>


<div class="related">
	<h3>Sections</h3>
	
	<div id="raceTabs">
		<ul>
			<?php foreach ($race['ChildRace'] as $childRace) { ?>
				<li><a href="#<?php echo $childRace['url_title']; ?>"><?php echo $childRace['title']; ?></a></li>
			<?php } ?>
		</ul>
		

	<?php
		foreach ($race['ChildRace'] as $childRace): ?>
		<div id="<?php echo $childRace['url_title']; ?>">
			<h4><?php echo $childRace['title']; ?></h4>

						<?php echo $childRace['body']; ?>

			<table class="zebraTable">

			<?php if (($race['Race']['end_date']) && ($race['Race']['date'] != $race['Race']['end_date'])) { ?>
				<tr>
					<td>Date:</td>
					<td><?php echo $this -> Time -> format("F j, Y", $childRace['date']); ?></td>
				</tr>
			<?php }

				if (($childRace['date'] != $race['Race']['date']) || ($childRace['checkin_start_time'] != $race['Race']['checkin_start_time'])) {
 ?>
				<tr>
					<td>Check-in Start:</td>
					<td><?php echo $this -> Time -> format("g:i a", $childRace['checkin_start_time']); ?></td>
				</tr>
			<?php }

					if (($childRace['date'] != $race['Race']['date']) || ($childRace['checkin_end_time'] != $race['Race']['checkin_end_time'])) {
 ?>
				<tr>
					<td>Check-in End:</td>
					<td><?php echo $this -> Time -> format("g:i a", $childRace['checkin_end_time']); ?></td>
				</tr>
			<?php } ?>
				<tr>
					<td>Start Time:</td>
					<td><?php echo $this -> Time -> format("g:i a", $childRace['start_time']); ?></td>
				</tr>
			<tr>
					<td>End Time:</td>
					<td><?php echo $this -> Time -> format("g:i a", $childRace['end_time']); ?></td>
				</tr>

			<?php

					if ($childRace['start_location'] != $race['Race']['start_location']) {
 ?>
				<tr>
					<td>Start Location:</td>
					<td><?php echo $this -> Html -> link($childRace['StartLocation']['title'], array('controller' => 'locations', 'action' => 'view', $childRace['StartLocation']['url_title'])); ?></td>
				</tr>
			<?php }

					if ($childRace['end_location'] != $race['Race']['end_location']) {
 ?>
				<tr>
					<td>End Location:</td>
					<td><?php echo $this -> Html -> link($childRace['EndLocation']['title'], array('controller' => 'locations', 'action' => 'view', $childRace['EndLocation']['url_title'])); ?></td>
				</tr>
			<?php }

					if ($childRace['checkin_location'] != $race['Race']['checkin_location']) {
 ?>
				<tr>
					<td>Check-In Location:</td>
					<td><?php echo $this -> Html -> link($childRace['CheckinLocation']['title'], array('controller' => 'locations', 'action' => 'view', $childRace['CheckinLocation']['url_title'])); ?></td>
				</tr>
			<?php }

					if ($childRace['postrace_location'] != $race['Race']['postrace_location']) {
 ?>
				<tr>
					<td>Post-Race Location:</td>
					<td><?php echo $this -> Html -> link($childRace['PostraceLocation']['title'], array('controller' => 'locations', 'action' => 'view', $childRace['PostraceLocation']['url_title'])); ?></td>
				</tr>
			<?php }

					if ($childRace['membership_level_id'] != $race['Race']['membership_level_id']) {
 ?>
				<tr>
					<td>Membership Level:</td>
					<td><?php echo $childRace['MembershipLevel']['title']; ?></td>
				</tr>
			<?php }

					if (($childRace['minimum_age']) && ($childRace['minimum_age'] != $race['Race']['minimum_age'])) {
 ?>
				<tr>
					<td>Minimum Age:</td>
					<td><?php echo $childRace['minimum_age']; ?></td>
				</tr>
			<?php }

					if (($childRace['max_swimmers']) && ($childRace['max_swimmers'] != $race['Race']['max_swimmers'])) {
 ?>
				<tr>
					<td>Max Swimmers:</td> 
					<td><?php echo $childRace['max_swimmers']; ?></td>
				</tr>
			<?php }


/*					if (($childRace['course_map']) && ($childRace['course_map'] != $race['Race']['course_map'])) {
 ?>
				Course Map: <?php echo $childRace['course_map']; ?><br />
			<?php } */ ?>

				<tr>
					<td>Distance:</td>
					<td><?php echo $childRace['distance_number'] + 0; ?>
				<?php
				if ($childRace['distance_number'] == 1) {
					echo $childRace['Distance']['name'];
				} else {
					echo $childRace['Distance']['plural'];
				}
 ?></td>
				</tr>

		<?php //if ((!empty($childRace['NonMemberRaceFee'])) && (!empty($childRace['MemberRaceFee']))) { ?>

		<tr>
			<td>Fees</td>
	
	<td>
			<?php if (!empty($childRace['NonMemberRaceFee'])) { ?>
				<p><em>Non-Members</em><br />		
		<?php foreach ($childRace['NonMemberRaceFee'] as $raceFee): ?>
				<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
				<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
				$<?php echo $raceFee['price']; ?>
				<br />
		<?php endforeach; ?>
		</p>
			<?php } else { ?>
				<p><em>Non-Members</em><br />		
		<?php foreach ($race['NonMemberRaceFee'] as $raceFee): ?>
				<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
				<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
				$<?php echo $raceFee['price']; ?>
				<br />
		<?php endforeach; ?>
		</p>
				
				
			<?php } ?>
	
				<?php if (!empty($childRace['MemberRaceFee'])) { ?>
			<p><em>Members</em><br />		
		<?php	foreach ($childRace['MemberRaceFee'] as $raceFee): ?>
				<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
				<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
				$<?php echo $raceFee['price']; ?>
				<br />
		<?php endforeach; ?>
		</p>
			<?php } else { ?>
			<p><em>Members</em><br />		
		<?php	foreach ($race['MemberRaceFee'] as $raceFee): ?>
				<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
				<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
				$<?php echo $raceFee['price']; ?>
				<br />
		<?php endforeach; ?>
		</p>
				
				<?php } ?>
	</td>
					</tr>
	<?php //} ?>

	<?php if (($childRace['experience_id'] != null) && ($childRace['experience_id'] != $race['Race']['experience_id'])) { ?>
				<tr>
					<td>Experience Requirement:</td>
					<td><?php echo $childRace['Experience']['name']; ?></td>
				</tr>
			<?php } ?>
			</table>
		</div>
	<?php endforeach; ?>
	</div>
</div>

<?php } ?>


<?php } else { ?>
		<?php echo $race['Race']['teaser']; ?>

		<?php echo $this -> element('roadblock'); ?>
	
<?php } ?>
</div>
</div>