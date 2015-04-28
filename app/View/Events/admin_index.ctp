<div class="row">
	<div class="column column12">
		<h1>Events</h1>
		
		<table class="zebraTable">
			<thead>
				<tr>
					<th>Event</th>
					<th>Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($events as $event): ?>
				<tr>
					<td><?php echo $this -> Html -> link(
		$event['Event']['title'],
		array(
			'controller' => 'events',
			'action' => 'view',
			'year' => substr($event['Event']['date'], 0, 4),
			'url_title' => $event['Event']['url_title'],
			'admin' => false
		)
	); ?></td>
			
				<td>
					<?php echo $this -> Time -> format('m/j/y', $event['Event']['date']); ?>
				</td>
				<td>
					
					<?php echo $this->Html->link(
					'Edit',
					array(
						'admin' => false,
						'action' => 'edit',
						$event['Event']['id']
					)
				); ?> | 
				<?php echo $this->Form->postLink(
					'Delete',
					array(
						'admin' => false,
						'action' => 'delete',
						$event['Event']['id']
					),
					null,
					'Are you sure you want to delete "' . $event['Event']['title'] . '"?'
				); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>