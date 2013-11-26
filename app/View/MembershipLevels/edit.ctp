<div class="membershipLevels form">
<?php echo $this->Form->create('MembershipLevel'); ?>
	<fieldset>
		<legend><?php echo __('Edit Membership Level'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MembershipLevel.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MembershipLevel.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clinic Fees'), array('controller' => 'clinic_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Fee'), array('controller' => 'clinic_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Fees'), array('controller' => 'membership_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Fee'), array('controller' => 'membership_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Memberships'), array('controller' => 'memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership'), array('controller' => 'memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Race Fees'), array('controller' => 'race_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race Fee'), array('controller' => 'race_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Races'), array('controller' => 'races', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Race'), array('controller' => 'races', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swim Fees'), array('controller' => 'test_swim_fees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim Fee'), array('controller' => 'test_swim_fees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Test Swims'), array('controller' => 'test_swims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test Swim'), array('controller' => 'test_swims', 'action' => 'add')); ?> </li>
	</ul>
</div>
