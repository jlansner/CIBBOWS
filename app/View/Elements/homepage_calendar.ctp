<h2>Calendar</h2>
<ul>
<?php

$posts = $this->requestAction('races/homepage_calendar/');

foreach ($posts as $post): ?>
    <li>
<?php
	if ($post[0]['type'] == 'clinics') {
		echo $this->Html->link(
			$post[0]['title'],
			array(
				'controller' => 'clinics',
				'action' => 'view',
				'year' => substr($post[0]['date'],0,4),
				'month' => substr($post[0]['date'],5,2),
				'day' => substr($post[0]['date'],8,2),
				'url_title' => $post[0]['url_title']
			)
		);
	} else {
		 echo $this->Html->link(
			$post[0]['title'],
			array(
				'controller' => $post[0]['type'],
				'action' => 'view',
				'year' => substr($post[0]['date'],0,4),
				'url_title' => $post[0]['url_title']
			)
		);
	}
 ?><br />

	<span class="dateLine"><?php 
	if ($post[0]['tentative_date']) {
		echo 'TBA';
	} else {
		echo $this->Time->format('F j, Y', $post[0]['date']);
	}
	?></span></li>

<?php endforeach; ?>
<?php unset($post); ?>
</ul>