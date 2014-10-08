<div class="row">
	<div class="column column12">
		<h1>Races</h1>
		
		<table class="zebraTable">
			<thead>
				<tr>
					<th>Race</th>
					<th>Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($races as $race): ?>
				<tr>
					<td><?php echo $this -> Html -> link(
		$race['Race']['title'],
		array(
			'controller' => 'races',
			'action' => 'view',
			'year' => substr($race['Race']['date'], 0, 4),
			'url_title' => $race['Race']['url_title'],
			'admin' => false
		)
	); ?></td>
			
				<td>
					<?php echo $this -> Time -> format('m/j/y', $race['Race']['date']);
					if (($race['Race']['end_date']) && ($race['Race']['date'] != $race['Race']['end_date'])) {
						echo ' &ndash; ' . $this -> Time -> format('m/j/y', $race['Race']['end_date']);
					}
					?>
				</td>
				<td>
					<?php echo $this->Html->link(
					'Add Section',
					array(
						'admin' => false,
						'action' => 'add_section',
						$race['Race']['id']
					)
				); ?> | 
					
					<?php echo $this->Html->link(
					'Edit',
					array(
						'admin' => false,
						'action' => 'edit',
						$race['Race']['id']
					)
				); ?> | 
				<?php echo $this->Form->postLink(
					'Delete',
					array(
						'admin' => false,
						'action' => 'delete',
						$race['Race']['id']
					),
					null,
					'Are you sure you want to delete "' . $race['Race']['title'] . '"?'
				); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>