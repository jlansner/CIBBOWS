<div class="raceRegistrations form">
<?php echo $this->Form->create('RaceRegistration'); ?>
	<fieldset>
		<legend><?php echo __('Add Race Registration'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('race_id');
		echo $this->Form->input('child_race_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('age');
		echo $this->Form->input('gender_id');
		echo $this->Form->input('age_group_id');
		echo $this->Form->input(
			'qualifying_swim_id',
			array(
				'empty' => ''
			)
		);
		echo $this->Form->input(
			'qualifying_race_id',
			array(
				'empty' => ''
			)
		);
		echo $this->Form->input(
			'result_id',
			array(
				'empty' => ''
			)
		);
		echo $this->Form->input('payment');
		echo $this->Form->input('approved');
		echo $this->Form->input('waiver');
		echo $this->Form->input('shirt_size_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>