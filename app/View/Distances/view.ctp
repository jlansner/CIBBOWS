<div class="distances view">
<h2><?php  echo __('Distance'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($distance['Distance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unit'); ?></dt>
		<dd>
			<?php echo h($distance['Distance']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plural'); ?></dt>
		<dd>
			<?php echo h($distance['Distance']['plural']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abbreviation'); ?></dt>
		<dd>
			<?php echo h($distance['Distance']['abbreviation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meters'); ?></dt>
		<dd>
			<?php echo h($distance['Distance']['meters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($distance['Distance']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($distance['Distance']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Distance'), array('action' => 'edit', $distance['Distance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Distance'), array('action' => 'delete', $distance['Distance']['id']), null, __('Are you sure you want to delete # %s?', $distance['Distance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Distances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Distance'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Experiences'), array('controller' => 'experiences', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Experience'), array('controller' => 'experiences', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Races'), array('controller' => 'qualifying_races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Race'), array('controller' => 'qualifying_races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Swims'), array('controller' => 'qualifying_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Swim'), array('controller' => 'qualifying_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Experiences'); ?></h3>
	<?php if (!empty($distance['Experience'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Distance Id'); ?></th>
		<th><?php echo __('Meters'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($distance['Experience'] as $experience): ?>
		<tr>
			<td><?php echo $experience['id']; ?></td>
			<td><?php echo $experience['distance']; ?></td>
			<td><?php echo $experience['distance_id']; ?></td>
			<td><?php echo $experience['meters']; ?></td>
			<td><?php echo $experience['created']; ?></td>
			<td><?php echo $experience['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'experiences', 'action' => 'view', $experience['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'experiences', 'action' => 'edit', $experience['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'experiences', 'action' => 'delete', $experience['id']), null, __('Are you sure you want to delete # %s?', $experience['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Experience'), array('controller' => 'experiences', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Qualifying Races'); ?></h3>
	<?php if (!empty($distance['QualifyingRace'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Distance Id'); ?></th>
		<th><?php echo __('Meters'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($distance['QualifyingRace'] as $qualifyingRace): ?>
		<tr>
			<td><?php echo $qualifyingRace['id']; ?></td>
			<td><?php echo $qualifyingRace['user_id']; ?></td>
			<td><?php echo $qualifyingRace['title']; ?></td>
			<td><?php echo $qualifyingRace['date']; ?></td>
			<td><?php echo $qualifyingRace['url']; ?></td>
			<td><?php echo $qualifyingRace['distance']; ?></td>
			<td><?php echo $qualifyingRace['distance_id']; ?></td>
			<td><?php echo $qualifyingRace['meters']; ?></td>
			<td><?php echo $qualifyingRace['approved']; ?></td>
			<td><?php echo $qualifyingRace['created']; ?></td>
			<td><?php echo $qualifyingRace['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'qualifying_races', 'action' => 'view', $qualifyingRace['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'qualifying_races', 'action' => 'edit', $qualifyingRace['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'qualifying_races', 'action' => 'delete', $qualifyingRace['id']), null, __('Are you sure you want to delete # %s?', $qualifyingRace['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Qualifying Race'), array('controller' => 'qualifying_races', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Qualifying Swims'); ?></h3>
	<?php if (!empty($distance['QualifyingSwim'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Distance Id'); ?></th>
		<th><?php echo __('Meters'); ?></th>
		<th><?php echo __('Certification'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($distance['QualifyingSwim'] as $qualifyingSwim): ?>
		<tr>
			<td><?php echo $qualifyingSwim['id']; ?></td>
			<td><?php echo $qualifyingSwim['user_id']; ?></td>
			<td><?php echo $qualifyingSwim['date']; ?></td>
			<td><?php echo $qualifyingSwim['url']; ?></td>
			<td><?php echo $qualifyingSwim['distance']; ?></td>
			<td><?php echo $qualifyingSwim['distance_id']; ?></td>
			<td><?php echo $qualifyingSwim['meters']; ?></td>
			<td><?php echo $qualifyingSwim['certification']; ?></td>
			<td><?php echo $qualifyingSwim['approved']; ?></td>
			<td><?php echo $qualifyingSwim['created']; ?></td>
			<td><?php echo $qualifyingSwim['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'qualifying_swims', 'action' => 'view', $qualifyingSwim['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'qualifying_swims', 'action' => 'edit', $qualifyingSwim['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'qualifying_swims', 'action' => 'delete', $qualifyingSwim['id']), null, __('Are you sure you want to delete # %s?', $qualifyingSwim['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Qualifying Swim'), array('controller' => 'qualifying_swims', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Races'); ?></h3>
	<?php if (!empty($distance['Race'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Title'); ?></th>
		<th><?php echo __('Series Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Checkin Start Time'); ?></th>
		<th><?php echo __('Checkin End Time'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Start Location'); ?></th>
		<th><?php echo __('End Location'); ?></th>
		<th><?php echo __('Checkin Location'); ?></th>
		<th><?php echo __('Postrace Location'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Minimum Age'); ?></th>
		<th><?php echo __('Max Swimmers'); ?></th>
		<th><?php echo __('Max Volunteers'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Course Map'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Distance Id'); ?></th>
		<th><?php echo __('Meters'); ?></th>
		<th><?php echo __('Experience Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($distance['Race'] as $race): ?>
		<tr>
			<td><?php echo $race['id']; ?></td>
			<td><?php echo $race['parent_id']; ?></td>
			<td><?php echo $race['user_id']; ?></td>
			<td><?php echo $race['title']; ?></td>
			<td><?php echo $race['url_title']; ?></td>
			<td><?php echo $race['series_id']; ?></td>
			<td><?php echo $race['date']; ?></td>
			<td><?php echo $race['checkin_start_time']; ?></td>
			<td><?php echo $race['checkin_end_time']; ?></td>
			<td><?php echo $race['start_time']; ?></td>
			<td><?php echo $race['end_time']; ?></td>
			<td><?php echo $race['start_location']; ?></td>
			<td><?php echo $race['end_location']; ?></td>
			<td><?php echo $race['checkin_location']; ?></td>
			<td><?php echo $race['postrace_location']; ?></td>
			<td><?php echo $race['membership_level_id']; ?></td>
			<td><?php echo $race['minimum_age']; ?></td>
			<td><?php echo $race['max_swimmers']; ?></td>
			<td><?php echo $race['max_volunteers']; ?></td>
			<td><?php echo $race['logo']; ?></td>
			<td><?php echo $race['course_map']; ?></td>
			<td><?php echo $race['body']; ?></td>
			<td><?php echo $race['distance']; ?></td>
			<td><?php echo $race['distance_id']; ?></td>
			<td><?php echo $race['meters']; ?></td>
			<td><?php echo $race['experience_id']; ?></td>
			<td><?php echo $race['created']; ?></td>
			<td><?php echo $race['modified']; ?></td>
			<td><?php echo $race['lft']; ?></td>
			<td><?php echo $race['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'races', 'action' => 'view', $race['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'races', 'action' => 'edit', $race['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'races', 'action' => 'delete', $race['id']), null, __('Are you sure you want to delete # %s?', $race['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Routes'); ?></h3>
	<?php if (!empty($distance['Route'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Title'); ?></th>
		<th><?php echo __('Start Location'); ?></th>
		<th><?php echo __('End Location'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Distance Id'); ?></th>
		<th><?php echo __('Meters'); ?></th>
		<th><?php echo __('Map'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($distance['Route'] as $route): ?>
		<tr>
			<td><?php echo $route['id']; ?></td>
			<td><?php echo $route['title']; ?></td>
			<td><?php echo $route['url_title']; ?></td>
			<td><?php echo $route['start_location']; ?></td>
			<td><?php echo $route['end_location']; ?></td>
			<td><?php echo $route['distance']; ?></td>
			<td><?php echo $route['distance_id']; ?></td>
			<td><?php echo $route['meters']; ?></td>
			<td><?php echo $route['map']; ?></td>
			<td><?php echo $route['created']; ?></td>
			<td><?php echo $route['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'routes', 'action' => 'view', $route['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'routes', 'action' => 'edit', $route['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'routes', 'action' => 'delete', $route['id']), null, __('Are you sure you want to delete # %s?', $route['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Test Swims'); ?></h3>
	<?php if (!empty($distance['TestSwim'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Title'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Start Location'); ?></th>
		<th><?php echo __('End Location'); ?></th>
		<th><?php echo __('Membership Level Id'); ?></th>
		<th><?php echo __('Max Swimmers'); ?></th>
		<th><?php echo __('Course Map'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Distance Id'); ?></th>
		<th><?php echo __('Meters'); ?></th>
		<th><?php echo __('Experience Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($distance['TestSwim'] as $testSwim): ?>
		<tr>
			<td><?php echo $testSwim['id']; ?></td>
			<td><?php echo $testSwim['title']; ?></td>
			<td><?php echo $testSwim['url_title']; ?></td>
			<td><?php echo $testSwim['user_id']; ?></td>
			<td><?php echo $testSwim['date']; ?></td>
			<td><?php echo $testSwim['start_time']; ?></td>
			<td><?php echo $testSwim['end_time']; ?></td>
			<td><?php echo $testSwim['start_location']; ?></td>
			<td><?php echo $testSwim['end_location']; ?></td>
			<td><?php echo $testSwim['membership_level_id']; ?></td>
			<td><?php echo $testSwim['max_swimmers']; ?></td>
			<td><?php echo $testSwim['course_map']; ?></td>
			<td><?php echo $testSwim['body']; ?></td>
			<td><?php echo $testSwim['distance']; ?></td>
			<td><?php echo $testSwim['distance_id']; ?></td>
			<td><?php echo $testSwim['meters']; ?></td>
			<td><?php echo $testSwim['experience_id']; ?></td>
			<td><?php echo $testSwim['created']; ?></td>
			<td><?php echo $testSwim['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'test_swims', 'action' => 'view', $testSwim['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'test_swims', 'action' => 'edit', $testSwim['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'test_swims', 'action' => 'delete', $testSwim['id']), null, __('Are you sure you want to delete # %s?', $testSwim['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
