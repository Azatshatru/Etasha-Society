<?php

$this->Html->script(['pagination'], ['block' => true]);

$this->assign('metaTitle', $album->meta_title?$album->meta_title:$album->name.' | '.__($coreVariable['siteName']));
$this->assign('metaKeywords', $album->meta_keywords);
$this->assign('metaDescription', $album->meta_description);

$this->assign('pageTitle', $album->name);
$this->Html->addCrumb(__('Arts and Culture'), ['action' => 'index']);
$this->Html->addCrumb($album->parent_image_category->name, ['action' => 'view', $album->parent_image_category->slug]);
$this->Html->addCrumb($album->name, 'javascript:void(0);');

$this->Html->css(['shadowbox'], ['block' => true]);
$this->Html->script(['shadowbox'], ['block' => true]);
?>
<div class="text-right">
    <?= $this->Html->link(
        $this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
        $this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).__(' Back'), ['action' => 'view', $album->parent_image_category->slug], ['class' => 'back', 'escape' => false]) ?>
</div>
<div><?= $album->content ?></div>
<div id="defaultGridBlock">
    <?= $this->element('ImageCategories/album'); ?>
</div>
<?= $this->Html->scriptBlock("
Shadowbox.init({
    overlayOpacity: 0.8,
}, setupDemos);

function setupDemos() {
    Shadowbox.setup('#photogallery a', {
        gallery: 'gallery',
        continuous: true,
        counterType: 'false'
    });
}

$(document).on('click', 'ul.pagination li a', function(){
    ajaxR.done(function(data) {
        $('#defaultGridBlock').html(data);
        
        Shadowbox.clearCache();
        Shadowbox.setup('#photogallery a', {
            gallery: 'gallery',
            continuous: true,
            counterType: 'false',
            overlayOpacity: 0.8
        });
    });
    
    return false;
});
", ['block' => true]);
