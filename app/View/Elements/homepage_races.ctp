<h2>Races</h2>
<ul>
<?php

$races = $this->requestAction('races/homepage_races/');

foreach ($races as $race): ?>
    <li>
		<?php
		echo $this->Html->link(
			$race['Race']['title'],
			array(
				'controller' => 'races',
				'action' => 'view',
				'year' => substr($race['Race']['date'], 0, 4),
				'url_title' => $race['Race']['url_title']
			)
		);
 ?><br />

	<span class="dateLine"><?php 
echo $this -> Time -> format('F j, Y', $race['Race']['date']);
		if (($race['Race']['end_date']) && ($race['Race']['date'] != $race['Race']['end_date'])) {
			echo ' &ndash; ' . $this -> Time -> format('F j, Y', $race['Race']['end_date']);
		}
			?></span></li>

<?php endforeach; ?>
<?php unset($races); ?>
</ul>

<p><?php
echo $this->Html->link(
	'See all races',
	array(
		'controller' => 'races',
		'action' => 'index'
	)
);
?></p>

