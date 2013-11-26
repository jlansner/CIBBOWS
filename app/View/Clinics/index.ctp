<h1>Clinics</h1>

<?php foreach ($clinics as $clinic): ?>
	<h2><?php echo $this->Html->link($clinic['Clinic']['title'],
array('controller' => 'clinics', 'action' => 'view', substr($clinic['Clinic']['date'],0,4), $clinic['Clinic']['url_title'])); ?></h2>

	<p><?php echo $this->Time->format('F j, Y', $clinic['Clinic']['date']); ?></p>
	<hr>
<?php endforeach; ?>
