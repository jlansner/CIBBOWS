<div class="row">
	<div class="column column12">
		<h1>Races</h1>

		<p>
			<?php
				echo $this->Html->link(
					'Edit race fees',
					array(
						'controller' => 'race_fees',
						'action' => 'index',
						'admin' => true
					)
				);
			?>
		</p>
		
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

					<?php
					echo $this->Html->link(
						'Add fees',
						array(
							'controller' => 'race_fees',
							'action' => 'add_fee',
							'admin' => false,
							$race['Race']['id']
						)
					);
					?>
				|
					
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
			
			<?php if ($race['ChildRace']) { 
				foreach ($race['ChildRace'] as $childRace) {
				?>
				
				<tr>
					<td>
						&ndash; <?php echo $childRace['title']; ?>
					</td>
					<td></td>
					<td>

						<?php
					echo $this->Html->link(
						'Add fees',
						array(
							'controller' => 'race_fees',
							'action' => 'add_fee',
							'admin' => false,
							$childRace['id']
						)
					);
					?>
				|
									<?php echo $this->Html->link(
					'Edit',
					array(
						'admin' => false,
						'action' => 'edit',
						$childRace['id']
					)
				); ?> | 
				<?php echo $this->Form->postLink(
					'Delete',
					array(
						'admin' => false,
						'action' => 'delete',
						$childRace['id']
					),
					null,
					'Are you sure you want to delete "' . $race['Race']['title'] . '"?'
				); ?></td>
				</tr>
				
			
			<?php } 
			}
			?>
			<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</div>