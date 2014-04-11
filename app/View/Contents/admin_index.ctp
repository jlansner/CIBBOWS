<div class="row">
	<div class="column column12">	
		<h1>Contents</h1>
		
		<p><?php
		echo $this->Html->link(
			'Add New Page',
			array(
				'admin' => false,
				'controller' => 'contents',
				'action' => 'add'
			)
		);
		?></p>
		
		<h2>Active Pages</h2>
		<table class="zebraTable">
		<tr>
				<th>Title</th>
				<th>Creator</th>
				<th>Created</th>
				<th>Modified</th>
				
				<th class="actions">Actions</th>
		</tr>
		<?php foreach ($contents as $content): ?>
		<tr>
			<td><?php echo $this->Html->link(
				$content['Content']['title'],
				array(
					'admin' => false,
					'controller' => 'contents',
					'action' => 'view',
					'url_title' => $content['Content']['url_title']
				)
			); ?></td>
			<td>
				<?php echo $this->Html->link(
					$content['User']['name'], 
					array(
						'admin' => false,
						'controller' => 'users',
						'action' => 'view',
						$content['User']['id']
					)
				); ?>
			</td>
			<td><?php echo $this->Time->format(
				'm/d/y',
				$content['Content']['created']
			); ?></td>
			<td><?php echo $this->Time->format(
				'm/d/y',
				$content['Content']['modified']
			); ?></td>
			<td class="actions">
				<?php // echo $this->Html->link(__('View'), array('action' => 'view', $content['Content']['id'])); ?>
				<?php echo $this->Html->link(
					'Edit',
					array(
						'admin' => false,
						'action' => 'edit',
						$content['Content']['id']
					)
				); ?> | 
				<?php echo $this->Form->postLink(
					'Delete',
					array(
						'admin' => false,
						'action' => 'delete',
						$content['Content']['id']
					),
					null,
					'Are you sure you want to delete "' . $content['Content']['title'] . '"?'
				); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>


		<h2>Deleted Pages</h2>
		<table class="zebraTable">
		<tr>
				<th>Title</th>
				<th>Creator</th>
				<th>Created</th>
				<th>Modified</th>
				
				<th class="actions">Actions</th>
		</tr>
		<?php foreach ($deletedContents as $content): ?>
		<tr>
			<td><?php echo $this->Html->link(
				$content['Content']['title'],
				array(
					'admin' => false,
					'controller' => 'contents',
					'action' => 'view',
					'url_title' => $content['Content']['url_title']
				)
			); ?></td>
			<td>
				<?php echo $this->Html->link(
					$content['User']['name'], 
					array(
						'admin' => false,
						'controller' => 'users',
						'action' => 'view',
						$content['User']['id']
					)
				); ?>
			</td>
			<td><?php echo $this->Time->format(
				'm/d/y',
				$content['Content']['created']
			); ?></td>
			<td><?php echo $this->Time->format(
				'm/d/y',
				$content['Content']['modified']
			); ?></td>
			<td class="actions">
				<?php // echo $this->Html->link(__('View'), array('action' => 'view', $content['Content']['id'])); ?>
				<?php echo $this->Html->link(
					'Edit',
					array(
						'admin' => false,
						'action' => 'edit',
						$content['Content']['id']
					)
				); ?> | 
				<?php echo $this->Form->postLink(
					'Undelete',
					array(
						'admin' => false,
						'action' => 'undelete',
						$content['Content']['id']
					),
					null,
					'Are you sure you want to restore "' . $content['Content']['title'] . '"?'
				); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>

	</div>
</div>
