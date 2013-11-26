<div class="logoSizes index">
	<h2><?php echo __('Logo Sizes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('rank'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($logoSizes as $logoSize): ?>
	<tr>
		<td><?php echo h($logoSize['LogoSize']['id']); ?>&nbsp;</td>
		<td><?php echo h($logoSize['LogoSize']['title']); ?>&nbsp;</td>
		<td><?php echo h($logoSize['LogoSize']['url_title']); ?>&nbsp;</td>
		<td><?php echo h($logoSize['LogoSize']['rank']); ?>&nbsp;</td>
		<td><?php echo h($logoSize['LogoSize']['created']); ?>&nbsp;</td>
		<td><?php echo h($logoSize['LogoSize']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $logoSize['LogoSize']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $logoSize['LogoSize']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $logoSize['LogoSize']['id']), null, __('Are you sure you want to delete # %s?', $logoSize['LogoSize']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Logo Size'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sponsors'), array('controller' => 'sponsors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor'), array('controller' => 'sponsors', 'action' => 'add')); ?> </li>
	</ul>
</div>
