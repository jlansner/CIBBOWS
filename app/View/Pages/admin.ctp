<?php if ($admin) { ?>
<div class="row">
<h1>Admin</h1>

<h2>Contents</h2>
<p><?php

echo $this->Html->link(
	'Pages',
	array(
		'controller' => 'contents',
		'action' => 'index',
		'admin' => true
	)
);
?></p>


<p><?php

echo $this->Html->link(
	'Posts',
	array(
		'controller' => 'posts',
		'action' => 'index',
		'admin' => true
	)
);
?></p>


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
