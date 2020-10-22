<?= $this->Flash->render(); ?>
 <?php
$this->Html->css(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
 ?>  
<?= $this->Form->create($imageGallery, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index'], ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Gallery Image'), ['escape' => false, 'class' => 'btn btn-success']); ?>
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
                    <?= $this->Form->control('photo_file', ['label' => ['text' => __('Image'), 'class' => 'control-label'], 'type' => 'file', 'templates' => 'form_bootstrap', 'templateVars' => ['virtualInput' => $file['virtualInput'], 'buttons' => $file['buttons'], 'control' => $file['control']]]) ?>
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
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'default' => 1, 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-xs-12 col-sm-6 in-row">
                    <?= $this->Form->control('top_on_list', ['label' => ['text' => __('Move the image at the top of the list.'), 'class' => 'mt-checkbox mt-checkbox-outline'], 'class' => 'form-control', 'type' => 'checkbox', 'default' => 1, 'templates' => 'form_bootstrap']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<?= $this->Html->scriptBlock("

", ['block' => true]);
 