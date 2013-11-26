<div class="sponsors form">
<?php echo $this->Form->create('Sponsor'); ?>
	<fieldset>
		<legend><?php echo __('Add Sponsor'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('url');
		echo $this->Form->input('logo');
		echo $this->Form->input('logo_size_id');
		echo $this->Form->input('rank');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sponsors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Logo Sizes'), array('controller' => 'logo_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Logo Size'), array('controller' => 'logo_sizes', 'action' => 'add')); ?> </li>
	</ul>
</div>
