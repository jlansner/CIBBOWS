		<?php $img = $this->requestAction('homepage_slideshows/homepage_slideshow/'); ?>
		<img src="/img/homepageSlideshow/<?php echo $img['HomepageSlideshow']['filename']; ?>" />
<?php if ($img['User']['id']) { ?>
	<p class="homepagePhotoCaption">
		Photo by
<?php echo $this->Html->link(
	$img['User']['name'],
	array(
		'controller' => 'users',
		'action' => 'view',
		$img['User']['id']
	)
); ?>		
	</p> 
<?php } ?>
