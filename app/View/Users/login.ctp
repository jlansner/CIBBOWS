<div class="row">
	<div class="column column12">
<?php

echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => __('Login'),
    'email',
    'password'
));
?>
<label></label>
<?php
echo $this->Html->link('Forgot your password?', array('controller' => 'users', 'action' => 'forgot_password')); ?>

<p>
	
<?php echo $this->Html->link(
	'Create an account',
	array(
		'controller' => 'users',
		'action' => 'register'
	)
); ?>
</p>

<?php echo $this->Form->end('Login'); ?>
</div>
</div>