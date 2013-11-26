<div class="externalRaces view">
<h2><?php  echo __('External Race'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url Title'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['url_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($externalRace['ExternalRace']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit External Race'), array('action' => 'edit', $externalRace['ExternalRace']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete External Race'), array('action' => 'delete', $externalRace['ExternalRace']['id']), null, __('Are you sure you want to delete # %s?', $externalRace['ExternalRace']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List External Races'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New External Race'), array('action' => 'add')); ?> </li>
	</ul>
</div>
