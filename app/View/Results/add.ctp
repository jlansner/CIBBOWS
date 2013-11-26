<div class="results form">
<?php echo $this->Form->create('Result'); ?>
	<fieldset>
		<legend><?php echo __('Add Result'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('user_id');
		echo $this->Form->input(
			'time',
			array(
				'type' => 'text'	
			)
		);
		echo $this->Form->input('race_id');
		echo $this->Form->input('place');
		echo $this->Form->input('age_place');
		echo $this->Form->input('Code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
