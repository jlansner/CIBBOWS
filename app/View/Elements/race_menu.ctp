<ul class="raceNav">
<?php if ($this->params['controller'] == "races") { ?>
	<li class="active">Overview</li>
<?php } else { ?>
	<li>
		<?php echo $this->Html->link(
			'Overview',
			array(
				'controller' => 'races',
				'action' => 'view',
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title']
			)
		); ?>
		</li>
<?php } ?>

<?php if ($this->params['controller'] == "race_registrations") { ?>
	<li class="active">Registered Swimmers</li>
<?php } else { ?>
 	<li>
 		<?php echo $this->Html->link(
			'Registered Swimmers',
			array(
				'controller' => 'race_registrations',
				'action' => 'view',
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title']
			)
		); ?>
 	</li>
<?php } ?>

<?php if ($this->params['controller'] == "results") { ?>
	<li class="active">Results</li>
<?php } else { ?>
 	<li>
 		<?php echo $this->Html->link(
			'Results',
			array(
				'controller' => 'results',
				'action' => 'view',
				'url_title' => $race['Series']['url_title']
			)
		); ?>
 	</li>
<?php } ?>

<?php if ($this->params['controller'] == "volunteer_registrations") { ?>
	<li class="active">Registered Volunteers</li>
<?php } else { ?>
 	<li>
 		<?php echo $this->Html->link(
			'Registered Volunteers',
			array(
				'controller' => 'volunteer_registrations',
				'action' => 'view',
				'year' => substr($race['Race']['date'],0,4),
				'url_title' => $race['Race']['url_title']
			)
		); ?>
 	</li>
<?php } ?>
</ul>
<br class="clear" />