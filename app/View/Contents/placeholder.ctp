<div class="row">
	<div class="column column12">
	<?php foreach ($contents as $content): ?>
		<p><?php
			echo $this->Html->link(
				$content['Content']['title'],
				array(
					'controller' => 'contents',
					'action' => 'view',
					'url_title' => $content['Content']['url_title']
				)
			);
		?></p>
<?php endforeach; ?>		
	</div>
</div>
