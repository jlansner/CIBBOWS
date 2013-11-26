<?php if ($admin) { ?>
<div class="row">
<h1>Admin</h1>

<h2>Posts</h2>

<ul>
	<li><?php

echo $this->Html->link(
	'New Post',
	array(
		'controller' => 'posts',
		'action' => 'add'
	)
);
?></li>

</ul>

<h2>Qualifying Races</h2>
<ul>
<li><?php
echo $this->Html->link(
	'Approve Qualifying Races',
	array(
		'controller' => 'qualifying_races',
		'action' => 'view_pending'
	)
);
?></li>
	
</p>
</div>

<?php } else {
	
} ?>
