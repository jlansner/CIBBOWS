<h2>Calendar</h2>
<ul>
<?php

$posts = $this->requestAction('races/homepage_calendar/');

foreach ($posts as $post): ?>
    <li>
<?php echo $this->Html->link(
	$post[0]['title'],
	array(
		'controller' => $post[0]['type'],
		'action' => 'view',
		'year' => substr($post[0]['date'],0,4),
		'url_title' => $post[0]['url_title']
	)
); ?><br />

	<span class="dateLine"><?php echo $this->Time->format('F j, Y', $post[0]['date']); ?></span></li>

<?php endforeach; ?>
<?php unset($post); ?>
</ul>