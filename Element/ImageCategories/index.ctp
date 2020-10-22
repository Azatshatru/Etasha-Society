<?php
$pageNo = [];
if($this->request->getQuery('page') > 1)
{
    $pageNo = ['page' => $this->request->getQuery('page')];
}

echo $this->Flash->render();
echo $this->Form->control('page_url', ['type' => 'hidden', 'value' => $this->Url->build(['action' => 'index'])]);
?>
<div class="insidegallery">
        
            <?php foreach($albumCategories as $albumCategory): ?>
			<div class="col-sm-6">
                <?php $image = $activeImages->{$albumCategory->id} ?>
                <?= $this->Html->link($this->Html->tag('div', $this->Image->image($albumCategory->category_image, '', 414, 360, true, false, true, true, true, ['alt' => $albumCategory->name,'class'=>'img-responsive']), ['class' => 'bgpic']), ['action' => 'view', $albumCategory->slug], ['escape' => false]) ?>
                <div class="proheading">
					<a href="<?= $this->url->build('/'. $albumCategory->slug)?>">
						<?= $albumCategory->name ?>
					</a>
				</div>
			</div>
            <?php endforeach; ?>
        
</div>
<?php
if($this->Paginator->counter('{{pages}}') > 1)
{
    echo $this->element('paginator');
}
