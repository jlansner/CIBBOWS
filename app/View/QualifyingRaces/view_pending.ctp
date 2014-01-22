<div class="row">
	<div class="column column12">
<h1>Qualifying Races</h2>

	<table class="zebraTable">
		<thead>
	<tr>
			<th>Swimmer</th>
			<th>Title</th>
			<th>Date</th>
			<th>Distance</th>
			<th>Time</th>
			<th></th>
	</tr>
</thead>
<tbody>
	<?php foreach ($qualifyingRaces as $qualifyingRace): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($qualifyingRace['User']['name'], array('controller' => 'users', 'action' => 'view', $qualifyingRace['User']['id'])); ?>
		</td>
		<td><?php echo $this->Html->link($qualifyingRace['QualifyingRace']['title'], $qualifyingRace['QualifyingRace']['url'], array('target' => '_blank')); ?></td>
		<td><?php echo $this->Time->Format('n/j/y',$qualifyingRace['QualifyingRace']['date']); ?></td>
		<td><?php echo ($qualifyingRace['QualifyingRace']['distance_number'] + 0) . $qualifyingRace['Distance']['abbreviation']; ?>
		</td>
		<td><?php echo ltrim($qualifyingRace['QualifyingRace']['time'],'0:'); ?></td>
		<td>
			<?php echo $this->Html->link('<i class="fa fa-check edit"></i>', array('action' => 'approve', $qualifyingRace['QualifyingRace']['id']), array('escape' => FALSE, 'title' => 'Approve')); ?>
			<?php echo $this->Html->link('<i class="fa fa-pencil edit"></i>', array('action' => 'edit', $qualifyingRace['QualifyingRace']['id']), array('escape' => FALSE, 'title' => 'Edit')); ?>
			<?php 					echo $this->Form->postLink(
		'<i class="fa fa-times delete"></i>',
		array(
			'controller' => 'qualifying_races',
			'action' => 'delete',
			$qualifyingRace['QualifyingRace']['id']
		),
		array(
			'escape' => FALSE,
			'title' => 'Delete'
		),
		__('Are you sure you want to delete ' . $qualifyingRace['QualifyingRace']['title'] . ' for ' . $qualifyingRace['User']['name'], $qualifyingRace['QualifyingRace']['id'])
	);
	 ?>			
					</td>
	</tr>
<?php endforeach; ?>
</tbody>
	</table>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
</div>
