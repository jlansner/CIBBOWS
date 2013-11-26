<div class="codesResults view">
<h2><?php  echo __('Codes Result'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($codesResult['CodesResult']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo $this->Html->link($codesResult['Code']['title'], array('controller' => 'codes', 'action' => 'view', $codesResult['Code']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo $this->Html->link($codesResult['Result']['id'], array('controller' => 'results', 'action' => 'view', $codesResult['Result']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($codesResult['CodesResult']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($codesResult['CodesResult']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Codes Result'), array('action' => 'edit', $codesResult['CodesResult']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Codes Result'), array('action' => 'delete', $codesResult['CodesResult']['id']), null, __('Are you sure you want to delete # %s?', $codesResult['CodesResult']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Codes Results'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Codes Result'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Codes'), array('controller' => 'codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code'), array('controller' => 'codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
