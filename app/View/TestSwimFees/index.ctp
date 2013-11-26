<div class="testSwimFees index">
	<h2><?php echo __('Test Swim Fees'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('test_swim_id'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('priority'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_level_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($testSwimFees as $testSwimFee): ?>
	<tr>
		<td><?php echo h($testSwimFee['TestSwimFee']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testSwimFee['TestSwim']['title'], array('controller' => 'test_swims', 'action' => 'view', $testSwimFee['TestSwim']['id'])); ?>
		</td>
		<td><?php echo h($testSwimFee['TestSwimFee']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($testSwimFee['TestSwimFee']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($testSwimFee['TestSwimFee']['price']); ?>&nbsp;</td>
		<td><?php echo h($testSwimFee['TestSwimFee']['priority']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testSwimFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $testSwimFee['MembershipLevel']['id'])); ?>
		</td>
		<td><?php echo h($testSwimFee['TestSwimFee']['created']); ?>&nbsp;</td>
		<td><?php echo h($testSwimFee['TestSwimFee']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $testSwimFee['TestSwimFee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $testSwimFee['TestSwimFee']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $testSwimFee['TestSwimFee']['id']), null, __('Are you sure you want to delete # %s?', $testSwimFee['TestSwimFee']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Test Swim Fee'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
