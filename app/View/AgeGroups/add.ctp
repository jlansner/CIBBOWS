<div class="ageGroups form">
<?php echo $this->Form->create('AgeGroup'); ?>
	<fieldset>
		<legend><?php echo __('Add Age Group'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('gender_id');
		echo $this->Form->input('minimum_age');
		echo $this->Form->input('maximum_age');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>