<div class="discounts form">
<?php echo $this->Form->create(
	'DiscountAssignment',
	array(
		'url' => array(
			'controller' => 'discount_assignments',
			'action' => 'add',
			'id' => null			
		)
	)	
); ?>
	<fieldset>
		<legend><?php echo __('Assign Discount'); ?></legend>
	<?php
		echo $this->Form->input('discount_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>