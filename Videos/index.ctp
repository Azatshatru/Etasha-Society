<?php
$title_for_layout = 'Videos | Srajan Academy';
$this->set(compact('title_for_layout'));
$this->Html->css(['shadowbox'], ['block' => true]);
$this->Html->script(['shadowbox'], ['block' => true]);
?> 

<div class="container">
		<div class="startegyinside cons don">
			<h2 class="don"><strong>Video Gallery</strong></h2>
		</div>
	</div>
<div id="photogallery" class="page-content">
	<div class="container">
    	
        <!--<ul class="gallery">
            <?php
            if (!empty($videos)) {
                foreach ($videos as $video) {
                    ?> 
                    <li>
						<a href="<?= $video->url ?>" class="pgallery">
							<?php echo  $this->html->image('media/'.str_replace("\\",'/',$video->category_image),['class'=>'img-responsive']); ?>
						</a>
                    </li>
            <?php }
        } ?>

        </ul>-->
		<div class="row" id="videos_page">
            <?php
            if (!empty($videos)) {
                foreach ($videos as $video) {
                    ?> 
                    <div class="col-lg-6">
                        <h4><?= $video->name ?></h4>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?= $video->url; ?>" allowfullscreen="true" width="854" height="480" frameborder="0" gesture="media" allow="encrypted-media"></iframe>
                        </div>
                    </div>
            <?php }
        } ?>
       </div></br>
    </div>
</div>
<?= $this->Html->scriptBlock("Shadowbox.init({
	overlayOpacity: 0.8,
}, setupDemos);

function setupDemos() {
	Shadowbox.setup('a.pgallery', {
		gallery: 'mustang',
		continuous: true,
		counterType: 'false'
	});
}
", ['block' => true]); ?>