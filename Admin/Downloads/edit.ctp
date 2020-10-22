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

$uploaded = (($download->file_name && file_exists($imageRoot.$download->file_name))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download fa-lg']), $this->Url->build('/', true).$imageDir.$download->file_name, ['escape' => false, 'class' => 'input-group-addon btn green', 'target' => '_blank']):'');
?>
<?= $this->Flash->render(); ?>

<?= $this->Form->create($download, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index']+$pageNo, ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Download'), ['escape' => false, 'class' => 'btn btn-success']); ?>
            <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash']).
                __(' Delete'), ['action' => 'delete', $download->id]+$pageNo, ['escape' => false, 'block' => true, 'class'=>'btn btn-danger', 'confirm' => __('Are you sure you want to delete download #{0}?', $download->id)]); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Title'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
				<div class="col-xs-12 col-sm-6">
                   <?= $this->Form->control('download_category_id', ['label' => ['text' => __('Download Category'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $downloadCategory, 'empty' => __('Select Download Category'), 'default' => 1, 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
				<div class="col-xs-12 col-sm-6">
                    <?php $file = $this->FormAjax->fileControl(); ?>
                    <?= $this->Form->control('file_download', ['label' => ['text' => __('File'), 'class' => 'control-label'], 'type' => 'file', 'templates' => 'form_bootstrap', 'templateVars' => ['virtualInput' => $file['virtualInput'], 'buttons' => $file['buttons'], 'control' => $file['control'].$uploaded]]) ?>
					<?= $this->Html->tag('div', __('Allowed extensions: Pdf, Doc, Docx'), ['class' => 'font-purple-sharp','style' => 'margin-top : -20px']); ?>
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
			 </div>
            <!--<div class="row">
				<div class="col-xs-12">
					<?= $this->Form->control('meta_title', ['label' => ['text' => __('Meta Title'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<?= $this->Form->control('meta_keywords', ['label' => ['text' => __('Meta Keywords'), 'class' => 'control-label'], 'class' => 'form-control', 'rows' => 3, 'templates' => 'form_bootstrap']); ?>
				</div>
				<div class="col-xs-12 col-sm-6">
					<?= $this->Form->control('meta_description', ['label' => ['text' => __('Meta Description'), 'class' => 'control-label'], 'class' => 'form-control', 'rows' => 3, 'templates' => 'form_bootstrap']); ?>
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
", ['block' => true]);
