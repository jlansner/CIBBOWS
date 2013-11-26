<?php echo $this->Form->create('RaceFee'); ?>
	<fieldset>
		<legend><?php echo __('Add Race Fee'); ?></legend>
	<?php
		echo $this->Form->input('race_id');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('price');
		echo $this->Form->input('priority');
		echo $this->Form->input(
			'membership_level_id',
			array(
				'label' => 'Membership Requirement',
				'empty' => 'Non-Member'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
