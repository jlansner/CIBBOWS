<ul class="raceNav">
<?php if ($this->params['controller'] == "events") { ?>
	<li class="active">Overview</li>
<?php } else { ?>
	<li>
		<?php echo $this->Html->link(
			'Overview',
			array(
				'controller' => 'events',
				'action' => 'view',
				'year' => substr($event['Event']['date'],0,4),
				'url_title' => $event['Event']['url_title']
			)
		); ?>
		</li>
<?php } ?>

<?php if ($this->params['controller'] == "event_registrations") { ?>
	<li class="active">Attendees</li>
<?php } else { ?>
 	<li>
 		<?php echo $this->Html->link(
			'Attendees',
			array(
				'controller' => 'event_registrations',
				'action' => 'view',
				'year' => substr($event['Event']['date'],0,4),
				'url_title' => $event['Event']['url_title']
			)
		); ?>
 	</li>
<?php } ?>

</ul>
<br class="clear" />