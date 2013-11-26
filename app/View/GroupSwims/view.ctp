<div class="groupSwims view">
<h2><?php  echo __('Group Swim'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($groupSwim['GroupSwim']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($groupSwim['GroupSwim']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($groupSwim['GroupSwim']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo $this->Html->link($groupSwim['Location']['title'], array('controller' => 'locations', 'action' => 'view', $groupSwim['Location']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($groupSwim['GroupSwim']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($groupSwim['GroupSwim']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Group Swim'), array('action' => 'edit', $groupSwim['GroupSwim']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Group Swim'), array('action' => 'delete', $groupSwim['GroupSwim']['id']), null, __('Are you sure you want to delete # %s?', $groupSwim['GroupSwim']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Swims'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Swim'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
