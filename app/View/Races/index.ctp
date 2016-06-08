<div class="row">
	<div class="column column12">
<h1>Races</h1>

<?php foreach ($races as $race): ?>
	<h2><?php echo $this -> Html -> link(
	$race['Race']['title'],
	array(
		'controller' => 'races',
		'action' => 'view',
		'year' => substr($race['Race']['date'], 0, 4),
		'url_title' => $race['Race']['url_title']
	)
	); ?></h2>

	<p>
		<?php echo $this -> Time -> format('F j, Y', $race['Race']['date']);
		if (($race['Race']['end_date']) && ($race['Race']['date'] != $race['Race']['end_date'])) {
			echo ' &ndash; ' . $this -> Time -> format('F j, Y', $race['Race']['end_date']);
		}
		?>
	</p>
	<hr>
<?php endforeach; ?>
</div>
</div>