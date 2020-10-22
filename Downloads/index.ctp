<?php
$this->Html->script(['pagination'], ['block' => true]);

$this->assign('metaTitle', (!empty($page_content->meta_title))?$page_content->meta_title:'Download');
$this->assign('metaKeywords', (!empty($page_content->meta_keywords))?$page_content->meta_keywords:'' );
$this->assign('metaDescription',(!empty($page_content->meta_description))?$page_content->meta_description:'');
$this->assign('pageTitle', 'Download');
$this->Html->addCrumb(__('Downloads'), 'javascript:void(0);');
?>

<div class="innerbanner clearfix">
	<!-- <?= $this->Html->Image('Documents.jpg',['class'=>'img-responsive'])?> -->


	<section id="demos" style="width: 100%;">
      <div class="">
        <div class="large-12 columns" id="owlCarousel">
          <div class="owl-carousel owl-carousel-7 owl-theme" id="changedot">
            <div class="item parallax">
              <img src="img/Documents.jpg">
               </div>
            <div class="item parallax">
              <img src="img/banner-d.jpg">
            </div>
           
           
            </div>

            
       
        </div>
      </div>
    </section>




</div>

<section class="vocational">
    <div class="container">
		<div class="vocationalin" style="padding: 10px 0px 0px 0px;">
		  <h2>DOCUMENTS</h2>
		</div>
		<?php if(!empty($downloadCats)){ ?>
		<div class="container" id="document">
			<ul class="nav nav-tabs tag_class">
			<?php $i=1;
			foreach($downloadCats as $downloadCat){
			?>
				<li <?php if($i==1){?>class="active"<?php } ?>><a data-toggle="tab" href="#tabs<?= $i ?>"><?= $downloadCat->name?></a></li>
			<?php $i++;} ?>
			</ul>

			<div class="tab-content">
			<?php  $j=1;
			foreach($downloadCats as $downloadCat){
			?>
				<div id="tabs<?= $j ?>" class="tab-pane fade in <?php if($j==1){ ?>active<?php } ?>">
					<div class="innews">
						<ul>
							<?php if(!empty($downloadArr[$downloadCat->id])){ 
								foreach($downloadArr[$downloadCat->id] as $download)
								{
							?>
								<li>
								<?= $this->Html->link($download->name, $this->Url->build('/', true).$imageDir.$download->file_name, ['escape' => false, 'target' => '_blank']); ?>
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

	<script>
		$(document).ready(function () {
    var owl = $('.owl-carousel-7');
    owl.owlCarousel({
      autoplay: true,
      dots: false,
      autoplayHoverPause: false,
      loop: true,
      nav: false,
      margin: 0,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  });
	</script>
</section>