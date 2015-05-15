<div class="boardMembers form">
<?php echo $this->Form->create('BoardMember'); ?>
	<fieldset>
		<legend><?php echo __('Add Board Member'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input(
			'board_title_id',
			array(
				'empty' => ''				
			)
		);
		echo $this->Form->input('board_level_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
