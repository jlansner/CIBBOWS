<div class="logoSizes view">
<h2><?php  echo __('Logo Size'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($logoSize['LogoSize']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($logoSize['LogoSize']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($logoSize['LogoSize']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($logoSize['LogoSize']['rank']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($logoSize['LogoSize']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($logoSize['LogoSize']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Logo Size'), array('action' => 'edit', $logoSize['LogoSize']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Logo Size'), array('action' => 'delete', $logoSize['LogoSize']['id']), null, __('Are you sure you want to delete # %s?', $logoSize['LogoSize']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Logo Sizes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Logo Size'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sponsors'), array('controller' => 'sponsors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor'), array('controller' => 'sponsors', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sponsors'); ?></h3>
	<?php if (!empty($logoSize['Sponsor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Title'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Logo Size Id'); ?></th>
		<th><?php echo __('Rank'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($logoSize['Sponsor'] as $sponsor): ?>
		<tr>
			<td><?php echo $sponsor['id']; ?></td>
			<td><?php echo $sponsor['title']; ?></td>
			<td><?php echo $sponsor['url_title']; ?></td>
			<td><?php echo $sponsor['url']; ?></td>
			<td><?php echo $sponsor['logo']; ?></td>
			<td><?php echo $sponsor['logo_size_id']; ?></td>
			<td><?php echo $sponsor['rank']; ?></td>
			<td><?php echo $sponsor['created']; ?></td>
			<td><?php echo $sponsor['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sponsors', 'action' => 'view', $sponsor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sponsors', 'action' => 'edit', $sponsor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sponsors', 'action' => 'delete', $sponsor['id']), null, __('Are you sure you want to delete # %s?', $sponsor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sponsor'), array('controller' => 'sponsors', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
