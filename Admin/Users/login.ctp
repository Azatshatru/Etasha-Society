<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
$this->Html->css(['../assets/pages/css/login.min'], ['block' => true]);
?>
<?= $this->Form->create($user, ['class' => 'login-form']) ?>
<h3 class="form-title font-green"><?= __('Administrative Login'); ?></h3>
<p><?= __('Please enter your email address and password to gain access to the administrative dashboard.') ?></p>

<?= $this->Flash->render() ?>
<?= $this->Flash->render('auth') ?>

<?= $this->Form->control('email', ['label' => ['text' => __('Email Address'), 'class' => 'control-label visible-ie8 visible-ie9'], 'class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => __('Email Address'), 'templates' => 'form_bootstrap']) ?>
<?= $this->Form->control('password', ['label' => ['text' => __('Password'), 'class' => 'control-label visible-ie8 visible-ie9'], 'class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder' => __('Password'), 'templates' => 'form_bootstrap']) ?>
<?= $this->Form->input('CaptchaCode', [
    'label' => 'Type the characters from the picture',
    'maxlength' => '8',
    'placeholder' => 'Captcha Code',
    'class' => 'form-control form-control-solid placeholder-no-fix','templates' => 'form_bootstrap'
  ]) ?>
<img src="<?php echo $this->Url->build('/admin/users/image');?>"/>
<a href="#" class="creload">Reload</a>
<div class="form-actions">
    <?= $this->Form->button(__('Login'), ['class' => 'btn green uppercase']); ?>
    <?= $this->Html->link(__('Forgot Password?'), ['controller' => 'Users', 'action' => 'forgotPassword'], ['class' => 'forget-password']); ?>
</div>
<?= $this->Form->end() ?>

<?= $this->Html->scriptBlock("
if(parent.location != window.location)
{
    parent.location.reload(true);
}
", ['inline' => false]);
