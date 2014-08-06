<div class="row">
	<div class="column column12">
		<h1>Volunteer Registration &ndash; <?php echo $race['Race']['title']; ?></h1>
		
		<p><?php echo $this->Time->format('F j, Y',$race['Race']['date']); ?></p>
	</div>
</div>
<div class="row">
		<div class="column column4">
<?php
		echo $this->Form->create('null');

		echo $this->Form->hidden(
			'VolunteerRegistration.race_id',
			array(
				'value' => $race['Race']['id']
			)
		);
		
		echo $this->Form->hidden(
			'VolunteerRegistration.date',
			array(
				'value' => $race['Race']['date'],
				'class' => 'dateField'
			)
		);

		echo $this->Form->hidden(
			'Address.id'
		);

		echo $this->Form->input(
			'Address.phone',
			array(
				'label' => 'Phone Number'
			)
		);
	
		echo $this->Form->input(
			'VolunteerRegistration.body',
			array(
				'label' => 'Preferred Tasks/Special skills or certifications/etc.'
			)
		);
	
		echo $this->Form->end(
			array(
				'label' => 'Register',
				'id' => 'registerButton'
			)
		);
?>
	</div>
</div>