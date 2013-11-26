<div class="externalProfiles index">
	<h2><?php echo __('External Profiles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('approved'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($externalProfiles as $externalProfile): ?>
	<tr>
		<td><?php echo h($externalProfile['ExternalProfile']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($externalProfile['User']['name'], array('controller' => 'users', 'action' => 'view', $externalProfile['User']['id'])); ?>
		</td>
		<td><?php echo h($externalProfile['ExternalProfile']['title']); ?>&nbsp;</td>
		<td><?php echo h($externalProfile['ExternalProfile']['url']); ?>&nbsp;</td>
		<td><?php echo h($externalProfile['ExternalProfile']['approved']); ?>&nbsp;</td>
		<td><?php echo h($externalProfile['ExternalProfile']['created']); ?>&nbsp;</td>
		<td><?php echo h($externalProfile['ExternalProfile']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $externalProfile['ExternalProfile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $externalProfile['ExternalProfile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $externalProfile['ExternalProfile']['id']), null, __('Are you sure you want to delete # %s?', $externalProfile['ExternalProfile']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New External Profile'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
