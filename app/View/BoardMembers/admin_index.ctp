<div class="row">
	<div class="column column12">
	<h2>Board Members</h2>
	<table class="zebraTable">
	<tr>
			<th>ID</th>
			<th>User</th>
			<th>Level</th>
			<th>Title</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($boardMembers as $boardMember): ?>
	<tr>
		<td><?php echo h($boardMember['BoardMember']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($boardMember['User']['name'], array('controller' => 'users', 'action' => 'view', $boardMember['User']['id'])); ?>
		</td>
		<td><?php echo h($boardMember['BoardLevel']['title']); ?></td>
		<td><?php echo h($boardMember['BoardTitle']['title']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(
				'Edit',
				array(
					'admin' => false,
					'action' => 'edit',
					$boardMember['BoardMember']['id']
				)
			); ?>
			<?php echo $this->Form->postLink(
				'Delete',
				array(
					'admin' => false,
					'action' => 'delete',
					$boardMember['BoardMember']['id']),
					null,
					 __('Are you sure you want to delete # %s?', $boardMember['BoardMember']['id']
				)
			); ?>
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
</div>