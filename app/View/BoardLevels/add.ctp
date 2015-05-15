<div class="boardMembers form">
<?php echo $this->Form->create('BoardLevel'); ?>
	<fieldset>
		<legend><?php echo __('Add Board Level'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
