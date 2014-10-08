<div class="row">
	<div class="column column12">
	<h1>Series</h1>
	<table class="zebraTable">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($series as $series): ?>
	<tr>
		<td><?php echo h($series['Series']['id']); ?>&nbsp;</td>
		<td><?php echo h($series['Series']['title']); ?>&nbsp;</td>
		<td><?php echo h($series['Series']['url_title']); ?>&nbsp;</td>
		<td><?php echo h($series['Series']['created']); ?>&nbsp;</td>
		<td><?php echo h($series['Series']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $series['Series']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $series['Series']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $series['Series']['id']), null, __('Are you sure you want to delete # %s?', $series['Series']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	</div>
</div>
