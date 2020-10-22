<?php $this->assign('metaTitle', 'In News | ' . __($coreVariable['siteName'])); ?>
<div class="innerbanner clearfix" style="position: relative;">
	<?= $this->Html->Image('newsbg.png',['class'=>'img-responsive']) ?>
</div>
<section class="startegy">
	<div class="container">
		<div class="startegyinside cons don">
			<h2 class="don"><strong>NEWS</strong></h2>
		</div>
	</div>
	<div class="innernews">
	<?php foreach ($news as $newsList): ?>
	  <div class="secondnews " style="border-bottom: none;">
	  <p class="newshead"><a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'view', $newsList->slug]); ?>"><?= $newsList->name; ?> </a></p>
	  <p><?= $newsList->short_description ?></p>
	  <span><?= $this->Time->format($newsList->created, 'dd - MMM - Y') ?></span>
	   <?= ($newsList->news_image && file_exists($imageRoot . $newsList->news_image)) ? $this->Image->image($newsList->news_image , '', 900, 500, true, false, true, true, true, ['alt' => $newsList->name,'class'=>'img-responsive tpd']): ''; ?>
	  <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'view', $newsList->slug]); ?>">know more</a>

	 
	  </div>
	<?php endforeach; ?> 
	</div>
</section>
