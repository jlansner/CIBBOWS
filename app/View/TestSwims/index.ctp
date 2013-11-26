<div class="testSwims index">
	<h2><?php echo __('Test Swims'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('url_title'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('start_location'); ?></th>
			<th><?php echo $this->Paginator->sort('end_location'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_level_id'); ?></th>
			<th><?php echo $this->Paginator->sort('max_swimmers'); ?></th>
			<th><?php echo $this->Paginator->sort('course_map'); ?></th>
			<th><?php echo $this->Paginator->sort('body'); ?></th>
			<th><?php echo $this->Paginator->sort('distance_number'); ?></th>
			<th><?php echo $this->Paginator->sort('distance_id'); ?></th>
			<th><?php echo $this->Paginator->sort('meters'); ?></th>
			<th><?php echo $this->Paginator->sort('experience_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($testSwims as $testSwim): ?>
	<tr>
		<td><?php echo h($testSwim['TestSwim']['id']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['title']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['url_title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testSwim['User']['name'], array('controller' => 'users', 'action' => 'view', $testSwim['User']['id'])); ?>
		</td>
		<td><?php echo h($testSwim['TestSwim']['date']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['end_time']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['start_location']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['end_location']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testSwim['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $testSwim['MembershipLevel']['id'])); ?>
		</td>
		<td><?php echo h($testSwim['TestSwim']['max_swimmers']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['course_map']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['body']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['distance_number']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testSwim['Distance']['name'], array('controller' => 'distances', 'action' => 'view', $testSwim['Distance']['id'])); ?>
		</td>
		<td><?php echo h($testSwim['TestSwim']['meters']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($testSwim['Experience']['name'], array('controller' => 'experiences', 'action' => 'view', $testSwim['Experience']['id'])); ?>
		</td>
		<td><?php echo h($testSwim['TestSwim']['created']); ?>&nbsp;</td>
		<td><?php echo h($testSwim['TestSwim']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $testSwim['TestSwim']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $testSwim['TestSwim']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $testSwim['TestSwim']['id']), null, __('Are you sure you want to delete # %s?', $testSwim['TestSwim']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Test Swim'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Experiences'), array('controller' => 'experiences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Experience'), array('controller' => 'experiences', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Fees'), array('controller' => 'test_swim_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Fee'), array('controller' => 'test_swim_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Registrations'), array('controller' => 'test_swim_registrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('controller' => 'test_swim_registrations', 'action' => 'add')); ?> </li>
	</ul>
</div>
