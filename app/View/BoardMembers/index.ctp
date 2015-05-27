<div class="row">
	<div class="column column12">
		<h1>Board of Directors</h1>
		<?php
/*		function alphabetize($a, $b) {
			return strcmp($a['User']['last_name'], $b['User']['last_name']);
		}
		
		function sortTitles($a,$b) {
			if ($a['BoardTitle']['rank'] == $b['BoardTitle']['rank']) {
        		return 0;
		    }
		    return ($a < $b) ? -1 : 1;
		}
		
		*/
			$i = 0;
			 foreach ($boards as $board) {
		 /*	
			$boardMembers = $board['BoardMember'];
			for ($j = 0; $j < count($boardMembers); $j++) {
				if (count($boardMembers[$j]['BoardTitle']) == 0) {
					$boardMembers[$j]['BoardTitle']['rank'] = 1000;
				}
			}
		
			 
			usort($boardMembers, 'alphabetize');
			usort($boardMembers, 'sortTitles'); */

		?>
			<h2><?php echo $board['BoardLevel']['title']; ?></h2>
			
			<ul class="bulletless">
			<?php 
			foreach ($boardMembers[$i] as $boardMember) { ?>
				<li><?php
					echo $this->Html->link(
						$boardMember['User']['name'],
						array(
							'controller' => 'users',
							'action' => 'view',
							$boardMember['User']['id']
						)
					);
					
					if (isset($boardMember['BoardTitle']['title'])) { 
						echo ", <strong>" . $boardMember['BoardTitle']['title'] . "</strong>";
					}
				 ?>
				 </li>
			<?php 
} ?>
			</ul>
		<?php 
$i++;
			 } ?>
		
	</div>
</div>
