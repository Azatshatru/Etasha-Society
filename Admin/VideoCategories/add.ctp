<?php
/**
 * @author: Manoj Tanwar
 * @date: Apr 25, 2019
 * @version: 1.0.0
 */

$this->Html->css(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);

$this->Html->css(['../assets/global/plugins/bootstrap-summernote/summernote'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-summernote/summernote.min'], ['block' => true]);
$this->Html->script(['../assets/pages/scripts/components-editors.min'], ['block' => true]);
?>
<?= $this->Flash->render(); ?>
 
<?= $this->Form->create($videoCategory, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index'], ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Video Category'), ['escape' => false, 'class' => 'btn btn-success']); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Name'), 'class' => 'control-label'], 'class' => 'form-control text_name', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('slug', ['label' => ['text' => __('Page URL'), 'class' => 'control-label'], 'class' => 'form-control text_slug', 'oncopy' => 'return false', 'onpaste' => 'return false', 'ondrag' => 'return false', 'ondrop' => 'return false', 'autocomplete' => 'off', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
                <?php if($videoMaximumLevel > 1) { ?>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('parent_id', ['label' => ['text' => __('Parent Category'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Parent Category'), 'templates' => 'form_bootstrap']); ?>
                </div>
                <?php } ?>
                <div class="col-xs-12 col-sm-6">
                    <?php $file = $this->FormAjax->fileControl(); ?>
                    <?= $this->Form->control('image_file', ['label' => ['text' => __('Image'), 'class' => 'control-label'], 'type' => 'file', 'templates' => 'form_bootstrap', 'templateVars' => ['virtualInput' => $file['virtualInput'], 'buttons' => $file['buttons'], 'control' => $file['control']]]) ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
                    <?= $this->Form->control('from_date', ['label' => ['text' => __('Published From'), 'class' => 'control-label'], 'class' => 'form-control', 'type' => 'text', 'templates' => 'form2_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('to_date', ['label' => ['text' => __('Published To'), 'class' => 'control-label'], 'class' => 'form-control', 'type' => 'text', 'templates' => 'form2_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->control('content', ['label' => ['text' => __('Content'), 'class' => 'control-label'], 'class' => 'form-control summernote-editor', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'default' => 1, 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<?= $this->Html->scriptBlock("
$(document).on('keydown', '#from-date, #to-date', function(event) {
    event.preventDefault();
});

$(function () {
    $('input.text_slug').keyup(function() {
        $(this).val($(this).val().replace(/[^a-zA-Z0-9-_.@$! ]/g, function() { 
            return '';
        }).replace(/ /g, '-').replace(/[-]+/g, '-'));
    });
    
    $('input.text_name').keyup(function() {
        $('input.text_slug').val($(this).val().replace(/[^a-zA-Z0-9-_.@$! ]/g, function() {
            return '';
        }).replace(/ /g, '-').replace(/[-]+/g, '-').replace(/^\-+|\-+$/g, ''));
    });
});
", ['block' => true]);
 