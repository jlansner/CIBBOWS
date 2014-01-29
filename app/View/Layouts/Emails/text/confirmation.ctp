Please click on the link below to confirm your account:

<?php echo $this->Html->url(
	array(
		'controller' => 'users',
		'action' => 'confirm',
		'string' => $encrypted,
		'full_base' => true
	)
); ?>