<div class="boardMembers index">
	<h2><?php echo __('Board Levels'); ?></h2>
	<table class="zebraTable">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('rank'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($boardLevels as $boardLevel): ?>
	<tr>
		<td><?php echo h($boardLevel['BoardMember']['id']); ?>&nbsp;</td>

		<td><?php echo h($boardLevel['BoardMember']['title']); ?>&nbsp;</td>
		<td><?php echo h($boardLevel['BoardMember']['url_title']); ?>&nbsp;</td>
		<td><?php echo h($boardLevel['BoardMember']['rank']); ?>&nbsp;</td>
		<td><?php echo h($boardLevel['BoardMember']['created']); ?>&nbsp;</td>
		<td><?php echo h($boardLevel['BoardMember']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $boardLevel['BoardMember']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $boardLevel['BoardMember']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $boardLevel['BoardMember']['id']), null, __('Are you sure you want to delete # %s?', $boardLevel['BoardMember']['id'])); ?>
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