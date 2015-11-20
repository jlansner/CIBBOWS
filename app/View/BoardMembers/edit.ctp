<div class="boardMembers form">
<?php echo $this->Form->create('BoardMember'); ?>
	<fieldset>
		<legend><?php echo __('Edit Board Member'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input(
			'board_title_id',
			array(
				'empty' => ''				
			)
		);
		echo $this->Form->input('board_level_id');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BoardMember.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BoardMember.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Board Members'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
