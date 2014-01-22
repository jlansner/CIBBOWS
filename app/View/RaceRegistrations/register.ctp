<div class="row">
	<div class="column column12">
<?php

echo $this->Form->create('RaceRegistration');
?>
	<fieldset>
		<legend>Race Registration - <?php echo $race['Race']['title'] ?></legend>
	<?php
		echo $this->Form->hidden(
			'user_id',
			array(
				'value' => AuthComponent::user('id')
			)
		);
		
		echo $this->Form->hidden(
			'race_id',
			array(
				'value' => $race['Race']['id']
			)
		);

		if (count($race['ChildRace']) > 0) {
			if ($race['Race']['exclusive']) {
				// allow multiple section sign up
			} else {
				echo $this->Form->hidden(
					'parent_race_id',
					array(
						'value' => $race['Race']['id']
					)
				);
				echo $this->Form->input(
					'child_race_id',
					array(
						'type' => 'radio',
						'legend' => false,
						'before' => '<p>Section</p>',
						'separator' => '<br />',
						'escape' => false
					)
				);
			}
		}

		echo $this->Form->hidden(
			'first_name',
			array(
				'value' => AuthComponent::user('first_name')
			)
		);
		echo $this->Form->hidden(
			'last_name',
			array(
				'value' => AuthComponent::user('last_name')
			)
		);

		if ((AuthComponent::user('dob') == null) || (AuthComponent::user('dob') == "0000-00-00")) {
			echo $this->Form->input(
				'dob',
				array(
					'label' => 'Date of Birth',
					'type' => 'date',
//					'dateFormat' => 'MDY',
					'minYear' => date('Y') - 100,
					'maxYear' => date('Y'),
				)
			);
		} else {
			$birthDate = new DateTime(AuthComponent::user('dob'));
			$raceDate = new DateTime($race['Race']['date']);
			$interval = $birthDate->diff($raceDate);		
			$age = $interval->y;	
		
			echo $this->Form->hidden(
				'age',
				array(
					'value' => $age 
				)
			);
		}

		if (AuthComponent::user('gender_id')) {
			echo $this->Form->hidden(
				'gender_id',
				array(
					'value' => AuthComponent::user('gender_id')
				)
			);
		} else {
			echo $this->Form->input('gender_id');
		}		

		if ($userMembershipLevel) {
			if (is_array($currentMemFee)) {
				echo '<p>Member Price: $' . $currentMemFee['price'] . '</p>';
				echo $this->Form->hidden(
					'payment',
					array(
						'value' => $currentMemFee['price']
					)
				);
	
			} else {
				echo '<p>Price: $' . $currentFee['price'] . '</p>';
				echo $this->Form->hidden(
					'payment',
					array(
						'value' => $currentFee['price']
					)
				);
			}			
		} else {
			echo '<p>Non-Member Price: $' . $currentFee['price'] . '</p>';
			echo $this->Form->hidden(
				'payment',
				array(
					'value' => $currentFee['price']
				)
			);
			
			if (is_array($currentMemFee)) {
				$saveText = 'Become a member today and save $' . ($currentFee['price'] - $currentMemFee['price']) . ' on your registration!';
			} else {
				$saveText = 'Become a member today!';
			}
			
			echo '<p>' . $this->Html->link(
				$saveText,
				array(
					'controller' => 'memberships',
					'action' => 'join'
				)
			) . '</p>';
		}
		
		echo $this->Form->input(
			'wetsuit',
			array(
				'label' => 'I will be swimming in a wetsuit'
			)
		);

		echo $this->Form->input(
			'waiver',
			array(
				'label' => 'I agree to the terms of the <span class="linkSpan liabilityLink">liability release</span>',
				array(
					'escape' => FALSE
				)
			)
		);
//		echo $this->Form->input('shirt_size_id');
	?>
	</fieldset>

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
