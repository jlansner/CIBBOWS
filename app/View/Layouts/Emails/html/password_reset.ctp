<h1 style="font-size: 24px; font-family: Arial, Helvetica, sans-serif;">Reset Password</h1>		

<p>Please click on the link below to reset your password:</p>

<blockquote style="background-color: #cfc; padding: 10px; text-align: center;"><a href="http://<?php echo env('HTTP_HOST'); ?>/users/reset_password/<?php echo $encrypted; ?>">Click here</a></blockquote>

<p>Or copy and paste the following link into your browser: http://<?php echo env('HTTP_HOST'); ?>/users/reset_password/<?php echo $encrypted; ?></p>
