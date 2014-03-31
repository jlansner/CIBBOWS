<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title_for_layout; ?></title>
</head>
<body>
	<table width="600" cellpadding="0" cellspacing="0" border="0"></table>
	<tr>
		<td>
			<?php echo $this->Html->image('phone_logo_left_5.gif',
				array(
					'fullBase' => true
				)
			); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo $this->fetch('content'); ?>
		</td>
	</tr>
</body>
</html>