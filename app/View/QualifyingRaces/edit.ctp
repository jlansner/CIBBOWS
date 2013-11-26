<?php echo $this->Form->create('QualifyingRace'); ?>
	<fieldset>
		<legend>Edit Qualifying Race</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('date');
		echo $this->Form->input(
			'time',
			array(
				'type' => 'text',
				'value'	=> ltrim($this->request->data['QualifyingRace']['time'],'0:'),
			)
		);
		echo $this->Form->input(
			'url',
			array(
				'label' => 'Link to Results'
			)
		);
		?>
		<div class="input text required">
			<?php
		echo $this->Form->input(
			'distance_number',
			array(
				'label' => 'Distance',
				'value' => ($this->request->data['QualifyingRace']['distance_number'] + 0),
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
		echo $this->Form->input('approved');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
