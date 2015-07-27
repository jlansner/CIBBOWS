<div class="row">
	<div class="column column12">
		
		<p>NOTE: Remember to include race number in the URL. Field names go in the first line of the CSV, and must include race_number, place, time, first_name, last_name, gender, and age. CSV should be in time order.

			</p>
<?php

echo $this->Form->create('Result');

echo $this->Form->input(
	'child_race_id'
);

echo $this->Form->input(
	'wetsuit',
	array(
		'type' => 'checkbox'
	)
);

echo $this->Form->input(
	'results',
	array(
		'type' => 'textarea'
	)		
); 
echo $this->Form->end(
	array(
		'label' => 'Add Results'
	)
);

?>

<pre>
<?php var_export($result); ?>
</pre>
	</div>
</div>