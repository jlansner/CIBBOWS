<div class="codesResults form">
<?php echo $this->Form->create('CodesResult'); ?>
	<fieldset>
		<legend><?php echo __('Edit Codes Result'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code_id');
		echo $this->Form->input('result_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CodesResult.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CodesResult.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Codes Results'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Codes'), array('controller' => 'codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code'), array('controller' => 'codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
