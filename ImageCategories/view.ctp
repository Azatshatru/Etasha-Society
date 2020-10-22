<?php
$this->Html->script(['pagination'], ['block' => true]);
$this->Html->script(['jquery.magnific-popup'], ['block' => true]);

$this->assign('metaTitle', $albumCategory->meta_title ? $albumCategory->meta_title : $albumCategory->name . ' | ' . __($coreVariable['siteName']));
$this->assign('metaKeywords', $albumCategory->meta_keywords);
$this->assign('metaDescription', $albumCategory->meta_description);

$this->assign('pageTitle', $albumCategory->name);
$this->Html->addCrumb(__('Photo Gallery'), ['action' => 'index']);
$this->Html->addCrumb($albumCategory->name, 'javascript:void(0);');

$this->start('backButton');
echo $this->html->tag('div', $this->html->link($this->html->tag('i', '', ['class' => 'fa fa-caret-left']) . __(' Back'), ['action' => 'index'], ['class' => 'btn btn-danger', 'escape' => false]), ['class' => 'text-center']);
$this->end();
?>

<div class="innerbanner clearfix">
	<?= $this->html->image('galleryb.jpg',['class'=>'img-responsive']);?>
</div>
<div class="imageswidth">
	<h2>IMAGE GALLERY</h2>
	<h3><?= $albumCategory->name ?></h3>
	<div class="container" id="defaultGridBlock">
		   <?= $this->element('ImageCategories/view'); ?>
	</div>	
</div>
<?=
$this->Html->scriptBlock("
$(document).ready(function() { 
  $('.imagesgal').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href=\'%url%\'>The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
         return item.el.attr('alt');
      }
    }
  });
});

$(document).on('click', 'ul.pagination li a', function(){
    ajaxR.done(function(data) {
        $('#defaultGridBlock').html(data);
        
       
    });
    
    return false;
});
", ['block' => true]);
