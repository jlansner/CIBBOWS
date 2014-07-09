<div class="row">
	<div class="column column12">
<?php

echo $this->Form->create('Result');

echo $this->Form->input(
	'race_id'
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