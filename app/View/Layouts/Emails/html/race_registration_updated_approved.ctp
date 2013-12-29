<h1 style="font-size: 24px; font-family: Arial, Helvetica, sans-serif;">Race Registration Approved</h1>		

<p><?php echo $email['User']['name']; ?>,</p>

<p>Your registration for <?php 
if ($email['Race']['parent_id']) {
	echo $email['Race']['ParentRace']['title'] . ' - ';
}
echo $email['Race']['title']
 ?> on <?php echo $this->Time->format('F j, Y',$email['Race']['date']); ?> has been approved.</p>

<p>We will send you more information as race day approaches.</p>