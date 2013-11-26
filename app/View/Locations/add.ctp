<div class="locations form">
<?php echo $this->Form->create('Location'); ?>
	<fieldset>
		<legend><?php echo __('Add Location'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('map_link');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Group Swims'), array('controller' => 'group_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group Swim'), array('controller' => 'group_swims', 'action' => 'add')); ?> </li>
	</ul>
</div>
