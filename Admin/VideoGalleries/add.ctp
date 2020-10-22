<?php
/**
 * @author: Manoj Tanwar
 * @date: Apr 25, 2019
 * @version: 1.0.0
 */
?>
<?= $this->Flash->render(); ?>
 <
<?= $this->Form->create($videoGallery); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index'], ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Gallery Video'), ['escape' => false, 'class' => 'btn btn-success']); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Title'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('video_category_id', ['label' => ['text' => __('Category'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Select One'), 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('url', ['label' => ['text' => __('Youtube URL'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'default' => 1, 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('top_on_list', ['label' => ['text' => __('Move the image at the top of the list.'), 'class' => 'mt-checkbox mt-checkbox-outline'], 'class' => 'form-control', 'type' => 'checkbox', 'default' => 1, 'templates' => 'form_bootstrap']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
 <?= $this->Form->end();  ?>
