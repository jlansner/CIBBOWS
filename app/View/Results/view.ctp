<div class="results index">
	<h2>Results - <?php echo $results[0]['Race']['title']; ?></h2>
	<table class="zebraTable">
	<tr>
			<th>Place</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Age</th>
			<th>Age Group</th>
			<th>Age Place</th>
			<th>Time</th>
			
	<?php foreach ($results as $result): ?>
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
				$result['User']['id']
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