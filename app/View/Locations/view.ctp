<h1><?php echo h($location['Location']['title']); ?></h1>

<?php echo $location['Location']['body']; ?>

<?php $map = str_replace("&", "&amp;", $location['Location']['map_link']); ?>

<iframe class="mapFrame" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $map; ?>&amp;output=embed"></iframe><br /><small><a href="<?php echo $map; ?>" target="_blank" style="color:#0000FF;text-align:left">View Larger Map</a></small>