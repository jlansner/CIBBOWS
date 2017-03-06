<div class="row">
	<div class="column column12">
		<h1>Race Registration - <?php echo $race['Race']['title'] ?></h1>
<?php

		echo $this->Form->create('null');

		echo $this->Form->hidden(
			'RaceRegistration.user_id',
			array(
				'value' => AuthComponent::user('id')
			)
		);

		if ($userMembershipLevel) {
			if (is_array($race['CurrentMemberRaceFee'])) {
				echo '<p>Member Price: $' . $race['CurrentMemberRaceFee']['price'] . '</p>';
			} else {
				echo '<p>Price: $' . $race['CurrentNonMemberRaceFee']['price'] . '</p>';
			}
			
			echo $this->Form->hidden(
				'RaceRegistration.join',
				array(
					'value' => 0
				)
			);
		} else {
			echo $this->Form->hidden(
				'RaceRegistration.payment',
				array(
					'value' => $race['CurrentNonMemberRaceFee']['price']
				)
			);
			
			echo $this->Form->input(
				'RaceRegistration.join',
				array(
					'legend' => false,
					'type' => 'radio',
					'options' => array(
						'0' => 'Non-Member Price: $' . $race['CurrentNonMemberRaceFee']['price'],
						'1' => 'Become a member for $' . $membershipFee['MembershipFee']['price'] . ' and register for just $' . $race['CurrentMemberRaceFee']['price'] . '!'
					),
					'separator' => '<br />'
				)
			);
			
			echo $this->Form->hidden('MembershipFee.price');
		}		

		echo $this->Form->hidden(
			'RaceRegistration.race_id',
			array(
				'value' => $race['Race']['id']
			)
		);
		
		echo $this->Form->input(
			'Discount.title',
			array(
				'label' => "Discount Code"
			)
		);

		if (count($race['ChildRace']) > 0) {
			if ($race['Race']['exclusive']) {
				// allow multiple section sign up
			} else {
        $disabledArray = array();

        for ($i = 0; $i < count($race['ChildRace']); $i++) {
          if (count($race['ChildRace'][$i]['ChildRaceRegistration']) >= $race['ChildRace'][$i]['max_swimmers']) {
            array_push($disabledArray, $race['ChildRace'][$i]['id']);
          }
        }

        echo $this->Form->input(
					'RaceRegistration.child_race_id',
					array(
						'type' => 'radio',
						'legend' => false,
						'before' => '<p>Section</p>',
						'separator' => '<br />',
						'escape' => false,
            'disabled' => $disabledArray
					)
				);
			}
		} else {
			echo $this->Form->hidden(
				'RaceRegistration.child_race_id',
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
				'empty' => '',
				'default' => 0,
				'class' => 'registerAge'
			)
		);
?>
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
	<div class="column column12">
		<p>Age on race day: <span class="ageRaceDay"><?php echo $this->request->data['RaceRegistration']['age']; ?></span>

<?php
if ($this->Form->isFieldError('RaceRegistration.age')) {
    echo $this->Form->error('RaceRegistration.age');
};
	echo $this->Form->hidden(
		'RaceRegistration.age'
	);

	echo $this->Form->hidden(
		'Race.date',
		array(
			'value' => $race['Race']['date'],
			'class' => 'dateField'
		)
	);
	
	echo $this->Form->hidden(
		'Race.minimum_age',
		array(
			'value' => $race['Race']['minimum_age']
		)
	);
?></p>

<?php
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
		); ?> 
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
		<h2>Additional Donation</h2>
		
		<p>CIBBOWS is a not-for-profit, all-volunteer organization. Please consider making an additional donation to support our work.</p>
	</div>
</div>

<div class="row">
	<div class="column column3">
		<div class="input number">
			<?php echo $this->Form->label('Donation.amount', 'Donation Amount'); ?>
			<div class="donationInputWrapper">
				<span>$</span>
				<div class="donationInput">
					<?php echo $this->Form->number(
						'Donation.amount',
						array(
							'step' => 'any',
							'required' => false
						)
					); ?>
				</div>
			</div>
		</div>
	</div>
  <div class="column column4">
    <?php echo $this->Form->label('Donation.body', 'Notes'); ?>
    <div class="donationInputWrapper">
      <div class="donationInput">
        <?php echo $this->Form->text(
			'Donation.body',
			array(
			)		
		); ?>
      </div>
    </div>
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
	
	<p>I understand that nothing on this website should be taken to constitute professional advice or a formal recommendation and CIBBOWS hereby excludes all representations and warranties whatsoever (whether implied by law or otherwise) relating to the content and use of this website. SWIMMERS ALWAYS SWIM AT THEIR OWN RISK. In no event will CIBBOWS assume liability for any direct, incidental, indirect, consequential, punitive or special damages or any other damage whatsoever arising out of or in connection with the use of this website or any linked websites or participation in any CIBBOWS activities.</p> 
</div>
	</div>
</div>
