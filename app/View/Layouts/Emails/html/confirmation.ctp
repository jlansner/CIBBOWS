<h1 style="font-size: 24px; font-family: Arial, Helvetica, sans-serif;">Confirm Your Email</h1>		

<p>Please click on the link below to confirm your account:</p>

<blockquote style="background-color: #cfc; padding: 10px; text-align: center;"><?php echo $this->Html->link(
	'Click here',
	array(
		'controller' => 'users',
		'action' => 'confirm',
		'string' => $encrypted,
		'full_base' => true
	)
);
?></blockquote>

<p>Or copy and paste the following link into your browser: <?php echo $this->Html->url(
	array(
		'controller' => 'users',
		'action' => 'confirm',
		'string' => $encrypted,
		'full_base' => true
	)
); ?></p>