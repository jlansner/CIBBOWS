<div class="externalProfiles view">
<h2><?php  echo __('External Profile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($externalProfile['ExternalProfile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($externalProfile['User']['name'], array('controller' => 'users', 'action' => 'view', $externalProfile['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($externalProfile['ExternalProfile']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($externalProfile['ExternalProfile']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($externalProfile['ExternalProfile']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($externalProfile['ExternalProfile']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($externalProfile['ExternalProfile']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit External Profile'), array('action' => 'edit', $externalProfile['ExternalProfile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete External Profile'), array('action' => 'delete', $externalProfile['ExternalProfile']['id']), null, __('Are you sure you want to delete # %s?', $externalProfile['ExternalProfile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List External Profiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Profile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
