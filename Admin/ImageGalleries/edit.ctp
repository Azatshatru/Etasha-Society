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

$uploaded = (($imageGallery->photo_image && file_exists($imageRoot.$imageGallery->photo_image))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download fa-lg']), $this->Image->image($imageGallery->photo_image, '', 600, 999999, true, false, true, false, false), ['escape' => false, 'class' => 'input-group-addon btn green modal-custom']):'');
?>
<?= $this->Flash->render(); ?>
 
<?= $this->Form->create($imageGallery, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index']+$pageNo, ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Gallery Image'), ['escape' => false, 'class' => 'btn btn-success']); ?>
            <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash']).
                __(' Delete'), ['action' => 'delete', $imageGallery->id]+$pageNo, ['escape' => false, 'block' => true, 'class'=>'btn btn-danger', 'confirm' => __('Are you sure you want to delete gallery image #{0}?', $imageGallery->id)]); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Title'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php $file = $this->FormAjax->fileControl(); ?>
                    <?= $this->Form->control('photo_file', ['label' => ['text' => __('Image'), 'class' => 'control-label'], 'type' => 'file', 'templates' => 'form_bootstrap', 'templateVars' => ['virtualInput' => $file['virtualInput'], 'buttons' => $file['buttons'], 'control' => $file['control'].$uploaded]]) ?>
					<?= $this->Html->tag('div', __('Allowed extensions: Gif, Jpeg, Png, Jpg'), ['class' => 'font-purple-sharp','style' => 'margin-top : -20px']); ?>
					<?= $this->Html->tag('div', __('Image size must be greater than 200 x 200.'), ['class' => 'font-purple-sharp']); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('image_category_id', ['label' => ['text' => __('Category'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Select One'), 'templates' => 'form_bootstrap']); ?>
                </div>
                 <div class="col-xs-12 col-sm-6">
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
           
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<?= $this->element('Component/long-modal', [
    'showHeader' => true, 'modalTitle' => __('Gallery Image')
]); ?>
<?= $this->fetch('postLink'); ?>

<?= $this->Html->scriptBlock("


$(document).on('click', '.modal-custom', function(event) {
    event.preventDefault();
    
    var img = $('<img />', {src: $(this).attr('href')});
    $('#long-modal').modal('show');
    
    $('#long-modal .modal-body').html('<div align=\'center\'></div>');
    img.appendTo($('#long-modal .modal-body div'));
});
", ['block' => true]);
 