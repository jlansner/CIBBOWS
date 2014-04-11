<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		CIBBOWS:
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php
//		echo $this->Html->meta('icon');
//		echo $this->Html->css('cake.generic');
		echo $this->Html->css('font-awesome/css/font-awesome.min');
		echo $this->Html->css('//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
		echo $this->Html->css('cibbows');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js');
		echo $this->Html->script('cibbows');
	?>
	<script type="text/javascript" src="//use.typekit.net/qsk8gya.js"></script>
	<script type="text/javascript">
	 try {
	   Typekit.load({
	     loading: function() {
	       // Javascript to execute when fonts start loading
	     },
	     active: function() {
	     //  adjustWidth(); // Javascript to execute when fonts become active
	     },
	     inactive: function() {
	       // Javascript to execute when fonts become inactive
	     }
	   })
	 } catch(e) {}
	 </script>
	<?php
	if ((substr($this->request->action,0,3) == "add") || ($this->request->action == "edit")) {
		echo $this->Html->script('ckeditor/ckeditor');
	}
	?>
	<!-- 
		Website built and maintained by Jesse Lansner. For more information, check out http://lansner.com
	-->
</head>
<body>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44059902-1', 'cibbows.org');
  ga('send', 'pageview');

</script>
<div id="container" class="container">
	<div class="header">
		<p class="headerLinks"><?php
		if (AuthComponent::user('id')) {
			echo /*"Welcome " . AuthComponent::user('first_name') . '(' .*/ $this->Html->link(
				'My Profile',
				array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'my_profile'
				)
			) . ' <i class="fa fa-star"></i> ';

			if ($userMembershipLevel == 0) {
				echo $this->html->Link(
					'Join CIBBOWS',
					array(
						'admin' => false,
						'controller' => 'memberships',
						'action' => 'join'
					)
				) . ' <i class="fa fa-star"></i> ';
			}

			echo $this->Html->link(
				'Logout',
				array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'logout'
				)
			); 
		} else {
			echo $this->Html->link(
				'Login',
				array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'login'
				)
			) . ' <i class="fa fa-star"></i> ' . $this->Html->link(
				'Create Account',
				array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'create_account'
				)
			); 
		}

		echo ' <i class="fa fa-star"></i> ' . $this->Html->link(
			'Donate',
			array(
				'admin' => false,
				'controller' => 'donations',
				'action' => 'donate'
			)
		);
?></p>
	<span class="phoneMenuLink" href="#"><i class="fa fa-bars"></i></span>
		<a href="/" class="headerHome"></a>
<div class="phoneMenu">
	<ul>
		<?php
		if (AuthComponent::user('id')) {
			echo "<li>" . $this->Html->link(
				'My Profile',
				array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'my_profile'
				)
			) . '</li>';

			if ($userMembershipLevel == 0) {
				echo '<li>' . $this->html->Link(
					'Join CIBBOWS',
					array(
						'admin' => false,
						'controller' => 'memberships',
						'action' => 'join'
					)
				) . ' </li>';
			}

			echo '<li>' . $this->Html->link(
				'Logout',
				array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'logout'
				)
			) . '</li>'; 
		} else {
			echo '<li>' . $this->Html->link(
				'Login',
				array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'login'
				)
			) . '</li>
			<li>' . $this->Html->link(
				'Create Account',
				array(
					'admin' => false,
					'controller' => 'users',
					'action' => 'create_account'
				)
			) . '</li>'; 
		}

		echo '<li>' . $this->Html->link(
			'Donate',
			array(
				'admin' => false,
				'controller' => 'donations',
				'action' => 'donate'
			)
		) . '</li>';
?>
</ul>
			<?php echo $this->element('menu'); ?>

</div>
	</div>
	<div class="contentWrapper">
		<div class="leftNav">
			<?php echo $this->element('menu'); ?>
		</div>
		
		<div class="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<br class="clear" />
	</div>
	<br class="clear" />
	<div class="footer">
		<div class="smIcons">
			<a href="http://twitter.com/cibbows" target="_blank"><i class="fa fa-twitter-square"></i></a>
			<a href="http://facebook.com/cibbows" target="_blank"><i class="fa fa-facebook-square"></i></a>
			<a href="http://vimeo.com/channels/586906" target="_blank"><i class="fa fa-vimeo-square"></i></a>
			<a href="http://www.flickr.com/photos/cibbows/" target="_blank"><i class="fa fa-flickr"></i></a>
		</div>
		
		<p class="right">&copy; <?php echo date('Y'); ?> CIBBOWS</p>
	</div>
</div>
</body>
</html>
