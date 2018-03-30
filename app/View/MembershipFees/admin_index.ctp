<div class="membershipFees index">
	<h2><?php echo __('Membership Fees'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_level_id'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('priority'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($membershipFees as $membershipFee): ?>
	<tr>
		<td><?php echo h($membershipFee['MembershipFee']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($membershipFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $membershipFee['MembershipLevel']['id'])); ?>
		</td>
		<td><?php echo h($membershipFee['MembershipFee']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($membershipFee['MembershipFee']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($membershipFee['MembershipFee']['price']); ?>&nbsp;</td>
		<td><?php echo h($membershipFee['MembershipFee']['priority']); ?>&nbsp;</td>
		<td><?php echo h($membershipFee['MembershipFee']['created']); ?>&nbsp;</td>
		<td><?php echo h($membershipFee['MembershipFee']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $membershipFee['MembershipFee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $membershipFee['MembershipFee']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $membershipFee['MembershipFee']['id']), null, __('Are you sure you want to delete # %s?', $membershipFee['MembershipFee']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Membership Fee'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
