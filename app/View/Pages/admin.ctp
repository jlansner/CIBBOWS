<div class="row">
	<div class="column column12">
		<h1>Admin</h1>
		
		<h2>Contents</h2>
		<p><?php
		
		echo $this->Html->link(
			'Pages',
			array(
				'controller' => 'contents',
				'action' => 'index',
				'admin' => true
			)
		);
		?></p>
		
		
		<p><?php
		
		echo $this->Html->link(
			'Posts',
			array(
				'controller' => 'posts',
				'action' => 'index',
				'admin' => true
			)
		);
		?></p>
		
		
		<h2>Races</h2>

    <p>
      <?php

		echo $this->Html->link(
			'Add New Race',
			array(
				'controller' => 'races',
				'action' => 'add',
				'admin' => false
			)
		);
		?>
    </p>

    <p><?php

		echo $this->Html->link(
			'Grant Waivers to Underage Swimmers',
			array(
				'controller' => 'age_waivers',
				'action' => 'index',
				'admin' => true
			)
		);
		?></p>

    <p>
      <?php

		echo $this->Html->link(
			'Create Discount Code',
			array(
				'controller' => 'discounts',
				'action' => 'add',
				'admin' => false
			)
		);
		?>
    </p>

    <p>
      <?php

		echo $this->Html->link(
			'Assign Discount Code to User',
			array(
				'controller' => 'discount_assignments',
				'action' => 'add',
				'admin' => false
			)
		);
		?>
    </p>

    <p><?php

				echo $this->Html->link(
			'Approve Qualifying Races',
			array(
				'controller' => 'qualifying_races',
				'action' => 'view_pending'
			)
		);
		?></p>

<h2>Events</h2>

		<p>
			<?php 
			echo $this->Html->link(
				'Event List',
				array(
					'controller' => 'events',
					'action' => 'index',
					'admin' => true
				)
			);
			?>
		</p>
    <p>
      <?php

		echo $this->Html->link(
			'Add New Event',
			array(
				'controller' => 'events',
				'action' => 'add',
				'admin' => false
			)
		);
		?>
    </p>
		
		<h2>Users</h2>
		<p>
			<?php 
			echo $this->Html->link(
				'Membership List',
				array(
					'controller' => 'memberships',
					'action' => 'index',
					'admin' => true
				)
			);
			?>
		</p>
	</div>
</div>