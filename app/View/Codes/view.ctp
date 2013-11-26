<div class="codes view">
<h2><?php  echo __('Code'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($code['Code']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($code['Code']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($code['Code']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abbreviation'); ?></dt>
		<dd>
			<?php echo h($code['Code']['abbreviation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($code['Code']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($code['Code']['rank']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($code['Code']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($code['Code']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Code'), array('action' => 'edit', $code['Code']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Code'), array('action' => 'delete', $code['Code']['id']), null, __('Are you sure you want to delete # %s?', $code['Code']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Results'); ?></h3>
	<?php if (!empty($code['Result'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Time'); ?></th>
		<th><?php echo __('Race Id'); ?></th>
		<th><?php echo __('Age Group Id'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Place'); ?></th>
		<th><?php echo __('Age Place'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($code['Result'] as $result): ?>
		<tr>
			<td><?php echo $result['id']; ?></td>
			<td><?php echo $result['first_name']; ?></td>
			<td><?php echo $result['last_name']; ?></td>
			<td><?php echo $result['user_id']; ?></td>
			<td><?php echo $result['time']; ?></td>
			<td><?php echo $result['race_id']; ?></td>
			<td><?php echo $result['age_group_id']; ?></td>
			<td><?php echo $result['age']; ?></td>
			<td><?php echo $result['gender']; ?></td>
			<td><?php echo $result['place']; ?></td>
			<td><?php echo $result['age_place']; ?></td>
			<td><?php echo $result['created']; ?></td>
			<td><?php echo $result['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'results', 'action' => 'view', $result['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'results', 'action' => 'edit', $result['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'results', 'action' => 'delete', $result['id']), null, __('Are you sure you want to delete # %s?', $result['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
