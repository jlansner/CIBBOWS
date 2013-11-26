<div class="clinicFees view">
<h2><?php  echo __('Clinic Fee'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clinicFee['ClinicFee']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clinic'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clinicFee['Clinic']['title'], array('controller' => 'clinics', 'action' => 'view', $clinicFee['Clinic']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($clinicFee['ClinicFee']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($clinicFee['ClinicFee']['end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($clinicFee['ClinicFee']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Priority'); ?></dt>
		<dd>
			<?php echo h($clinicFee['ClinicFee']['priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Membership Level'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clinicFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $clinicFee['MembershipLevel']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clinicFee['ClinicFee']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clinicFee['ClinicFee']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Clinic Fee'), array('action' => 'edit', $clinicFee['ClinicFee']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Clinic Fee'), array('action' => 'delete', $clinicFee['ClinicFee']['id']), null, __('Are you sure you want to delete # %s?', $clinicFee['ClinicFee']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinic Fees'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic Fee'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
