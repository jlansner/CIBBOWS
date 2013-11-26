<div class="emergencyContacts view">
<h2><?php  echo __('Emergency Contact'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emergencyContact['User']['name'], array('controller' => 'users', 'action' => 'view', $emergencyContact['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relationship'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['relationship']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($emergencyContact['EmergencyContact']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Emergency Contact'), array('action' => 'edit', $emergencyContact['EmergencyContact']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Emergency Contact'), array('action' => 'delete', $emergencyContact['EmergencyContact']['id']), null, __('Are you sure you want to delete # %s?', $emergencyContact['EmergencyContact']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Emergency Contacts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Emergency Contact'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
