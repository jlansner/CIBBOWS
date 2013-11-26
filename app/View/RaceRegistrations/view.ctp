<div class="raceRegistrations view">
<h2><?php  echo __('Race Registration'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($raceRegistration['RaceRegistration']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $raceRegistration['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceRegistration['Race']['title'], array('controller' => 'races', 'action' => 'view', $raceRegistration['Race']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($raceRegistration['RaceRegistration']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($raceRegistration['RaceRegistration']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceRegistration['Gender']['title'], array('controller' => 'genders', 'action' => 'view', $raceRegistration['Gender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceRegistration['AgeGroup']['title'], array('controller' => 'age_groups', 'action' => 'view', $raceRegistration['AgeGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qualifying Swim'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceRegistration['QualifyingSwim']['id'], array('controller' => 'qualifying_swims', 'action' => 'view', $raceRegistration['QualifyingSwim']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qualifying Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceRegistration['QualifyingRace']['title'], array('controller' => 'qualifying_races', 'action' => 'view', $raceRegistration['QualifyingRace']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceRegistration['Result']['id'], array('controller' => 'results', 'action' => 'view', $raceRegistration['Result']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment'); ?></dt>
		<dd>
			<?php echo h($raceRegistration['RaceRegistration']['payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($raceRegistration['RaceRegistration']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shirt Size'); ?></dt>
		<dd>
			<?php echo $this->Html->link($raceRegistration['ShirtSize']['title'], array('controller' => 'shirt_sizes', 'action' => 'view', $raceRegistration['ShirtSize']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($raceRegistration['RaceRegistration']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($raceRegistration['RaceRegistration']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Race Registration'), array('action' => 'edit', $raceRegistration['RaceRegistration']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Race Registration'), array('action' => 'delete', $raceRegistration['RaceRegistration']['id']), null, __('Are you sure you want to delete # %s?', $raceRegistration['RaceRegistration']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Registrations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Registration'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Age Groups'), array('controller' => 'age_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age Group'), array('controller' => 'age_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Swims'), array('controller' => 'qualifying_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Swim'), array('controller' => 'qualifying_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Races'), array('controller' => 'qualifying_races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Race'), array('controller' => 'qualifying_races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shirt Sizes'), array('controller' => 'shirt_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shirt Size'), array('controller' => 'shirt_sizes', 'action' => 'add')); ?> </li>
	</ul>
</div>
