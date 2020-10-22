<?php
$title_for_layout   = @$news->meta_title;
$keywords = @$news->meta_keyword;
$description = @$news->meta_description;
$this->set(compact('title_for_layout', 'description', 'keywords'));
$this->assign('pageTitle', $news->name);

?>
<div class="innerbanner clearfix" style="position: relative;">
	<?= $this->Html->Image('newsbg.png',['class'=>'img-responsive']) ?>
</div>
<section class="startegy">
	<div class="container">
		<div class="startegyinside cons don">
			<h2 class="don"><strong>NEWS - <?= $news->name; ?></strong></h2>
		</div>
	</div>
	<div class="innernews">
		<div class="row">
		    <div class="col-md-8 col-xl-9" >
				<div class="secondnews " style="border-bottom: none;">
				  <p class="newshead"><?= $news->name; ?> </p>
				  <span><?= $this->Time->format($news->created, 'dd - MMM - Y') ?></span>
				  <?= ($news->news_image && file_exists($imageRoot . $news->news_image)) ? $this->Image->image($news->news_image , '', 805, 272, true, false, true, true, true, ['alt' => $news->name,'class'=>'img-responsive tpd']): ''; ?>
				   <p><?= $news->content ?></p>
				</div>
			</div>
			<div class="col-md-4 col-xl-3" >
			 <?php if (!empty($relatednews)) { ?> 
                <h3>Latest News</h3>
                <div class="news-list">
                    <ul>
                        <?php foreach ($relatednews as $shownews) { ?>
                            <li>
                                 <div class="img-wrapper">
                                        <?= ($shownews['news_image'] != '' && file_exists($imageRoot . $shownews['news_image'])) ? $this->Image->image($shownews['news_image'], '', 100, 73, true, false, true, ['width' => '100', 'height' => '100']) : $this->Image->image('no-image.png', '', 100, 100, true, false, true, ['width' => '100', 'height' => '100']); ?>
                                    </div>
                                    <div class="oh">
                                        <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'view', $shownews['slug']]) ?>">
                                            <?= $shownews->name; ?></a>
                                        <div class="news_date"><i class="icon-calendar-check-o"></i><?= $this->Time->format($shownews->from_date, 'dd MMMM, yyyy') ?></div>
                                    </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
			</div>
		</div>
	</div>
</section>

