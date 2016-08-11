<div class="discounts form">
<?php echo $this->Form->create(
	'Discount',
	array(
		'url' => array(
			'controller' => 'discounts',
			'action' => 'add',
			'id' => null			
		)
	)	
); ?>
	<fieldset>
		<legend><?php echo __('Add Discount'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('discount_type_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('race_id');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>