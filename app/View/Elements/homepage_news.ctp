<h2>News</h2>
<ul>
<?php

$posts = $this->requestAction('posts/homepage_news/');

foreach ($posts as $post): ?>
    <li><?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', substr($post['Post']['posted'],0,4), substr($post['Post']['posted'],5,2), substr($post['Post']['posted'],8,2), $post['Post']['url_title'])); ?><br />

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