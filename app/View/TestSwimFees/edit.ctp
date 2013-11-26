<div class="testSwimFees form">
<?php echo $this->Form->create('TestSwimFee'); ?>
	<fieldset>
		<legend><?php echo __('Edit Test Swim Fee'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('test_swim_id');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('price');
		echo $this->Form->input('priority');
		echo $this->Form->input('membership_level_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TestSwimFee.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TestSwimFee.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Test Swim Fees'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
