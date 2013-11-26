<div class="logoSizes form">
<?php echo $this->Form->create('LogoSize'); ?>
	<fieldset>
		<legend><?php echo __('Edit Logo Size'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('LogoSize.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('LogoSize.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Logo Sizes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sponsors'), array('controller' => 'sponsors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor'), array('controller' => 'sponsors', 'action' => 'add')); ?> </li>
	</ul>
</div>
