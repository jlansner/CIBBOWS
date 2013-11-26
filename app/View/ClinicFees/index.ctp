<div class="clinicFees index">
	<h2><?php echo __('Clinic Fees'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('clinic_id'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('priority'); ?></th>
			<th><?php echo $this->Paginator->sort('membership_level_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($clinicFees as $clinicFee): ?>
	<tr>
		<td><?php echo h($clinicFee['ClinicFee']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clinicFee['Clinic']['title'], array('controller' => 'clinics', 'action' => 'view', $clinicFee['Clinic']['id'])); ?>
		</td>
		<td><?php echo h($clinicFee['ClinicFee']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($clinicFee['ClinicFee']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($clinicFee['ClinicFee']['price']); ?>&nbsp;</td>
		<td><?php echo h($clinicFee['ClinicFee']['priority']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clinicFee['MembershipLevel']['title'], array('controller' => 'membership_levels', 'action' => 'view', $clinicFee['MembershipLevel']['id'])); ?>
		</td>
		<td><?php echo h($clinicFee['ClinicFee']['created']); ?>&nbsp;</td>
		<td><?php echo h($clinicFee['ClinicFee']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clinicFee['ClinicFee']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clinicFee['ClinicFee']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clinicFee['ClinicFee']['id']), null, __('Are you sure you want to delete # %s?', $clinicFee['ClinicFee']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Clinic Fee'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clinics'), array('controller' => 'clinics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clinic'), array('controller' => 'clinics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Membership Levels'), array('controller' => 'membership_levels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Membership Level'), array('controller' => 'membership_levels', 'action' => 'add')); ?> </li>
	</ul>
</div>
