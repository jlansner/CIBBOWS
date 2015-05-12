<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('AgeGroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Waiver'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('race_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>