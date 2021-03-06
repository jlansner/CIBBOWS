<div class="row">
	<div class="column column12">
	<h1>
		Memberships
		<?php if ($year > 0) {
			echo " &ndash; " . $year;
		} ?>
	</h1>
	
	<p>
		<?php echo $this->Html->link(
			'Email all members',
			array(
				'controller' => 'memberships',
				'action' => 'email_members',
				'admin' => false
			)
		); ?>
	</p>

	<p>Total number of members: <?php echo count($memberships); ?></p>
	<table class="zebraTable">
	<tr>
			<th>Member</th>
			<th>Email</th>
			<th>Membership Starts</th>
			<th>Membership Ends</th>
	</tr>
	<?php foreach ($memberships as $membership): ?>
	<tr>
		<td>
			<?php echo $this->Html->link(
				$membership['User']['name'],
				array(
					'controller' => 'users',
					'action' => 'view',
					'admin' => false,
					$membership['User']['id']
				)
			); ?>
		</td>
		<td>
			<?php if (substr($membership['User']['email'],0,5) == "_____") {
				echo substr($membership['User']['email'],5);				
			} else {			
				echo $membership['User']['email'];
			} ?>
		</td>
		<td><?php echo $this->Time->format(
			'm/j/Y',
			$membership['Membership']['start_date']
		); ?></td>
		<td><?php echo $this->Time->format(
			'm/j/Y',
			$membership['Membership']['end_date']
		); ?></td>

		<?php  if ($admin) { ?>
    <!-- <td> -->
			
			
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 'admin' => false, $membership['Membership']['id']), null, __('Are you sure you want to delete # %s?', $membership['Membership']['id'])); ?>
		<!-- </td> -->
    <?php } ?>	
		
		</tr>
<?php endforeach; ?>
	</table>

	</div>
</div>