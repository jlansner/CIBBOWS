<div class="row">
	<div class="column column12">
	<h1>Edit Locations</h1>
	<table class="zebraTable">
	<tr>
			<th>Title</th>
			<th>Body</th>
			<th>Actions</th>
	</tr>
	<?php foreach ($locations as $location): ?>
	<tr>
		<td><?php echo h($location['Location']['title']); ?></td>
		<td><?php echo h($location['Location']['body']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $location['Location']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $location['Location']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $location['Location']['id']), null, __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	</div>
</div>
