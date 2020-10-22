<?php
/**
 * @author: Manoj Tanwar
 * @date: April 22, 2019
 * @version: 1.0.0
 */
$pageNo = [];
if($this->request->getQuery('page') > 1)
{
    $pageNo = ['page' => $this->request->getQuery('page')];
}

$this->Html->css(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);

$this->Html->css(['../assets/global/plugins/bootstrap-summernote/summernote'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-summernote/summernote.min'], ['block' => true]);
$this->Html->script(['../assets/pages/scripts/components-editors.min'], ['block' => true]);

$uploaded = (($imageCategory->category_image && file_exists($imageRoot.$imageCategory->category_image))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download fa-lg']), $this->Image->image($imageCategory->category_image, '', 600, 999999, true, false, true, false, false), ['escape' => false, 'class' => 'input-group-addon btn green modal-custom']):'');
?>
<?= $this->Flash->render(); ?>

<?= $this->Form->create($imageCategory, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index']+$pageNo, ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Image Category'), ['escape' => false, 'class' => 'btn btn-success']); ?>
            <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash']).
                __(' Delete'), ['action' => 'delete', $imageCategory->id]+$pageNo, ['escape' => false, 'block' => true, 'class'=>'btn btn-danger', 'confirm' => __('Are you sure you want to delete image category #{0}?', $imageCategory->id)]); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Name'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('slug', ['label' => ['text' => __('Page URL'), 'class' => 'control-label'], 'class' => 'form-control text_slug', 'oncopy' => 'return false', 'onpaste' => 'return false', 'ondrag' => 'return false', 'ondrop' => 'return false', 'autocomplete' => 'off', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
                <?php if($imgMaximumLevel > 1) { ?>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('parent_id', ['label' => ['text' => __('Parent Category'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Parent Category'), 'templates' => 'form_bootstrap']); ?>
                </div>
                <?php } ?>
               
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php $file = $this->FormAjax->fileControl(); ?>
                    <?= $this->Form->control('image_file', ['label' => ['text' => __('Image'), 'class' => 'control-label'], 'type' => 'file', 'templates' => 'form_bootstrap', 'templateVars' => ['virtualInput' => $file['virtualInput'], 'buttons' => $file['buttons'], 'control' => $file['control'].$uploaded]]) ?>
					<?= $this->Html->tag('div', __('Allowed extensions: Gif, Jpeg, Png, Jpg'), ['class' => 'font-purple-sharp','style' => 'margin-top : -20px']); ?>
					<?= $this->Html->tag('div', __('Image size must be greater than 330 x 200.'), ['class' => 'font-purple-sharp']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'required' => true, 'templates' => 'form_bootstrap']); ?>
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
                <div class="col-xs-12 col-sm-6 in-row">
                    <?= $this->Form->control('show_in_gallery', ['label' => ['text' => __(' Show on gallery page.'), 'class' => 'mt-checkbox mt-checkbox-outline'], 'class' => 'form-control', 'type' => 'checkbox', 'templates' => 'form_bootstrap']) ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->control('content', ['label' => ['text' => __('Content'), 'class' => 'control-label'], 'class' => 'form-control summernote-editor', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<?= $this->element('Component/long-modal', [
    'showHeader' => true, 'modalTitle' => __('Category Image')
]); ?>
<?= $this->fetch('postLink'); ?>

<?= $this->Html->scriptBlock("


$(document).on('keydown', '#from-date, #to-date', function(event) {
    event.preventDefault();
});

$(function() {
    $('input.text_slug').keyup(function() {
        $(this).val($(this).val().replace(/[^a-zA-Z0-9-_.@$! ]/g, function() { 
            return '';
        }).replace(/ /g, '-').replace(/[-]+/g, '-'));
    });
});

$(document).on('click', '.modal-custom', function(event) {
    event.preventDefault();
    
    var img = $('<img />', {src: $(this).attr('href')});
    $('#long-modal').modal('show');
    
    $('#long-modal .modal-body').html('<div align=\'center\'></div>');
    img.appendTo($('#long-modal .modal-body div'));
});
", ['block' => true]);
