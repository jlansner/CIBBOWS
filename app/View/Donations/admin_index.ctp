<div class="row">
	<div class="column column12">
		<h1>Donations</h1>
			<table class="zebraTable">
			<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Date</th>
					<th>Amount</th>
					<th>Note</th>
			</tr>
			<?php foreach ($donations as $donation): ?>
			<tr>
				<td><?php 
				if ($donation['Donation']['user_id']) {
				echo $this->Html->link(
					$donation['Donation']['first_name'] . ' ' . $donation['Donation']['last_name'],
					array(
						'action' => 'user',
						'controller' => 'view',
						$donation['Donation']['user_id']
					) 
				); } else {
					echo $donation['Donation']['first_name'] . ' ' . $donation['Donation']['last_name'];
				}
				?></td>
				<td><?php echo $donation['Donation']['email']; ?></td>
				<td><?php echo $donation['Donation']['date']; ?></td>
				<td>$<?php echo $donation['Donation']['amount']; ?></td>
				<td><?php echo $donation['Donation']['body']; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>