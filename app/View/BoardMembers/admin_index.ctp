<div class="boardMembers index">
	<h2><?php echo __('Board Members'); ?></h2>
	<table class="zebraTable">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('board_level_id'); ?></th>
			<th><?php echo $this->Paginator->sort('board_title_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($boardMembers as $boardMember): ?>
	<tr>
		<td><?php echo h($boardMember['BoardMember']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($boardMember['User']['name'], array('controller' => 'users', 'action' => 'view', $boardMember['User']['id'])); ?>
		</td>
		<td><?php echo h($boardMember['BoardLevel']['title']); ?>&nbsp;</td>
		<td><?php echo h($boardMember['BoardTitle']['title']); ?>&nbsp;</td>
		<td><?php echo h($boardMember['BoardMember']['created']); ?>&nbsp;</td>
		<td><?php echo h($boardMember['BoardMember']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $boardMember['BoardMember']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $boardMember['BoardMember']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $boardMember['BoardMember']['id']), null, __('Are you sure you want to delete # %s?', $boardMember['BoardMember']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Board Member'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>