<ul>
<?php foreach ($menuItems as $menuItem) { ?>
	<li>
	<?php if (isset($menuItem['SubContent']) && (is_array($menuItem['SubContent'])) && (count($menuItem['SubContent']) > 0)) {
		echo '<a href="#" class="showMenu">' . $menuItem['Content']['title'] . '</a>';
		echo '<ul>';
		foreach ($menuItem['SubContent'] as $subMenuItem) {
			if (($menuItem['Content']['controller'] == null) || ($menuItem['Content']['controller'] == "contents")) {
				echo '<li>' . $this->Html->Link($subMenuItem['Content']['title'], array('controller' => 'contents', 'action' => 'view', $subMenuItem['Content']['url_title'])) . '</li>';
			} else {
				echo '<li>' . $this->Html->Link($subMenuItem['Series']['title'], array('controller' => 'series', 'action' => 'view', $subMenuItem['Series']['url_title'])) . '</li>';
			}
		 }
		 echo '</ul>';
	} else {
		echo $this->Html->Link($menuItem['Content']['title'], array('action' => 'view', $menuItem['Content']['url_title']));
	}
	?>
	</li>
<?php } ?>
</ul>