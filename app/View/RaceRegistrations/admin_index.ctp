<div class="row">
	<div class="column column12">
	<h1>Race Registrations</h1>
	<table class="zebraTable">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('race_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('age'); ?></th>
			<th><?php echo $this->Paginator->sort('gender_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('qualifying_swim_id'); ?></th>
			<th><?php echo $this->Paginator->sort('qualifying_race_id'); ?></th>
			<th><?php echo $this->Paginator->sort('result_id'); ?></th>
			<th><?php echo $this->Paginator->sort('payment'); ?></th>
			<th><?php echo $this->Paginator->sort('approved'); ?></th>
			<th><?php echo $this->Paginator->sort('shirt_size_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($raceRegistrations as $raceRegistration): ?>
	<tr>
		<td><?php echo h($raceRegistration['RaceRegistration']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $raceRegistration['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['Race']['title'], array('controller' => 'races', 'action' => 'view', $raceRegistration['Race']['id'])); ?>
		</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['first_name']); ?> <?php echo h($raceRegistration['RaceRegistration']['last_name']); ?></td>
		<td><?php echo h($raceRegistration['RaceRegistration']['age']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['Gender']['title'], array('controller' => 'genders', 'action' => 'view', $raceRegistration['Gender']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['AgeGroup']['title'], array('controller' => 'age_groups', 'action' => 'view', $raceRegistration['AgeGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['QualifyingSwim']['id'], array('controller' => 'qualifying_swims', 'action' => 'view', $raceRegistration['QualifyingSwim']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['QualifyingRace']['title'], array('controller' => 'qualifying_races', 'action' => 'view', $raceRegistration['QualifyingRace']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['Result']['id'], array('controller' => 'results', 'action' => 'view', $raceRegistration['Result']['id'])); ?>
		</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['payment']); ?>&nbsp;</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['approved']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($raceRegistration['ShirtSize']['title'], array('controller' => 'shirt_sizes', 'action' => 'view', $raceRegistration['ShirtSize']['id'])); ?>
		</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['created']); ?>&nbsp;</td>
		<td><?php echo h($raceRegistration['RaceRegistration']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $raceRegistration['RaceRegistration']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $raceRegistration['RaceRegistration']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $raceRegistration['RaceRegistration']['id']), null, __('Are you sure you want to delete # %s?', $raceRegistration['RaceRegistration']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	</div>
</div>