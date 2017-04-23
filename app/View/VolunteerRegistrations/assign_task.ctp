<div class="row">
	<div class="column column12">
		<h1>Assign Task &ndash; <?php echo $this->request->data['Race']['title']; ?> &ndash; <?php echo $this->request->data['User']['name']; ?></h1>
		
	</div>
</div>
<div class="row">
	<div class="column column12">
        <?php echo $this->Form->create('VolunteerRegistration'); ?>
            <?php
                echo $this->Form->input('id');
                echo $this->Form->input(
                    'volunteer_task_id'
                );
//                echo $this->Form->input('approved');
            ?>
        <?php echo $this->Form->end(__('Submit')); ?>
    </div>
</div>

