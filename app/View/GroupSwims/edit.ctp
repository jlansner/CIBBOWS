<div class="groupSwims form">
<?php echo $this->Form->create('GroupSwim'); ?>
	<fieldset>
		<legend><?php echo __('Edit Group Swim'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date');
		echo $this->Form->input('time');
		echo $this->Form->input('location_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GroupSwim.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GroupSwim.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Group Swims'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
