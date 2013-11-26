<?php

echo $this->Form->create('User', array('action' => 'login'));
echo $this->Form->inputs(array(
    'legend' => __('Login'),
    'email',
    'password'
));
?>
<label></label>
<?php
echo $this->Html->link('Forgot your password?', array('controller' => 'users', 'action' => 'forgot_password'));
echo $this->Form->end('Login');
?>