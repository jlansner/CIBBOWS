<div class="eventFees index">
	<h2><?php echo __('Event Fees'); ?></h2>
	<table class="zebraTable">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('priority'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_level_id'); ?></th>
			<th>Minimum Age</th>
			<th>Maximum Age</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($eventFees as $eventFee): ?>
	<tr>
		<td><?php echo h($eventFee['EventFee']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventFee['Event']['title'] . ' - ' . substr($eventFee['Event']['date'],0,4), array('controller' => 'events', 'action' => 'view', $eventFee['Event']['id'])); ?>
		</td>
		<td><?php echo h($eventFee['EventFee']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($eventFee['EventFee']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($eventFee['EventFee']['price']); ?>&nbsp;</td>
		<td><?php echo h($eventFee['EventFee']['priority']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $eventFee['MembershipLevel']['id'])); ?>
		</td>
		<td><?php echo h($eventFee['EventFee']['min_age']); ?>&nbsp;</td>
		<td><?php echo h($eventFee['EventFee']['max_age']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $eventFee['EventFee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $eventFee['EventFee']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $eventFee['EventFee']['id']), null, __('Are you sure you want to delete # %s?', $eventFee['EventFee']['id'])); ?>
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
