<div class="row">
	<div class="column column12">
	<h2><?php echo __('Waiver'); ?></h2>
	<table class="zebraTable">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user'); ?></th>
			<th><?php echo $this->Paginator->sort('race'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ageWaivers as $ageWaiver): ?>
	<tr>
		<td><?php echo h($ageWaiver['AgeWaiver']['id']); ?>&nbsp;</td>
		<td><?php echo h($ageWaiver['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($ageWaiver['Race']['title']); ?>&nbsp;</td>
		<td><?php echo h($ageWaiver['AgeWaiver']['created']); ?>&nbsp;</td>
		<td><?php echo h($ageWaiver['AgeWaiver']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(
				'View',
				array(
					'admin' => false,
					'action' => 'view',
					$ageWaiver['AgeWaiver']['id'])); ?>
			<?php echo $this->Html->link(
				'Edit',
				array(
					'admin' => false,
					'action' => 'edit',
					$ageWaiver['AgeWaiver']['id'])); ?>
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