<div class="memberships view">
<h2><?php  echo __('Membership'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($membership['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($membership['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $membership['MembershipLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($membership['Membership']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Membership'), array('action' => 'edit', $membership['Membership']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Membership'), array('action' => 'delete', $membership['Membership']['id']), null, __('Are you sure you want to delete # %s?', $membership['Membership']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
