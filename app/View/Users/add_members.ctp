<div class="row">
	<div class="column column12">
<?php

echo $this->Form->create('User');
echo $this->Form->input(
	'members',
	array(
		'type' => 'textarea'
	)		
); 
echo $this->Form->end(
	array(
		'label' => 'Add Members'
	)
);
?>

	</div>
</div>