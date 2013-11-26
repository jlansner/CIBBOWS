<div class="codes form">
<?php echo $this->Form->create('Code'); ?>
	<fieldset>
		<legend><?php echo __('Edit Code'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('abbreviation');
		echo $this->Form->input('body');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
