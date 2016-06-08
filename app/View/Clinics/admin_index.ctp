<div class="row">
	<div class="column column12">
		<h1>Clincs</h1>
		
		<table class="zebraTable">
			<thead>
				<tr>
					<th>Clinic</th>
					<th>Date</th>
					<th>Time</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($clinics as $clinic): ?>
				<tr>
					<td><?php echo $this -> Html -> link(
		$clinic['Clinic']['title'],
		array(
			'controller' => 'clinics',
			'action' => 'view',
			'year' => substr($clinic['Clinic']['date'], 0, 4),
			'month' => substr($clinic['Clinic']['date'], 5, 2),
			'day' => substr($clinic['Clinic']['date'], 8, 2),
			'url_title' => $clinic['Clinic']['url_title'],
			'admin' => false
		)
	); ?></td>
			
				<td>
					<?php echo $this -> Time -> format('m/j/y', $clinic['Clinic']['date']); ?>
				</td>
				<td>
					<?php echo $this -> Time -> format('g:i', $clinic['Clinic']['start_time']); ?> -
					<?php echo $this -> Time -> format('g:i', $clinic['Clinic']['end_time']); ?> 
				</td>
				<td>
					<?php echo $this->Html->link(
					'Edit',
					array(
						'admin' => false,
						'action' => 'edit',
						$clinic['Clinic']['id']
					)
				); ?> | 
				<?php echo $this->Html->link(
					'Duplicate',
					array(
						'admin' => false,
						'action' => 'add',
						$clinic['Clinic']['id']
					)
				); ?> |
				<?php echo $this->Form->postLink(
					'Delete',
					array(
						'admin' => false,
						'action' => 'delete',
						$clinic['Clinic']['id']
					),
					null,
					'Are you sure you want to delete "' . $clinic['Clinic']['title'] . '"?'
				); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>