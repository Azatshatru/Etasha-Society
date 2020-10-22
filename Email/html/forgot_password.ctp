<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */

$URL = $this->Url->build(['controller' => 'Users', 'action' => 'resetPassword', $passwordToken], true);
?>
<p>
    Hi <?= $userInfo->name ?>,<br /><br />
    
    Changing your password is simple. Please click the link below.<br />
    <?= $this->Html->link($URL, $URL) ?><br /><br />
    
    If clicking the link above doesn't work, please copy and paste the URL in a new browser window instead.<br /><br />
    
    This email is valid till <strong><?= $this->Time->format($tokenExpiry, 'EEEE, dd MMMM yyyy hh:mm a') ?></strong>
</p><br />

Thank you,<br />
Team <?= $sitename; ?>