<?php echo $this->Form->create('Experience'); ?>
	<fieldset>
		<legend><?php echo __('Add Experience'); ?></legend>
		<div class="input text required">
			<?php
		echo $this->Form->input(
			'distance_number',
			array(
				'label' => 'Distance',
				'div' => false,
				'type' => 'text'
			)
		);
		echo $this->Form->input(
			'distance_id',
			array(
				'label' => false,
				'div' => false
			)
		);
	?>
	</div>
<?php
		echo $this->Form->input(
			'time',
			array(
				'type' => 'text'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
