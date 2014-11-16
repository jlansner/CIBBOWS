<div class="row">
	<div class="column column12">
		<h1>Email All Members</h1>
		<?php
		
		echo $this->Form->create('Membership'); 
		echo $this->Form->input('subject');
		echo $this->Form->input(
			'body',
			array(
				'type' => 'textarea'
			)
		);
		echo $this->Form->end(__('Submit'));
		?>
	</div>
</div>
