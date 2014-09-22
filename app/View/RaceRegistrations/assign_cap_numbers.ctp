<div class="row">
	<div class="column column12">
<h1><?php echo $race['Race']['title']; ?></h1>
<h2>Registered Swimmers</h2>

<pre>
	<?php
	
				foreach ($race['RaceRegistration'] as $raceRegistration) {
				var_export($raceRegistration);
			}
	
	
	// var_export($race); ?>
	
</pre>
	</div>
</div>