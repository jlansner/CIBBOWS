<div class="row">
	<div class="column column12">	
		<h2>Contents</h2>
		
		<p><?php
		echo $this->Html->link(
			'Add New Blog Post',
			array(
				'admin' => false,
				'controller' => 'posts',
				'action' => 'add'
			)
		);
		?></p>
		<table class="zebraTable">
		<tr>
				<th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort(
					'user_id',
					'Creator'
				); ?></th>
				<th><?php echo $this->Paginator->sort('posted'); ?></th>
				
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($posts as $post): ?>
		<tr>
			<td><?php echo $this->Html->link(
				$post['Post']['title'],
				array(
					'admin' => false,
					'controller' => 'posts',
					'action' => 'view',
					'year' => substr($post['Post']['posted'],0,4),
					'month' => substr($post['Post']['posted'],5,2),
					'day' => substr($post['Post']['posted'],8,2),
					'url_title' => $post['Post']['url_title']
				)
			); ?></td>
			<td>
				<?php echo $this->Html->link(
					$post['User']['name'], 
					array(
						'admin' => false,
						'controller' => 'users',
						'action' => 'view',
						$post['User']['id']
					)
				); ?>
			</td>
			<td><?php echo $this->Time->format(
				'm/d/y h:m a',
				$post['Post']['posted']);
				?>
			</td>
			<td class="actions">
				<?php // echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
				<?php echo $this->Html->link(
					'Edit',
					array(
						'admin' => false,
						'action' => 'edit',
						$post['Post']['id']
					)
				); ?>
				<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), null, __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
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
		if ($this->Paginator->hasPrev()) {
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev'));
		}
		//	echo $this->Paginator->numbers(array('separator' => ''));
		
		if ($this->Paginator->hasNext()) {		
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next'));
		}
		?>
		</div>
	</div>
</div>
