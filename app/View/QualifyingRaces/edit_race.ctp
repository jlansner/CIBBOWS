<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('QualifyingRace'); ?>
	<fieldset>
		<legend><?php echo __('Add Qualifying Race'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden(
			'user_id',
			array(
				'value' => AuthComponent::user('id')
			)
		);
		echo $this->Form->input(
			'title',
			array(
				'label' => 'Race Name'
			)
		);
		echo $this->Form->input(
			'date',
			array(
				'minYear' => date('Y') - 20,
				'maxYear' => date('Y'),
			)
		);
		echo $this->Form->input(
			'time',
			array(
				'type' => 'text',
				'value'	=> ltrim($this->request->data['QualifyingRace']['time'],'0:'),
				'label' => 'Time<br />(<i>hh:mm:ss</i> or <i>mm:ss</i>)'
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
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>