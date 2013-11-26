<div class="codesResults index">
	<h2><?php echo __('Codes Results'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('code_id'); ?></th>
			<th><?php echo $this->Paginator->sort('result_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($codesResults as $codesResult): ?>
	<tr>
		<td><?php echo h($codesResult['CodesResult']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($codesResult['Code']['title'], array('controller' => 'codes', 'action' => 'view', $codesResult['Code']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($codesResult['Result']['id'], array('controller' => 'results', 'action' => 'view', $codesResult['Result']['id'])); ?>
		</td>
		<td><?php echo h($codesResult['CodesResult']['created']); ?>&nbsp;</td>
		<td><?php echo h($codesResult['CodesResult']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $codesResult['CodesResult']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $codesResult['CodesResult']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $codesResult['CodesResult']['id']), null, __('Are you sure you want to delete # %s?', $codesResult['CodesResult']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Codes Result'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Codes'), array('controller' => 'codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code'), array('controller' => 'codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
