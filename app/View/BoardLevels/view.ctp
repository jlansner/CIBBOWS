<div class="boardMembers view">
<h2><?php  echo __('Board Member'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($boardMember['BoardMember']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($boardMember['User']['name'], array('controller' => 'users', 'action' => 'view', $boardMember['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($boardMember['BoardMember']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($boardMember['BoardMember']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($boardMember['BoardMember']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($boardMember['BoardMember']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Board Member'), array('action' => 'edit', $boardMember['BoardMember']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Board Member'), array('action' => 'delete', $boardMember['BoardMember']['id']), null, __('Are you sure you want to delete # %s?', $boardMember['BoardMember']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Board Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Board Member'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
