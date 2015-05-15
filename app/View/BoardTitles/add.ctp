<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('BoardTitle'); ?>
	<fieldset>
		<legend><?php echo __('Add Board Title'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>