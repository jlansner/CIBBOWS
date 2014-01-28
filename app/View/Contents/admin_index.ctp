<div class="row">
	<div class="column column12">	
		<h2>Contents</h2>
		
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
		<table class="zebraTable">
		<tr>
				<th><?php echo $this->Paginator->sort('title'); ?></th>
				<th><?php echo $this->Paginator->sort(
					'user_id',
					'Creator'
				); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th><?php echo $this->Paginator->sort('modified'); ?></th>
				
				<th class="actions"><?php echo __('Actions'); ?></th>
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
				); ?>
				<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $content['Content']['id']), null, __('Are you sure you want to delete # %s?', $content['Content']['id'])); ?>
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
