<div class="results index">
	<h2>Results - <?php echo $results[0]['Race']['title']; ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort(
				'last_name',
				'Name'
			); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('age_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('place'); ?></th>
			<th><?php echo $this->Paginator->sort('age_place'); ?></th>
			
	<?php foreach ($results as $result): ?>
	<tr>
		<td><?php echo $this->Html->link($result['Result']['first_name'] . ' ' . $result['Result']['last_name'], array('controller' => 'users', 'action' => 'view', $result['User']['id'])); ?>
		</td>
		<td>
			<?php 
			if ($this->Time->format('H',$result['Result']['time']) == 0) {
	 			echo $this->Time->format('i:s',$result['Result']['time']);
			} else {
				echo $this->Time->format('G:i:s',$result['Result']['time']);				
			}
 		?>
		</td>
		<td>
			<?php echo $result['AgeGroup']['title']; ?>
		</td>
		<td><?php echo h($result['Result']['age']); ?></td>
		<td><?php echo h($result['Gender']['title']); ?></td>
		<td><?php echo h($result['Result']['place']); ?></td>
		<td><?php echo h($result['Result']['age_place']); ?></td>
	</tr>
<?php endforeach; ?>
	</table>