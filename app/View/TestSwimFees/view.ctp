<div class="testSwimFees view">
<h2><?php  echo __('Test Swim Fee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($testSwimFee['TestSwimFee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Test Swim'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwimFee['TestSwim']['title'], array('controller' => 'test_swims', 'action' => 'view', $testSwimFee['TestSwim']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($testSwimFee['TestSwimFee']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($testSwimFee['TestSwimFee']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($testSwimFee['TestSwimFee']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo h($testSwimFee['TestSwimFee']['priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwimFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $testSwimFee['MembershipLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($testSwimFee['TestSwimFee']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($testSwimFee['TestSwimFee']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Test Swim Fee'), array('action' => 'edit', $testSwimFee['TestSwimFee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Test Swim Fee'), array('action' => 'delete', $testSwimFee['TestSwimFee']['id']), null, __('Are you sure you want to delete # %s?', $testSwimFee['TestSwimFee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Fees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Fee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
