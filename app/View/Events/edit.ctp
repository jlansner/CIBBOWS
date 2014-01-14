<div class="events form">
<?php echo $this->Form->create('Event'); ?>
	<fieldset>
		<legend><?php echo __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('date');
		echo $this->Form->input(
			'membership_level_id',
			array(
				'empty' => 'Non-Member'
			)
		);
		echo $this->Form->input(
			'teaser',
			array(
//				'required' => false,
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input(
			'body',
			array(
//				'required' => false,
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input(
			'location_id',
			array(
				'empty' => 'Other Location'
			)
		);
		echo $this->Form->input('place');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
