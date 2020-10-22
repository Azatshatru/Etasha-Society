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

$this->Html->css(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);


$ext = pathinfo($tcertificates->tc_image, PATHINFO_EXTENSION); 
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif'){ 
    $uploaded = ($tcertificates->tc_image != '' && file_exists($imageRoot.$tcertificates->tc_image))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download fa-lg']),$this->Image->image($tcertificates->tc_image, '', 600, 99999, true, false, true, false, false), ['escape' => false, 'class' => 'input-group-addon btn green modal-custom']):''; } else { 
    $uploaded = ($tcertificates->tc_image != '' && file_exists($imageRoot.$tcertificates->tc_image))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download fa-lg']),'/'.$imagePath.$tcertificates->tc_image,['escape' => false, 'class' => 'input-group-addon btn green modal-custom']):''; } 
?>
                    
<?= $this->Flash->render(); ?>

<?= $this->Form->create($tcertificates, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index']+$pageNo, ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save TC'), ['escape' => false, 'class' => 'btn btn-success']); ?>
            <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash']).
                __(' Delete'), ['action' => 'delete', $tcertificates->id]+$pageNo, ['escape' => false, 'block' => true, 'class'=>'btn btn-danger', 'confirm' => __('Are you sure you want to delete gallery image #{0}?', $tcertificates->id)]); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                 <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('scholar_no', ['label' => ['text' => __('Scholar No.'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('student_name', ['label' => ['text' => __('Student Name'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('session_id', ['label' => ['text' => __('Session'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Select One'), 'templates' => 'form_bootstrap']); ?>
                </div>
                 <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('class_id', ['label' => ['text' => __('Class'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Select One'), 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            <div class="row">
               
                 <div class="col-xs-12 col-sm-6">
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
                    <?= $this->Form->control('dob', ['label' => ['text' => __('Date of birth'), 'class' => 'control-label'], 'class' => 'form-control', 'type' => 'text', 'templates' => 'form2_bootstrap',  'templateVars' => ['picker' => $picker]]); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php $file = $this->FormAjax->fileControl(); ?>
                    <?= $this->Form->control('tc_image', ['label' => ['text' => __('TC image'), 'class' => 'control-label'], 'type' => 'file','value' => '', 'templates' => 'form_bootstrap', 'templateVars' => ['virtualInput' => $file['virtualInput'], 'buttons' => $file['buttons'], 'control' => $file['control'].$uploaded]]) ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<?= $this->element('Component/long-modal', [
    'showHeader' => true, 'modalTitle' => __('TC Image')
]); ?>
<?= $this->fetch('postLink'); ?>

<?= $this->Html->scriptBlock("
$(function() {
    $('.file').append('".$this->Html->tag('div', __('Allowed extensions: Gif, Jpeg, Png, Jpg, txt, doc, docx, pdf'), ['class' => 'font-purple-sharp'])."');
});

$(document).on('click', '.modal-custom', function(event) {
    event.preventDefault();
    var img = $('<embed />', {src: $(this).attr('href')});
    $('#long-modal').modal('show');
    
    $('#long-modal .modal-body').html('<div align=\'center\'></div>');
    img.appendTo($('#long-modal .modal-body div'));
    $('embed').css('width','100%');
    $('embed').css('min-height','500px');
});
", ['block' => true]);
