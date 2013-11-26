<div class="clinicRegistrations view">
<h2><?php  echo __('Clinic Registration'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clinicRegistration['ClinicRegistration']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clinicRegistration['User']['name'], array('controller' => 'users', 'action' => 'view', $clinicRegistration['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clinic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clinicRegistration['Clinic']['title'], array('controller' => 'clinics', 'action' => 'view', $clinicRegistration['Clinic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($clinicRegistration['ClinicRegistration']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($clinicRegistration['ClinicRegistration']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clinicRegistration['Gender']['title'], array('controller' => 'genders', 'action' => 'view', $clinicRegistration['Gender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qualifying Swim'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clinicRegistration['QualifyingSwim']['id'], array('controller' => 'qualifying_swims', 'action' => 'view', $clinicRegistration['QualifyingSwim']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qualifying Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clinicRegistration['QualifyingRace']['title'], array('controller' => 'qualifying_races', 'action' => 'view', $clinicRegistration['QualifyingRace']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clinicRegistration['Result']['id'], array('controller' => 'results', 'action' => 'view', $clinicRegistration['Result']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payment'); ?></dt>
		<dd>
			<?php echo h($clinicRegistration['ClinicRegistration']['payment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved'); ?></dt>
		<dd>
			<?php echo h($clinicRegistration['ClinicRegistration']['approved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clinicRegistration['ClinicRegistration']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clinicRegistration['ClinicRegistration']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Clinic Registration'), array('action' => 'edit', $clinicRegistration['ClinicRegistration']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Clinic Registration'), array('action' => 'delete', $clinicRegistration['ClinicRegistration']['id']), null, __('Are you sure you want to delete # %s?', $clinicRegistration['ClinicRegistration']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinic Registrations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Registration'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
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
