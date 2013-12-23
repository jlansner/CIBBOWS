<?php echo $this->Form->create('RaceFee'); ?>
	<fieldset>
		<legend>Add Race Fee
			<?php if ($race) {
				 echo ' - ' . $race['Race']['title'];
			}
			 ?></legend>
	<?php
		if ($race) {
			echo $this->Form->hidden(
				'race_id',
				array(
					'value' => $race['Race']['id']
				)
			);
		} else {
			echo $this->Form->input('race_id');
		}

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
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
