<div class="membershipLevels index">
	<h2><?php echo __('Membership Levels'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('rank'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($membershipLevels as $membershipLevel): ?>
	<tr>
		<td><?php echo h($membershipLevel['MembershipLevel']['id']); ?>&nbsp;</td>
		<td><?php echo h($membershipLevel['MembershipLevel']['title']); ?>&nbsp;</td>
		<td><?php echo h($membershipLevel['MembershipLevel']['url_title']); ?>&nbsp;</td>
		<td><?php echo h($membershipLevel['MembershipLevel']['rank']); ?>&nbsp;</td>
		<td><?php echo h($membershipLevel['MembershipLevel']['created']); ?>&nbsp;</td>
		<td><?php echo h($membershipLevel['MembershipLevel']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $membershipLevel['MembershipLevel']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $membershipLevel['MembershipLevel']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $membershipLevel['MembershipLevel']['id']), null, __('Are you sure you want to delete # %s?', $membershipLevel['MembershipLevel']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Membership Level'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clinic Fees'), array('controller' => 'clinic_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Fee'), array('controller' => 'clinic_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Fees'), array('controller' => 'membership_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Fee'), array('controller' => 'membership_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Fees'), array('controller' => 'race_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Fee'), array('controller' => 'race_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Fees'), array('controller' => 'test_swim_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Fee'), array('controller' => 'test_swim_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
	</ul>
</div>
