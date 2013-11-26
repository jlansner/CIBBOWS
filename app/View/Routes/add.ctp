<div class="routes form">
<?php echo $this->Form->create('Route'); ?>
	<fieldset>
		<legend><?php echo __('Add Route'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('start_location');
		echo $this->Form->input('end_location');
		echo $this->Form->input('distance');
		echo $this->Form->input('distance_id');
		echo $this->Form->input('meters');
		echo $this->Form->input('map');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Distances'), array('controller' => 'distances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('controller' => 'distances', 'action' => 'add')); ?> </li>
	</ul>
</div>
