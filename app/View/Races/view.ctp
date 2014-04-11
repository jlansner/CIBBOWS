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
	if (count($race['NonMemberRaceFee']) > 0) {
		foreach ($race['NonMemberRaceFee'] as $racefee) {
			if (($racefee['start_date'] <= date('Y-m-d')) && ($racefee['end_date'] >= date('Y-m-d'))) {
				$regOpen = true;
				break;
			}
		}
	} 
	
	if (count($race['MemberRaceFee']) > 0) {
		foreach ($race['MemberRaceFee'] as $racefee) {
			if (($racefee['start_date'] <= date('Y-m-d')) && ($racefee['end_date'] >= date('Y-m-d'))) {
				$memRegOpen = true;
				break;
			}
		}
 	}
 ?>
 <ul class="raceNav">
 	<li class="active">Overview</li>
 	<li>
 		<?php echo $this->Html->link(
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
</ul>
<br class="clear" />

<p>
<?php

if ($reg) {
	echo 'You are already registered for this race.';
} else {
	if (($regOpen) || (($memRegOpen) && ($userMembershipLevel == 1))) {
		echo $this->Html->link(
			'Register',
			array(
				'controller' => 'race_registrations',
				'action' => 'register',
				$race['Race']['id']
			)
		);
	} else if ($memRegOpen) {
		echo 'Registration is currently open only for members.';
	} else {
		echo 'Registraton for this race is not available at this time.';
	}
}
?>
</p>

	<?php echo $race['Race']['body']; ?>
	
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

		<tr>
			<td>Check-in Start Time:</td>
			<td><?php echo $this -> Time -> format('g:i a', $race['Race']['checkin_start_time']); ?></td
		</tr>
				
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

		<tr>
			<td>Start Time:</td>
			<td><?php echo $this -> Time -> format('g:i a', $race['Race']['start_time']); ?></td>
		</tr>

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




		<tr>
			<td>Distance:</td>
			<td><?php echo $race['Race']['distance_number'] + 0; ?>

			<?php
			if ($race['Race']['distance_number'] == 1) {
				echo $race['Distance']['name'];
			} else {
				echo $race['Distance']['plural'];
			}
			?>
			</td>
		</tr>
	<?php if ($this->Time->isFuture($race['Race']['date'])) { ?>

	<tr>
		<td>Minimum Age:</td>
		<td><?php echo h($race['Race']['minimum_age']); ?></td>
	</tr>

	<tr>
		<td>Maximum Number of Swimmers:</td>
		<td><?php echo h($race['Race']['max_swimmers']); ?></td>
	</tr>

	<tr>
		<td>Fees</td>
		<td>

			<?php if (!empty($race['NonMemberRaceFee'])) { ?>
		<em>All Swimmers</em><br />		
	<?php foreach ($race['NonMemberRaceFee'] as $raceFee) { ?>
			<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
			<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
			$<?php echo $raceFee['price']; ?>
			<br />
	<?php }
			}
 ?>

			<?php if (!empty($race['MemberRaceFee'])) { ?>
		<em>Members</em><br />		
	<?php	foreach ($race['MemberRaceFee'] as $raceFee) { ?>
			<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
			<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
			$<?php echo $raceFee['price']; ?>
			<br />
	<?php }
}
 ?>
			
		</td>
		</tr>

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
			<?php }

					if (($childRace['date'] != $race['Race']['date']) || ($childRace['start_time'] != $race['Race']['start_time'])) {
 ?>
				<tr>
					<td>Start Time:</td>
					<td><?php echo $this -> Time -> format("g:i a", $childRace['start_time']); ?></td>
				</tr>
			<?php }

					if (($childRace['date'] != $race['Race']['date']) || ($childRace['end_time'] != $race['Race']['end_time'])) {
 ?>
				<tr>
					<td>End Time:</td>
					<td><?php echo $this -> Time -> format("g:i a", $childRace['end_time']); ?></td>
				</tr>
			<?php }

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

			<?php echo $childRace['body']; ?>
			
			<?php if (($childRace['distance_number'] != $race['Race']['distance_number']) || ($childRace['distance_id'] != $race['Race']['distance_id'])) { ?>
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
			
			<?php } ?>

	<tr>
		<td>Fees</td>

<td>
		<?php if (!empty($childRace['NonMemberRaceFee'])): ?>
			<em>Non-Members</em><br />		
	<?php foreach ($childRace['NonMemberRaceFee'] as $raceFee): ?>
			<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
			<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
			$<?php echo $raceFee['price']; ?>
			<br />
	<?php endforeach;
				endif;
 ?>

			<?php if (!empty($childRace['MemberRaceFee'])): ?>
		<em>Members</em><br />		
	<?php	foreach ($childRace['MemberRaceFee'] as $raceFee): ?>
			<?php echo $this -> Time -> format('F j, Y', $raceFee['start_date']); ?> - 
			<?php echo $this -> Time -> format('F j, Y', $raceFee['end_date']); ?>:
			$<?php echo $raceFee['price']; ?>
			<br />
	<?php endforeach;
				endif;
 ?>
</td>
				</tr>
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