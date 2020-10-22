<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
$this->Html->css(['../assets/pages/css/login.min'], ['block' => true]);
?>
<?= $this->Form->create($user) ?>
<h3 class="form-title font-green"><?= __('Reset password'); ?></h3>
<p><?= __('Enter your new password below to change the password of your account.') ?></p>

<?= $this->Flash->render() ?>

<?= $this->Form->control('password', ['label' => ['text' => __('New Password'), 'class' => 'control-label visible-ie8 visible-ie9'], 'class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => __('New Password'), 'templates' => 'form_bootstrap']) ?>
<?= $this->Form->control('confirm_password', ['label' => ['text' => __('Confirm Password'), 'class' => 'control-label visible-ie8 visible-ie9'], 'class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => __('Confirm Password'), 'type' => 'password', 'templates' => 'form_bootstrap']) ?>

<div class="form-actions">
    <?= $this->Html->link(__('Back to login page'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn green btn-outline']); ?>
    <?= $this->Form->button(__('Reset Password'), ['class' => 'btn btn-success uppercase pull-right']); ?>
</div>
<?= $this->Form->end() ?>
