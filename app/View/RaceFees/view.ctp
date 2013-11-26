<div class="raceFees view">
<h2><?php  echo __('Race Fee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($raceFee['RaceFee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceFee['Race']['title'], array('controller' => 'races', 'action' => 'view', $raceFee['Race']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($raceFee['RaceFee']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($raceFee['RaceFee']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($raceFee['RaceFee']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo h($raceFee['RaceFee']['priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $raceFee['MembershipLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($raceFee['RaceFee']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($raceFee['RaceFee']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Race Fee'), array('action' => 'edit', $raceFee['RaceFee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Race Fee'), array('action' => 'delete', $raceFee['RaceFee']['id']), null, __('Are you sure you want to delete # %s?', $raceFee['RaceFee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Fees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Fee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
