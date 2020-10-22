<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
$pageNo = [];
if($this->request->getQuery('page') > 1)
{
    $pageNo = ['page' => $this->request->getQuery('page')];
}
?>
<?= $this->Flash->render(); ?>

<?= $this->Form->create($user); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index']+$pageNo, ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save User'), ['escape' => false, 'class' => 'btn btn-success']); ?>
            <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash']).
                __(' Delete'), ['action' => 'delete', $user->id]+$pageNo, ['escape' => false, 'block' => true, 'class'=>'btn btn-danger', 'confirm' => __('Are you sure you want to delete user #{0}?', $user->id)]); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' =>  ['text' => __('Name'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('email', ['label' =>  ['text' => __('Email'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']) ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('mobile', ['label' =>  ['text' => __('Mobile'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('password', ['label' =>  ['text' => __('Password'), 'class' => 'control-label'], 'class' => 'form-control', 'required' => false, 'templates' => 'form_bootstrap']) ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('confirm_password', ['label' =>  ['text' => __('Confirm Password'), 'class' => 'control-label'], 'class' => 'form-control', 'type' => 'password', 'required' => false, 'templates' => 'form_bootstrap']) ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php if($user->is_system): ?>
                        <?= $this->Form->control('role', ['type' => 'hidden', 'value' => 'Admin']); ?>
                    <?php else: ?>
                        <?php $options = ['Admin' => 'Admin', 'Editor' => 'Editor']; ?>
                        <?= $this->Form->control('role', ['label' => ['text' => __('Role'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Role'), 'templates' => 'form_bootstrap']); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xs-12 col-sm-6" id="div-modules-ids">
                    <?= $this->Form->control('modules._ids', ['label' =>  ['text' => __('Modules'), 'class' => 'control-label'], 'class' => 'form-control bs-select']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>
<?= $this->fetch('postLink'); ?>
<?= $this->Html->scriptBlock("
$(document).on('change', '#role', function() {
    $('#div-modules-ids').toggle($(this).val() != 'Admin');
}).ready(function () {
    $('#div-modules-ids').toggle($('#role').val() != 'Admin');
});
", ['block' => true]);
