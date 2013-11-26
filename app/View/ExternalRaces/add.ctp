<div class="externalRaces form">
<?php echo $this->Form->create('ExternalRace'); ?>
	<fieldset>
		<legend><?php echo __('Add External Race'); ?></legend>
	<?php
		echo $this->Form->input('date');
		echo $this->Form->input('title');
		echo $this->Form->input('url');
		echo $this->Form->input('location');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List External Races'), array('action' => 'index')); ?></li>
	</ul>
</div>
