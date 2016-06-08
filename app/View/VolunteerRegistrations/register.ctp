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
	?>
	</div>
</div>
<div class="row">
	<div class="column column12">
		
		<?php 
		echo $this->Form->input(
			'VolunteerRegistration.body',
			array(
				'label' => 'Preferred Tasks/Special skills or certifications/etc.'
			)
		);
?>
<p>Swim Angels must be currently certified through the Swim Free program or a certified lifeguard, and must produce 
	documentation to ensure the safety of the participants.</p>
<?php
		echo $this->Form->input(
			'VolunteerRegistration.waiver',
			array(
				'label' => 'I agree to the terms of the <span class="linkSpan liabilityLink">liability release</span>',
				array(
					'escape' => FALSE
				)
			)
		);
	
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
	<p>As a condition of being accepted to volunteer <?php echo $race['Race']['title']; ?>, I agree to attend the mandatory briefing the morning before the start of each stage for which I am registered, and will abide by the event rules and regulations including water safety determinations.</p>
	
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