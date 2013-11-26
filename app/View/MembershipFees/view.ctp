<div class="membershipFees view">
<h2><?php  echo __('Membership Fee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($membershipFee['MembershipFee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($membershipFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $membershipFee['MembershipLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($membershipFee['MembershipFee']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($membershipFee['MembershipFee']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($membershipFee['MembershipFee']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo h($membershipFee['MembershipFee']['priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($membershipFee['MembershipFee']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($membershipFee['MembershipFee']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Membership Fee'), array('action' => 'edit', $membershipFee['MembershipFee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Membership Fee'), array('action' => 'delete', $membershipFee['MembershipFee']['id']), null, __('Are you sure you want to delete # %s?', $membershipFee['MembershipFee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Fees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Fee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
