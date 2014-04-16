<div class="row">
	<div class="column column12">
		<h1>Edit Address</h1>
<?php echo $this->Form->create('Address'); ?>

	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden(
			'user_id',
			array(
				'value' => AuthComponent::user('id')
			)
		); 
		echo $this->Form->input(
			'line1',
			array(
				'label' => 'Line 1'
			)
		);
		echo $this->Form->input(
			'line2',
			array(
				'label' => 'Line 2'
			)
		);
		echo $this->Form->input(
			'line3',
			array(
				'label' => 'Line 3'
			)
		);
?>
	</div>
</div>
<div class="row">
	<div class="column column4">
		<?php echo $this->Form->input('city'); ?>
	</div>
	<div class="column column4">
		<?php echo $this->Form->input(
			'county_province',
			array(
				'label' => 'State/Province'
			)
		);
		?> 
	</div>
	<div class="column column4">
		<?php echo $this->Form->input(
			'postcode',
			array(
				'label' => 'Zip code'
			)
		); ?>
	</div>
</div>	
<div class="row">
	<div class="column column12">

			<?php
		echo $this->Form->input('country');
		echo $this->Form->input('other_details');
		echo $this->Form->input(
			'phone',
			array(
				'label' => 'Phone Number'
			)
		);
	?>
<?php echo $this->Form->end(__('Submit')); ?>

	
	</div>
</div>
