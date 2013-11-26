<div class="testSwimRegistrations view">
<h2><?php  echo __('Test Swim Registration'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($testSwimRegistration['TestSwimRegistration']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwimRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $testSwimRegistration['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Test Swim'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwimRegistration['TestSwim']['title'], array('controller' => 'test_swims', 'action' => 'view', $testSwimRegistration['TestSwim']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($testSwimRegistration['TestSwimRegistration']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($testSwimRegistration['TestSwimRegistration']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwimRegistration['Gender']['title'], array('controller' => 'genders', 'action' => 'view', $testSwimRegistration['Gender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qualifying Swim'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwimRegistration['QualifyingSwim']['id'], array('controller' => 'qualifying_swims', 'action' => 'view', $testSwimRegistration['QualifyingSwim']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qualifying Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwimRegistration['QualifyingRace']['title'], array('controller' => 'qualifying_races', 'action' => 'view', $testSwimRegistration['QualifyingRace']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testSwimRegistration['Result']['id'], array('controller' => 'results', 'action' => 'view', $testSwimRegistration['Result']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment'); ?></dt>
		<dd>
			<?php echo h($testSwimRegistration['TestSwimRegistration']['payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($testSwimRegistration['TestSwimRegistration']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($testSwimRegistration['TestSwimRegistration']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($testSwimRegistration['TestSwimRegistration']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Test Swim Registration'), array('action' => 'edit', $testSwimRegistration['TestSwimRegistration']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Test Swim Registration'), array('action' => 'delete', $testSwimRegistration['TestSwimRegistration']['id']), null, __('Are you sure you want to delete # %s?', $testSwimRegistration['TestSwimRegistration']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Registrations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Registration'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Genders'), array('controller' => 'genders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender'), array('controller' => 'genders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Swims'), array('controller' => 'qualifying_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Swim'), array('controller' => 'qualifying_swims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Qualifying Races'), array('controller' => 'qualifying_races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Qualifying Race'), array('controller' => 'qualifying_races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
	</ul>
</div>
