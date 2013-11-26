<div class="sponsors view">
<h2><?php  echo __('Sponsor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo Size'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sponsor['LogoSize']['title'], array('controller' => 'logo_sizes', 'action' => 'view', $sponsor['LogoSize']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rank'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['rank']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sponsor['Sponsor']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sponsor'), array('action' => 'edit', $sponsor['Sponsor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sponsor'), array('action' => 'delete', $sponsor['Sponsor']['id']), null, __('Are you sure you want to delete # %s?', $sponsor['Sponsor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sponsors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logo Sizes'), array('controller' => 'logo_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Logo Size'), array('controller' => 'logo_sizes', 'action' => 'add')); ?> </li>
	</ul>
</div>
