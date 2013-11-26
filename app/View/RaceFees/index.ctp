<div class="raceFees index">
	<h2><?php echo __('Race Fees'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('race_id'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('priority'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_level_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($raceFees as $raceFee): ?>
	<tr>
		<td><?php echo h($raceFee['RaceFee']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($raceFee['Race']['title'], array('controller' => 'races', 'action' => 'view', $raceFee['Race']['id'])); ?>
		</td>
		<td><?php echo h($raceFee['RaceFee']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($raceFee['RaceFee']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($raceFee['RaceFee']['price']); ?>&nbsp;</td>
		<td><?php echo h($raceFee['RaceFee']['priority']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($raceFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $raceFee['MembershipLevel']['id'])); ?>
		</td>
		<td><?php echo h($raceFee['RaceFee']['created']); ?>&nbsp;</td>
		<td><?php echo h($raceFee['RaceFee']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $raceFee['RaceFee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $raceFee['RaceFee']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $raceFee['RaceFee']['id']), null, __('Are you sure you want to delete # %s?', $raceFee['RaceFee']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Race Fee'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
