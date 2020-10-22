<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions">
            
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).
                $this->Html->tag('span', __(' Add Bulk Images In Gallery'), ['class' => 'hidden-xs']), ['action' => 'bulk'], ['escape' => false, 'class' => 'btn btn-circle btn-info']); ?>
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).
                $this->Html->tag('span', __(' Add New Gallery Image'), ['class' => 'hidden-xs']), ['action' => 'add'], ['escape' => false, 'class' => 'btn btn-circle btn-info']); ?>
        
        </div>
   </div>
   <div class="portlet-body" id="defaultGridBlock">
       <?= $this->element('Admin/ImageGalleries/index'); ?>
   </div>
</div>
