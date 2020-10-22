<?php
$this->Html->script(['pagination'], ['block' => true]);

$this->assign('metaTitle', (!empty($page_content->meta_title))?$page_content->meta_title:'Download');
$this->assign('metaKeywords', (!empty($page_content->meta_keywords))?$page_content->meta_keywords:'' );
$this->assign('metaDescription',(!empty($page_content->meta_description))?$page_content->meta_description:'');
$this->assign('pageTitle', 'Newsletter');
$this->Html->addCrumb(__('Newsletter'), 'javascript:void(0);');
?>

<div class="innerbanner clearfix">
	<?= $this->Html->Image('Newsletter.jpg',['class'=>'img-responsive'])?>
</div>

<section class="vocational">
    <div class="container">
		<div class="vocationalin" style="padding: 10px 0px 0px 0px;">
		  <h2>NEWSLETTER</h2>
		</div>
		<?php if(!empty($newsCats)){ ?>
		<div class="container" id="document">
			<ul class="nav nav-tabs tag_class">
			<?php $i=1;
			foreach($newsCats as $newsCat){
			?>
				<li <?php if($i==1){?>class="active"<?php } ?>><a data-toggle="tab" href="#tabs<?= $i ?>"><?= $newsCat->name?></a></li>
			<?php $i++;} ?>
			</ul>

			<div class="tab-content">
			<?php  $j=1;
			foreach($newsCats as $newsCat){
			?>
				<div id="tabs<?= $j ?>" class="tab-pane fade in <?php if($j==1){ ?>active<?php } ?>">
					<div class="innews">
						<ul>
							<?php if(!empty($newsletterArr[$newsCat->id])){ 
								foreach($newsletterArr[$newsCat->id] as $newsletter)
								{
							?>
								<li>
								<?= $this->Html->link($newsletter->name, $this->Url->build('/', true).$imageDir.$newsletter->file_name, ['escape' => false, 'target' => '_blank']); ?>
								</li>
							<?php }} ?>
						</ul>
					</div>
				</div>
			<?php $j++;} ?>
			</div>
		</div>
		<?php } ?>
	</div>
</section>