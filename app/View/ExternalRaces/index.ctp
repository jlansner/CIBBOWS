<div class="externalRaces index">
	<h2><?php echo __('External Races'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('location'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($externalRaces as $externalRace): ?>
	<tr>
		<td><?php echo h($externalRace['ExternalRace']['id']); ?>&nbsp;</td>
		<td><?php echo h($externalRace['ExternalRace']['date']); ?>&nbsp;</td>
		<td><?php echo h($externalRace['ExternalRace']['title']); ?>&nbsp;</td>
		<td><?php echo h($externalRace['ExternalRace']['url_title']); ?>&nbsp;</td>
		<td><?php echo h($externalRace['ExternalRace']['url']); ?>&nbsp;</td>
		<td><?php echo h($externalRace['ExternalRace']['location']); ?>&nbsp;</td>
		<td><?php echo h($externalRace['ExternalRace']['body']); ?>&nbsp;</td>
		<td><?php echo h($externalRace['ExternalRace']['created']); ?>&nbsp;</td>
		<td><?php echo h($externalRace['ExternalRace']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $externalRace['ExternalRace']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $externalRace['ExternalRace']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $externalRace['ExternalRace']['id']), null, __('Are you sure you want to delete # %s?', $externalRace['ExternalRace']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New External Race'), array('action' => 'add')); ?></li>
	</ul>
</div>
