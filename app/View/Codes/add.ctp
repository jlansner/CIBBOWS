<div class="codes form">
<?php echo $this->Form->create('Code'); ?>
	<fieldset>
		<legend><?php echo __('Add Code'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('abbreviation');
		echo $this->Form->input('body');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
