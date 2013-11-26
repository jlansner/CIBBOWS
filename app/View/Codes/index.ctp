<div class="codes index">
	<h2><?php echo __('Codes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('abbreviation'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('rank'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($codes as $code): ?>
	<tr>
		<td><?php echo h($code['Code']['id']); ?>&nbsp;</td>
		<td><?php echo h($code['Code']['title']); ?>&nbsp;</td>
		<td><?php echo h($code['Code']['url_title']); ?>&nbsp;</td>
		<td><?php echo h($code['Code']['abbreviation']); ?>&nbsp;</td>
		<td><?php echo h($code['Code']['body']); ?>&nbsp;</td>
		<td><?php echo h($code['Code']['rank']); ?>&nbsp;</td>
		<td><?php echo h($code['Code']['created']); ?>&nbsp;</td>
		<td><?php echo h($code['Code']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $code['Code']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $code['Code']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $code['Code']['id']), null, __('Are you sure you want to delete # %s?', $code['Code']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Code'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
