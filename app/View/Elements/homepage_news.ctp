<h2><?php echo $this->Html->link(
	'News',
	array(
		'controller' => 'posts',
		'action' => 'index'
	)
);
?></h2>
<ul>
<?php

$posts = $this->requestAction('posts/homepage_news/');

foreach ($posts as $post): ?>
    <li><?php
echo $this->Html->link(
	$post['Post']['title'],
	array(
		'controller' => 'posts',
		'action' => 'view',
		'year' => substr($post['Post']['posted'],0,4),
		'month' => substr($post['Post']['posted'],5,2),
		'day' => substr($post['Post']['posted'],8,2),
		'url_title' => $post['Post']['url_title']
	)
); ?><br />

	<span class="dateLine">Posted <?php echo $this->Time->timeAgoInWords(
		$post['Post']['posted'],
		array(
			'format' => 'F j, Y',
			'end' => '+1 week'
		)
	); ?></span></li>

<?php endforeach; ?>
<?php unset($post); ?>
</ul>