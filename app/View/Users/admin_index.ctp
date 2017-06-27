<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table class="zebraTable">
	<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Name</th>
			<th>Gender</th>
			<th>DOB</th>
			<th>Group</th>
			<!--<th>activated</th>
			<th>synced</th>
			<th>activation_code</th>
			<th>Created</th>
			<th>Modified</th>-->
			<th>Password Reset</th>
			<th class="actions">Actions</th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<!--<td><?php echo h($user['User']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['middle_name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['last_name']); ?>&nbsp;</td>-->
		<td>
			<?php echo $this->Html->link($user['Gender']['title'], array('controller' => 'genders', 'action' => 'view', $user['Gender']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['dob']); ?>&nbsp;</td>

		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<!--<td><?php echo h($user['User']['activated']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['synced']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['activation_code']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>-->
		<td>https://cibbows.org/reset_password/<?php echo h($user['User']['activation_code'] . $user['User']['id']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(
				__('View'),
				array(
					'admin' => false,
					'action' => 'view',
					$user['User']['id']
				)
			); ?>
			<?php echo $this->Html->link(
				__('Edit'),
				array(
					'admin' => false,
					'action' => 'edit',
					$user['User']['id']
				)
			); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

</div>