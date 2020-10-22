<?php
$pageNo = [];
if($this->request->getQuery('page') > 1)
{
    $pageNo = ['page' => $this->request->getQuery('page')];
}

$this->Html->css(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);

$this->Html->css(['../assets/global/plugins/bootstrap-summernote/summernote'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-summernote/summernote.min'], ['block' => true]);
$this->Html->script(['../assets/pages/scripts/components-editors.min','../assets/pages/scripts/summernote-cleaner'], ['block' => true]);
$ext = pathinfo($news->news_image, PATHINFO_EXTENSION); 
if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif'){ 
    $uploaded = (($news->news_image && file_exists($imageRoot.$news->news_image))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download fa-lg']), $this->Image->image($news->news_image, '', 600, 999999, true, false, true, false, false), ['escape' => false, 'class' => 'input-group-addon btn green modal-custom']):''); } else { 
    $uploaded = ($news->news_image != '' && file_exists($imageRoot.$news->news_image))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download fa-lg']),'/'.$imagePath.$news->news_image,['escape' => false, 'class' => 'input-group-addon btn green modal-custom']):''; } 

?>
<?= $this->Flash->render(); ?>
  
<?= $this->Form->create($news, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index']+$pageNo, ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save News'), ['escape' => false, 'class' => 'btn btn-success']); ?>
            <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash']).
                __(' Delete'), ['action' => 'delete', $news->id]+$pageNo, ['escape' => false, 'block' => true, 'class'=>'btn btn-danger', 'confirm' => __('Are you sure you want to delete news #{0}?', $news->id)]); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Title'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('slug', ['label' => ['text' => __('Page URL'), 'class' => 'control-label'], 'class' => 'form-control text_slug', 'oncopy' => 'return false', 'onpaste' => 'return false', 'ondrag' => 'return false', 'ondrop' => 'return false', 'autocomplete' => 'off', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?php $file = $this->FormAjax->fileControl(); ?>
                    <?= $this->Form->control('image_file', ['label' => ['text' => __('News Image'), 'class' => 'control-label'], 'type' => 'file', 'templates' => 'form_bootstrap', 'templateVars' => ['virtualInput' => $file['virtualInput'], 'buttons' => $file['buttons'], 'control' => $file['control'].$uploaded]]) ?>
					<?= $this->Html->tag('div', __('Allowed extensions: Gif, Jpeg, Png, Jpg'), ['class' => 'font-purple-sharp','style' => 'margin-top : -20px']); ?>
					<?= $this->Html->tag('div', __('Image size must be greater than 350 x 250.'), ['class' => 'font-purple-sharp']); ?>
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
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->control('short_description', ['label' => ['text' => __('Short Description'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap','rows'=>3]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->control('content', ['label' => ['text' => __('Content'), 'class' => 'control-label'], 'class' => 'form-control summernote-editor', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->control('meta_title', ['label' => ['text' => __('Meta Title'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
			<div class="row">
                <div class="col-xs-6">
                    <?= $this->Form->control('meta_keyword', ['label' => ['text' => __('Meta Keyword'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap','rows'=>3]); ?>
                </div>
				 <div class="col-xs-6">
                    <?= $this->Form->control('meta_description', ['label' => ['text' => __('Meta Description'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap','rows'=>3]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<?= $this->element('Component/long-modal', [
    'showHeader' => true, 'modalTitle' => __('News Image')
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
 