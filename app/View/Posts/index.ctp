<div class="row">
	<div class="column column12">
<h1>NEWS</h1>

    <?php foreach ($posts as $post): ?>
    <h2><?php
echo $this->Html->link(
	$post['Post']['title'],
	array(
		'controller' => 'posts',
		'action' => 'view',
		'year' => substr($post['Post']['posted'],0,4),
		'month' => substr($post['Post']['posted'],5,2),
		'day' => substr($post['Post']['posted'],8,2),
		'url_title' => $post['Post']['url_title']
	)
); ?></h2>

        <h3><?php echo $this->Time->nice($post['Post']['posted']); ?></h3>
        <p><?php echo $post['Post']['body']; ?></p>
    <hr>
    <?php endforeach; ?>
    <?php unset($post); ?>
    
<?php 

if ($this->Paginator->hasPrev()) {
		$prevpage = "";

	if ($this->Paginator->current() > 2) {
		$prevpage = $this->Paginator->current() - 1;
	}
       echo $this->Html->link(
		  ' << Newer Posts',
		  array(
	        'controller' => 'posts',
	        'action' => 'index',
	        'page' => $prevpage
	    )
	);
}

if ($this->Paginator->hasNext()) {
	echo $this->Html->link(
	  'Older Posts >> ',
	  array(
	        'controller' => 'posts',
	        'action' => 'index',
	        'page' => $this->Paginator->current() + 1	  	
	  )
	);
 }
 ?>
	</div>
</div>
