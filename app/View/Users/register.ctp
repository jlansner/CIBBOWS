<div class="row">
	<div class="column column12">
		<h1>Create An Account</h1>
		
		<p>You must have an account on the site in order to become a member of CIBBOWS, or to register for races and other events. Your account is free, and we will never share your information with anyone else.</p>
	</div>
</div>

<div class="row">
	<div class="column column8">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
//		echo $this->Form->input('middle_name');
		echo $this->Form->input('last_name');
/*		echo $this->Form->input('gender_id');
		echo $this->Form->input(
			'dob',
			array(
				'minYear' => date('Y') - 100,
				'maxYear' => date('Y'),
				'selected' => '1950-01-01'
			)
		); */
		echo $this->Form->input(
			'password',
			array(
				'placeholder' => 'Minimum 6 characters'
			)
		);
		echo $this->Form->input(
			'password2',
			array(
				'label' => 'Confirm Password',
				'type' => 'password'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
	</div>
	<div class="column column1">
		OR
	</div>
	<div class="column column3">
		<?php echo $this->Html->link(
			'Login',
			array(
				'controller' => 'users',
				'action' => 'login'
			),
			array(
				'class' => 'linkButton'
			)
		); ?>	

	</div>
</div>
