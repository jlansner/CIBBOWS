<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('title');
?>
<div class="input checkbox required">
<?php
		echo $this->Form->label('Anonymous');
		echo $this->Form->input(
			'anonymous',
			array(
				'div' => false,
				'label' => false
			)
		);
?>
</div>
<?php
		echo $this->Form->input(
			'body',
			array(
//				'required' => false,
				'class' => 'ckeditor',
				'label' => ''
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
