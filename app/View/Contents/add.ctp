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
		echo $this->Form->hidden(
			'in_menu',
			array(
				'value' => 1
			)
		);
		echo $this->Form->input(
			'menu_parent',
			array(
				'label' => 'Menu Section',
				'empty' => '-----'
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