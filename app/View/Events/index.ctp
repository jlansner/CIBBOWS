<h1>Events</h1>

    <?php foreach ($events as $event): ?>
    <h2><?php echo $this->Html->link($event['Event']['title'],
array('controller' => 'events', 'action' => 'view', substr($event['Event']['date'],0,4), $event['Event']['url_title'])); ?></h2>

        <p><?php echo $this->Time->format('F j, Y', $event['Event']['date']); ?></p>
    <hr>
    <?php endforeach; ?>
