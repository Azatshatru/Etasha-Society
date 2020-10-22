<?php
$this->Html->script(['pagination'], ['block' => true]);
$this->Html->script(['jquery.magnific-popup'], ['block' => true]);

$this->assign('metaTitle', 'Photo Gallery | ' . __($coreVariable['siteName']));
$this->assign('metaKeywords', '');
$this->assign('metaDescription', '');

$this->assign('pageTitle', 'Photo Gallery');
?>

<div class="innerbanner clearfix">
	<?= $this->html->image('Gallery.jpg',['class'=>'img-responsive']) ?>
</div>
<div class="gallerywidth">
	<h2>IMAGE GALLERY</h2>
	<h3>ALBUMS</h3>
	<div id="content" class="container">	
		<div  id="defaultGridBlock">
			<?= $this->element('ImageCategories/index'); ?>
		</div>
	</div>
</div>
