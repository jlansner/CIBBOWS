<div class="sponsors form">
<?php echo $this->Form->create('Sponsor'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sponsor'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sponsor.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Sponsor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sponsors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Logo Sizes'), array('controller' => 'logo_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Logo Size'), array('controller' => 'logo_sizes', 'action' => 'add')); ?> </li>
	</ul>
</div>
