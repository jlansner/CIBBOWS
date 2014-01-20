<div class="row">
	<div class="column column12">

<h1><?php echo $content['Content']['title']; ?></h1>

<?php if ($userMembershipLevel >= $content['Content']['membership_level_id']) { ?>

	<p><?php echo $content['Content']['body']; ?></p>
		
<?php } else { ?>
	
	<p>This page is for members only.</p>
		
<?php } ?>
</div>
	
</div>
