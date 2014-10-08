<div class="row">
	<div class="column column12">
<?php echo $this->Form->create('Series'); ?>
	<fieldset>
		<legend><?php echo __('Edit Series'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('active');
		echo $this->Form->input(
			'in_menu',
			array(
				'label' => 'Include in Menu'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>