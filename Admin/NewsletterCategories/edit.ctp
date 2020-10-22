<?php
/**
 * @author: Manoj Tanwar
 * @date: Apr 24, 2019
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

?>
<?= $this->Flash->render(); ?>

<?= $this->Form->create($newsletterCategory, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index']+$pageNo, ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Download Category'), ['escape' => false, 'class' => 'btn btn-success']); ?>
            <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash']).
                __(' Delete'), ['action' => 'delete', $newsletterCategory->id]+$pageNo, ['escape' => false, 'block' => true, 'class'=>'btn btn-danger', 'confirm' => __('Are you sure you want to delete download category #{0}?', $newsletterCategory->id)]); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Name'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
               
            
                <?php if($imgMaximumLevel > 1) { ?>
                <!--<div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('parent_id', ['label' => ['text' => __('Parent Category'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Parent Category'), 'templates' => 'form_bootstrap']); ?>
                </div>-->
                <?php } ?>
                 <div class="col-xs-12 col-sm-6">
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <!--<div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php $picker = $this->FormAjax->pickerControl(); 
					$fdate = date('d-m-Y',strtotime($newsletterCategory->from_date));
					$tdate = date('d-m-Y',strtotime($newsletterCategory->to_date));
					?>
                    <?= $this->Form->control('from_date', ['label' => ['text' => __('Published From'), 'class' => 'control-label'], 'class' => 'form-control', 'type' => 'text','value'=>@$fdate, 'templates' => 'form2_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('to_date', ['label' => ['text' => __('Published To'), 'class' => 'control-label'], 'class' => 'form-control', 'type' => 'text', 'templates' => 'form2_bootstrap','value'=>@$tdate, 'templateVars' => ['picker' => $picker]]); ?>
                </div>
            </div>-->
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>


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
