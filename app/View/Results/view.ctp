<script>
	$(document).ready(function() {
		$('#year').change(function() {
			window.location.replace('/results/view/<?php echo $series['Series']['url_title']; ?>/' + $('#year').val());
		});
	});
	
</script>

<div class="row>">
	<div class="column column12">

	<h1><?php echo $races['Race']['title']; ?></h1>
	
	<h2>Results</h2>

 <ul class="raceNav">
 	<li>
  		<?php echo $this->Html->link(
			'Overview',
			array(
				'controller' => 'races',
				'action' => 'view',
				'year' => substr($racesList[0]['Race']['date'],0,4),
				'url_title' => $racesList[0]['Race']['url_title']
			)
		); ?>
 	</li>
 	<li>
 		<?php echo $this->Html->link(
			'Registered Swimmers',
			array(
				'controller' => 'race_registrations',
				'action' => 'view',
				'year' => substr($racesList[0]['Race']['date'],0,4),
				'url_title' => $racesList[0]['Race']['url_title']
			)
		); ?>
 	</li>
 	 <li class="active">Results</li>	
 </ul>
 <br class="clear" />
<p>Select Year:

<select name="year" id="year">
<?php foreach ($racesList as $raceYear) {
	if (strtotime($raceYear['Race']['date']) < time()) {
		$lineYear = substr($raceYear['Race']['date'],0,4); ?>
		<option value="<?php echo $lineYear; ?>"<?php if ($lineYear == $year) { echo ' selected';} ?>><?php echo $lineYear; ?></option>	
<?php 	}
	} ?>	
</select>
</p>

<?php
if (count($races['ChildRace'])) {
	$i = 0;
	foreach ($results['Child'] as $section): ?>
	<h3><?php echo $races['ChildRace'][$i]['title']; ?></h3>
		<?php 
		$i++;
		if (count($section)) { ?>
	<table class="zebraTable">
	<tr>
			<th>Place</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Age Group</th>
			<th>Age Place</th>
			<th>Time</th>
	</tr>

	<?php foreach ($section as $result): ?>
	<tr>
		<td><?php 
		if ($result['Result']['place'] < 10000) {
			echo h($result['Result']['place']);
		} else {
			echo '&ndash;';
		}
		?></td>
		<td><?php echo $this->Html->link(
			$result['Result']['first_name'] . ' ' . $result['Result']['last_name'],
			array(
				'controller' => 'users',
				'action' => 'view',
				$result['Result']['user_id']
			)
		); ?>
		</td>
		<td><?php echo h($result['Gender']['title']); ?></td>
		<td><?php echo h($result['Result']['age']); ?></td>
		<td><?php echo $result['AgeGroup']['title']; ?></td>
		<td><?php
				if ($result['Result']['age_place'] < 10000) {
					echo h($result['Result']['age_place']);
				} else {
					echo '&ndash;';
				}
		 ?></td>
		<td>
			<?php 
			if (($result['Result']['time'] == "00:00:00") || ($result['Result']['time'] == null)) {
			} else if ($this->Time->format('H',$result['Result']['time']) == 0) {
	 			echo $this->Time->format('i:s',$result['Result']['time']);
			} else {
				echo $this->Time->format('G:i:s',$result['Result']['time']);				
			}
			
			if (!empty($result['Code'])) {
				foreach ($result['Code'] as $code) {
					echo '<a href="#" class="resultCode" title ="' . $code['title'] . '">' . $code['abbreviation'] . '</span>';
				}
			}
 		?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php 
} else { ?>
	<p>There are no results for this race.</p>
<?php }
endforeach; ?>

<?php } else { 
	if (count($results['Parent'])) {
	?>

	<table class="zebraTable">
	<tr>
			<th>Place</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Age Group</th>
			<th>Age Place</th>
			<th>Time</th>
 	</tr>
 
			
	<?php foreach ($results['Parent'] as $result): ?>
	<tr>
		<td><?php 
		if ($result['Result']['place'] < 10000) {
			echo h($result['Result']['place']);
		} else {
			echo '&ndash;';
		}
		?></td>
		<td><?php echo $this->Html->link(
			$result['Result']['first_name'] . ' ' . $result['Result']['last_name'],
			array(
				'controller' => 'users',
				'action' => 'view',
				$result['Result']['user_id']
			)
		); ?>
		</td>
		<td><?php echo h($result['Gender']['title']); ?></td>
		<td><?php echo h($result['Result']['age']); ?></td>
		<td><?php echo $result['AgeGroup']['title']; ?></td>
		<td><?php
				if ($result['Result']['age_place'] < 10000) {
					echo h($result['Result']['age_place']);
				} else {
					echo '&ndash;';
				}
		 ?></td>
		<td>
			<?php 
			if (($result['Result']['time'] == "00:00:00") || ($result['Result']['time'] == null)) {
			} else if ($this->Time->format('H',$result['Result']['time']) == 0) {
	 			echo $this->Time->format('i:s',$result['Result']['time']);
			} else {
				echo $this->Time->format('G:i:s',$result['Result']['time']);				
			}
			
			if (!empty($result['Code'])) {
				foreach ($result['Code'] as $code) {
					echo '<a href="#" class="resultCode" title ="' . $code['title'] . '">' . $code['abbreviation'] . '</span>';
				}
			}
 		?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php } else { ?>
	<p>There are no results for this race.</p>
<?php	} 
	
	} ?>
	</div>
	</div>