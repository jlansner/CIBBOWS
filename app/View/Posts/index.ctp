<h1>Blog posts</h1>

    <?php foreach ($posts as $post): ?>
    <h2><?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', substr($post['Post']['posted'],0,4), substr($post['Post']['posted'],5,2), substr($post['Post']['posted'],8,2), $post['Post']['url_title'])); ?></h2>

        <h3><?php echo $this->Time->nice($post['Post']['posted']); ?></h3>
        <p><?php echo $post['Post']['body']; ?></p>
    <hr>
    <?php endforeach; ?>
    <?php unset($post); ?>
    
<?php 
 if ($this->Paginator->hasPrev()){
       echo $this->Paginator->prev(
	  ' << Newer Posts'
	);
}

 if ($this->Paginator->hasNext()){
	echo $this->Paginator->next(
	  'Older Posts >> '
	);
 }
 ?>
