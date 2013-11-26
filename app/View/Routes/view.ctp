<div class="routes view">
<h2><?php  echo __('Route'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($route['Route']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($route['Route']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($route['Route']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Location'); ?></dt>
		<dd>
			<?php echo h($route['Route']['start_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Location'); ?></dt>
		<dd>
			<?php echo h($route['Route']['end_location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo h($route['Route']['distance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo $this->Html->link($route['Distance']['id'], array('controller' => 'distances', 'action' => 'view', $route['Distance']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meters'); ?></dt>
		<dd>
			<?php echo h($route['Route']['meters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Map'); ?></dt>
		<dd>
			<?php echo h($route['Route']['map']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($route['Route']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($route['Route']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Route'), array('action' => 'edit', $route['Route']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Route'), array('action' => 'delete', $route['Route']['id']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
	</ul>
</div>
