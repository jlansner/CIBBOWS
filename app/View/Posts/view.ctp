<h1><?php echo h($post['Post']['title']); ?></h1>

<p>Posted <?php echo $this->Time->nice($post['Post']['posted']); ?>
<?php

if ($post['Post']['anonymous'] == 0) {
	echo " by " . $this->Html->link($post['User']['first_name'] . " " . $post['User']['last_name'],
 array('controller' => 'users', 'action' => 'view', $post['User']['id']));
}
?>
</p>

<p><?php echo $post['Post']['body']; ?></p>