<div class="row">
	<div class="column column12">
		<h1>Race Registration - <?php echo $race['Race']['title'] ?></h1>
<?php

echo $this->Form->create('null');
?>
	<?php
		echo $this->Form->hidden(
			'RaceRegistration.user_id',
			array(
				'value' => AuthComponent::user('id')
			)
		);

		if ($userMembershipLevel) {
			if (is_array($currentMemFee)) {
				echo '<p>Member Price: $' . $currentMemFee['price'] . '</p>';
				echo $this->Form->hidden(
					'RaceRegistration.payment',
					array(
						'value' => $currentMemFee['price']
					)
				);
	
			} else {
				echo '<p>Price: $' . $currentFee['price'] . '</p>';
				echo $this->Form->hidden(
					'RaceRegistration.payment',
					array(
						'value' => $currentFee['price']
					)
				);
			}
			
			echo $this->Form->hidden('RaceRegistration.join');			
		} else {
			echo $this->Form->hidden(
				'RaceRegistration.payment',
				array(
					'value' => $currentFee['price']
				)
			);
			
			echo $this->Form->input(
				'RaceRegistration.join',
				array(
					'legend' => false,
					'type' => 'radio',
					'options' => array(
						'1' => 'Non-Member Price: $' . $currentFee['price'],
						'2' => 'Become a member for $' . $membershipFee['MembershipFee']['price'] . ' and register for just $' . $currentMemFee['price'] . '!'
					),
					'separator' => '<br />'
				)
			);
		}		

		echo $this->Form->hidden(
			'RaceRegistration.race_id',
			array(
				'value' => $race['Race']['id']
			)
		);

		if (count($race['ChildRace']) > 0) {
			if ($race['Race']['exclusive']) {
				// allow multiple section sign up
			} else {
				echo $this->Form->input(
					'RaceRegistration.child_race_id',
					array(
						'type' => 'radio',
						'legend' => false,
						'before' => '<p>Section</p>',
						'separator' => '<br />',
						'escape' => false
					)
				);
			}
		} else {
			echo $this->Form->hidden(
				'child_race_id',
				array(
					'value' => $race['Race']['id']
				)
			);
		}
?>
	</div>
</div>

<div class="row">
	<div class="column column4">
<?php		echo $this->Form->input(
			'User.dob',
			array(
				'label' => 'Date of Birth',
				'type' => 'date',
//				'dateFormat' => 'MDY',
				'minYear' => date('Y') - 100,
				'maxYear' => date('Y'),
			)
		);
?>

<p>Age on race day: <span class="ageRaceDay"><?php
	if (AuthComponent::user('dob')) {
		$birthDate = new DateTime(AuthComponent::user('dob'));
		$raceDate = new DateTime($race['Race']['date']);
		$interval = $birthDate->diff($raceDate);
		$ageRaceDay = $interval->y;
		
		echo $ageRaceDay;
	}

	echo $this->Form->hidden(
		'RaceRegistration.age',
		array(
			'value' => $ageRaceDay
		)
	);		
				
?></span></p>
	</div>
	<div class="column column2">
<?php		echo $this->Form->input(
			'User.gender_id',
			array(
				'empty' => ''
			)
		);
?>
	</div>
	<div class="column column4">
<?php	echo $this->Form->input(
			'User.shirt_size_id',
			array(
				'empty' => '',
				'label' => 'T-Shirt Size'
			)
		);
?>		
	</div>
</div>
<div class="row">
	<div class="column column12"><?php
		echo $this->Form->input(
			'User.medical',
			array(
				'type' => 'textarea',
				'label' => 'Medical Conditions (if none, please enter "None")'
			)
		);
		
				echo $this->Form->input(
			'RaceRegistration.wetsuit',
			array(
				'label' => 'I will be swimming in a wetsuit'
			)
		);
		
		 ?>

<h2>Address</h2>
<?php		
		echo $this->Form->input('Address.id');
		echo $this->Form->input(
			'Address.line1',
			array(
				'label' => 'Line 1'
			)
		);
		echo $this->Form->input(
			'Address.line2',
			array(
				'label' => 'Line 2'
			)
		);
		echo $this->Form->input(
			'Address.line3',
			array(
				'label' => 'Line 3'
			)
		);
?>
	</div>
</div>
<div class="row">
	<div class="column column4">
		<?php echo $this->Form->input('Address.city'); ?>
	</div>
	<div class="column column4">
		<?php echo $this->Form->input(
			'Address.county_province',
			array(
				'label' => 'State/Province'
			)
		);
		?> 
	</div>
	<div class="column column4">
		<?php echo $this->Form->input(
			'Address.postcode',
			array(
				'label' => 'Zip code'
			)
		); ?>
	</div>
</div>	
<div class="row">
	<div class="column column12">

			<?php
		echo $this->Form->input('Address.country');
		echo $this->Form->input('Address.other_details');
		echo $this->Form->input(
			'Address.phone',
			array(
				'label' => 'Phone Number'
			)
		);
?>
<h2>Emergency Contact</h2>
	</div>
</div>

<div class="row">
	<div class="column column3">
<?php
echo $this->Form->input('EmergencyContact.id');
 echo $this->Form->input('EmergencyContact.name'); ?>		
	</div>
	<div class="column column3">
<?php echo $this->Form->input('EmergencyContact.phone'); ?>		
		
	</div>
	<div class="column column3">
<?php echo $this->Form->input('EmergencyContact.email'); ?>		
		
	</div>
	<div class="column column3">
<?php echo $this->Form->input('EmergencyContact.relationship'); ?>		
		
	</div>
</div>
<div class="row">
	<div class="column column12">
<?php		
		echo $this->Form->input(
			'RaceRegistration.waiver',
			array(
				'label' => 'I agree to the terms of the <span class="linkSpan liabilityLink">liability release</span>',
				array(
					'escape' => FALSE
				)
			)
		);

	?>

<?php
		echo $this->Form->end(
			array(
				'label' => 'Register',
				'id' => 'registerButton'
			)
		);
?>

<div class="liabilityWaiver">
	<span class="liabilityClose"><i class="fa fa-times-circle"></i></span>
	<h3>Liability Release</h3>
	<p>As a condition of being accepted to <?php echo $race['Race']['title']; ?>, I agree to make timely payment of the registration fee. I will attend the mandatory briefing the morning before the start of each stage for which I am registered, and will abide by the event rules and regulations including water safety determinations.</p>
	
	<p>By acknowledging and assuming the risks involved in an endurance activity of this nature, and on behalf of myself and my heirs, I agree to</p>
	<ol>
	<li>hold harmless any individual, group, association, agency or government body involved with this activity’s organization, conduct, and/or support, and</li>
	<li>waive all claims for damages or injury arising during the event against any individual, group, association, agency or government body involved with this activity’s organization, conduct, and/or support.</li>
	</ol>
	<p>I, the undersigned participant, intending to be legally bound, hereby certify that I have adequately trained for this activity, and that I am physically fit and have not been otherwise informed by a physician. I acknowledge that I am aware of the risks inherent in open water swimming (resulting from training and/or competition, and including, without limitation, permanent disability or death), and agree to assume all of those risks. I HEREBY WAIVE ANY AND ALL RIGHTS TO CLAIMS FOR LOSS OR DAMAGES CAUSED BY NEGLIGENCE, ACTIVE OR PASSIVE, OF THE FOLLOWING: HOST FACILITIES, CIBBOWS (CONEY ISLAND BRIGHTON BEACH OPEN WATER SWIMMERS), EVENT SPONSORS, EVENT COMMITTEES, VOLUNTEERS, AND ANY INDIVIDUALS OFFICIATING OR SUPERVISING THIS EVENT.</p> 
</div>
	</div>
</div>
