<h2>Clinics</h2>
<ul>
<?php

$clinics = $this->requestAction('clinics/homepage_clinics/');

foreach ($clinics as $clinic): ?>
    <li>
<?php
echo $this->Html->link(
		$clinic['Clinic']['title'],
		array(
			'controller' => 'clinics',
			'action' => 'view',
			'year' => substr($clinic['Clinic']['date'],0,4),
			'month' => substr($clinic['Clinic']['date'],5,2),
			'day' => substr($clinic['Clinic']['date'],8,2),
			'url_title' => $clinic['Clinic']['url_title']));
 ?><br />

	<span class="dateLine"><?php echo $this->Time->format('F j, Y', $clinic['Clinic']['date']); ?></span></li>

<?php endforeach; ?>
<?php unset($post); ?>
</ul>

<p><?php
echo $this->Html->link(
	'See all clinics',
	array(
		'controller' => 'clinics',
		'action' => 'index'
	)
);
?></p>