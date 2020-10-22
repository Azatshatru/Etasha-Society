<div class="insidegallery newg clearfix">
	<?php foreach($images as $image): ?>
	<div class="col-sm-4">
		<div class="imagesgal">
			<?= $this->html->link($this->Image->image(($image->photo_image && file_exists($imageRoot.$image->photo_image))?$image->photo_image:'../placeholder.jpg', '', 332, 335, true, false, true, true, true, ['alt' => $image->name,'class'=>'img-responsive']), $this->Image->image($image->photo_image, '', 1200, 800, true, false, true, false, false), ['escape' => false,'alt' => $image->name]) 
				?>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<?php
if($this->Paginator->counter('{{pages}}') > 1)
{
    echo $this->element('paginator');
}
