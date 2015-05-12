<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('AgeWaiver'); ?>
	<fieldset>
		<legend><?php echo __('Add Waiver'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('race_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>