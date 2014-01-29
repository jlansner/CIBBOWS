<h1 style="font-size: 24px; font-family: Arial, Helvetica, sans-serif;">Reset Password</h1>		

<p>Please click on the link below to reset your password:</p>

<blockquote style="background-color: #cfc; padding: 10px; text-align: center;"><?php

echo $this->Html->link(
	'Click here',
	array(
		'controller' => 'users',
		'action' => 'reset_password',
		$encrypted,
		'full_base' => true
	)
); ?></blockquote>

<p>Or copy and paste the following link into your browser: <?php echo $this->Html->url(
	array(
		'controller' => 'users',
		'action' => 'reset_password',
		$encrypted,
		'full_base' => true
	)
); ?></p>
