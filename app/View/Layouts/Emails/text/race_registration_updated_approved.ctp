Race Registration Approved		

<?php echo $email['User']['name']; ?>,

Your registration for <?php if ($email['Race']['parent_id']) {
	echo $email['Race']['ParentRace']['title'] . ' - ';
}
echo $email['Race']['title'] ?> on <?php echo $this->Time->format('F j, Y',$email['Race']['date']); ?> has been approved.

We will send you more information as race day approaches.