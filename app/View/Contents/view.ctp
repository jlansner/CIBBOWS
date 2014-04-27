<div class="row">
	<div class="column column12">

<h1><?php echo $content['Content']['title']; ?></h1>

<?php if ($userMembershipLevel >= $content['Content']['membership_level_id']) { ?>

	<p><?php echo $content['Content']['body']; ?></p>
		
<?php } else { ?>
	
	<p>This page is for members only. 
		<?php
		
		if (AuthComponent::user('id')) { 
			
			echo $this->Html->link(
			'Become a member now',
			array(
				'controller' => 'memberships',
				'action' => 'join'
			)
		);?>.
			
		<?php } else {
			 echo $this->Html->link(
				'Login',
				array(
					'controller' => 'users',
					'action' => 'login'
				)
			); ?>
			
			to view this page or to join CIBBOWS. 
	<?php } ?></p>
		
<?php } ?>
</div>
	
</div>
