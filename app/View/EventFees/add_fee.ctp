<div class="row">
	<div class="column column12">
<?php echo $this->Form->create(null); ?>
	<fieldset>
		<legend>Add Event Fees
			<?php if ($event) {
				 echo ' - ' . $event['Event']['title'];
			}
			 ?></legend>
<?php
		if ($event) {
			echo $this->Form->hidden(
				'event_id',
				array(
					'value' => $event['Event']['id']
				)
			);
		} else {
			echo $this->Form->input('event_id');
		}
?>			 
			 <table>
			 	<tr>
			 		<th>Start Date</th>
			 		<th>End Date</th>
			 		<th>Member Price</th>
			 		<th>Non-Member Price</th>
			 	</tr>
	<?php
	for ($i = 0; $i < 4; $i++) {
?>
<tr>
	<td>
		<?php
		echo $this->Form->text(
			$i . '.start_date',
			array(
				'class' => 'start_date',
				'label' => false
			)
		);
		?>
	</td>
	<td>
		<?php
		echo $this->Form->text(
			$i . '.end_date',
			array(
				'class' => 'end_date',
				'label' => false
			)			
		);
		?>
	</td>
	<td>
		<?php
		echo $this->Form->text(
			$i . '.member_price',
			array(
				'label' => false
			)
		);
		?>
		</td>
	<td>
		<?php
		echo $this->Form->text(
			$i . '.nonmember_price',
			array(
				'label' => false
			)
		);
		?>
		</td>
</tr>
<?php
	}
	?>
				 </table>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>
  <script>
  $(function() {
    $('.start_date').datepicker({
    	  dateFormat: "yy-mm-dd",
    	  altFormat: "mm/dd/yy",
    	  onSelect: function() {
    	  	var date = new Date($(this).val());
    	  	var idNumber = $(this).attr('id').substring(7,8);    	  	
    	  	$('#EventFee' + idNumber + 'EndDate').val();
    	  }
    });

    $('.end_date').datepicker({
    	  dateFormat: "yy-mm-dd",
    	  altFormat: "mm/dd/yy",
    	  onSelect: function() {
			var date = $(this).datepicker('getDate');
    	  	date.setDate(date.getDate() + 1);
    	  	var idNumber = ($(this).attr('id').substring(7,8) * 1) + 1;
    	  	$('#EventFee' + idNumber + 'StartDate').datepicker('setDate',date);
    	  }
    });

  });
  </script>