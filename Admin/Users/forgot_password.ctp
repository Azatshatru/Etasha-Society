<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
$this->Html->css(['../assets/pages/css/login.min'], ['block' => true]);
?>
<?= $this->Form->create($user) ?>
<h3 class="form-title font-green"><?= __('Forgot password?'); ?></h3>
<p><?= __('Enter the email address you use to sign in to your account. You will receive an email with a link to reset your password.') ?></p>

<?= $this->Flash->render() ?>

<?= $this->Form->control('email', ['label' => ['text' => __('Email Address'), 'class' => 'control-label visible-ie8 visible-ie9'], 'class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => __('Email Address'), 'templates' => 'form_bootstrap']) ?>

<div class="form-actions">
    <?= $this->Html->link(__('Back to login page'), ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn green btn-outline']); ?>
    <?= $this->Form->button(__('Continue'), ['class' => 'btn btn-success uppercase pull-right']); ?>
</div>
<?= $this->Form->end() ?>
