<div class="row">
	<div class="column column12">
		<h1>Login</h1>
	</div>
</div>

<div class="row">
	<div class="column column8">
<?php

echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->input('email');
echo $this->Form->input('password');
?>
<p>
<?php
echo $this->Html->link('Forgot your password?', array('controller' => 'users', 'action' => 'forgot_password')); ?>
</p>
<?php echo $this->Form->end('Login'); ?>
	</div>
	<div class="column column1">
		OR
	</div>
	<div class="column columm4">	
<?php echo $this->Html->link(
	'Create an account',
	array(
		'controller' => 'users',
		'action' => 'create_account'
	),
	array(
		'class' => 'linkButton'
	)
); ?>
		
	</div>
</div>