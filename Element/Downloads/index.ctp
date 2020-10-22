<?php
$pageNo = [];
if($this->request->getQuery('page') > 1)
{
    $pageNo = ['page' => $this->request->getQuery('page')];
}

echo $this->Flash->render();
echo $this->Form->control('page_url', ['type' => 'hidden', 'value' => $this->Url->build(['action' => 'index'])]);
?>
<div class="container">
	<div id="content">
       <ul id="dwd">
            <?php foreach($downloads as $download): ?>
			
                <?php if($download->file_name && file_exists($imageRoot.$download->file_name)): ?>
                <li>
                    <div class="ttl">
                       <?= $download->name; ?>
                    </div>
                        <div class="dwnbtn"> <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'icon-download']).
                            __(' Download Now'), $this->Url->build('/', true).$imageDir.$download->file_name, ['escape' => false, 'target' => '_blank']); ?>
						</div>
				</li>
                <?php endif; ?>
			
            <?php endforeach; ?>
	</div>
</div>
</div>
<?php
if($this->Paginator->counter('{{pages}}') > 1)
{
    echo $this->element('paginator');
}
