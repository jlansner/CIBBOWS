<?php echo $this->Form->create('EventFee'); ?>
	<fieldset>
		<legend><?php echo __('Add Event Fee'); ?></legend>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input(
			'start_date',
			array(
				'minYear' => date('Y'),
				'maxYear' => date('Y') + 5,
			)			
		);
		echo $this->Form->input(
			'end_date',
			array(
				'minYear' => date('Y'),
				'maxYear' => date('Y') + 5,
			)			
		);
		echo $this->Form->input('price');
		echo $this->Form->input('priority');
		echo $this->Form->input(
			'membership_level_id',
			array(
				'label' => 'Membership Level',
				'empty' => 'All Swimmers'
			)
		);
		echo $this->Form->input('min_age');
		echo $this->Form->input('max_age');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
