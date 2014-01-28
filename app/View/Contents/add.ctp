<div class="row">
	<div class="column column12">	
<?php echo $this->Form->create('Content'); ?>
	<fieldset>
		<legend>Add New Page</legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input(
			'body',
			array(
//				'required' => false,
				'class' => 'ckeditor'
			)
		);
		echo $this->Form->input(
			'in_menu',
			array(
				'label' => 'Include in Menu'
			)
		);
		echo $this->Form->input(
			'membership_level_id',
			array(
				'label' => 'Membership Requirement',
				'empty' => 'No Requirement'
			)
		);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</div>