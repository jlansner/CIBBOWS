<div class="row">
	<div class="column column12">
	<h2>Waivers</h2>
	<table class="zebraTable">
	<tr>
			<th>ID</th>
			<th>Swimmer</th>
			<th>Age</th>
			<th>Race</th>
			<th>Race Date</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php 
	$today = new DateTime('today');
			
	foreach ($ageWaivers as $ageWaiver): ?>
	<tr>
		<td><?php echo h($ageWaiver['AgeWaiver']['id']); ?></td>
		<td><?php echo h($ageWaiver['User']['name']); ?></td>
		<td><?php 
			$birthDate = new DateTime($ageWaiver['User']['dob']);
			echo $birthDate->diff($today)->y;
			?></td>
		<td><?php echo h($ageWaiver['Race']['title']); ?></td>
		<td><?php echo h($ageWaiver['Race']['date']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(
				'Edit',
				array(
					'admin' => false,
					'action' => 'edit',
					$ageWaiver['AgeWaiver']['id'])); ?>
					| 
			<?php echo $this->Form->postLink(
				'Delete',
				array(
					'admin' => false,
					'action' => 'delete',
					$ageWaiver['AgeWaiver']['id']),
					null,
					__('Are you sure you want to delete # %s?', $ageWaiver['AgeWaiver']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<p>
		<?php echo $this->Html->link(
			'Add a new waiver',
			array(
				'admin' => false,
				'action' => 'add'
			)
		); ?>
		
	</p>
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