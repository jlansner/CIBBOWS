<div class="row">
	<div class="column column12">
		<h1>Clinics</h1>

		<?php foreach ($clinics as $clinic): ?>
			<h2><?php echo $this->Html->link(
				$clinic['Clinic']['title'],
				array(
					'controller' => 'clinics',
					'action' => 'view',
					'year' => substr($clinic['Clinic']['date'],0,4),
					'month' => substr($clinic['Clinic']['date'],5,2),
					'day' => substr($clinic['Clinic']['date'],8,2),
					'url_title' => $clinic['Clinic']['url_title'])); ?></h2>

			<p><?php echo $this->Time->format('F j, Y', $clinic['Clinic']['date']); ?></p>
			<hr>
		<?php endforeach; ?>
	</div>
</div>