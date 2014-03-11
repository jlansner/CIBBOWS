<ul class="navMenu">
<?php
$menuItems = $this->requestAction('contents/menu/');

foreach ($menuItems as $menuItem) { ?>
	<li>
	<?php if (isset($menuItem['SubContent']) && (is_array($menuItem['SubContent'])) && (count($menuItem['SubContent']) > 0)) {
		echo $this->Html->Link(
			$menuItem['Content']['title'],
			array(
				'admin' => false,
				'controller' => 'contents',
				'action' => 'view',
				'url_title' => $menuItem['Content']['url_title']
			),
			array('class' => 'showMenu')
		);

		if (
			(
				(isset($content))
				&&
				(
					($menuItem['Content']['permanent'] == $content['Content']['permanent'])
					||
					($menuItem['Content']['permanent'] == $content['Content']['menu_parent'])
				)
			) || ((isset($race)) && ($menuItem['Content']['url_title'] == "races"))
		) {
			echo '<ul class="open">';
		} else {
			echo '<ul>';
		}


		foreach ($menuItem['SubContent'] as $subMenuItem) {
			if (($menuItem['Content']['controller'] == null) || ($menuItem['Content']['controller'] == "contents")) {
				echo '<li>' . $this->Html->Link(
					$subMenuItem['Content']['title'],
					array(
						'admin' => false,
						'controller' => 'contents',
						'action' => 'view',
						'url_title' => $subMenuItem['Content']['url_title']
					)
				) . '</li>';
			} else {
				echo '<li>' . $this->Html->Link(
					$subMenuItem['Series']['title'],
					array(
						'admin' => false,
						'controller' => 'series',
						'action' => 'view',
						'url_title' => $subMenuItem['Series']['url_title']
					)
				) . '</li>';
			}
		 }
		 echo '</ul>';
	} else {
		echo $this->Html->Link(
			$menuItem['Content']['title'],
			array(
				'admin' => false,
				'controller' => 'contents',
				'action' => 'view',
				'url_title' => $menuItem['Content']['url_title']
			)
		);
	}
	?>
	</li>
<?php } ?>
</ul>