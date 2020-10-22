<?php
/**
 * @author: Manoj Tanwar
 * @date: Apr 25, 2019
 * @version: 1.0.0
 */
$pageNo = [];
if($this->request->getQuery('page') > 1)
{
    $pageNo = ['page' => $this->request->getQuery('page')];
}

echo $this->Flash->render();
echo $this->Form->control('page_url', ['type' => 'hidden', 'value' => $this->Url->build(['action' => 'index'])]);

echo $this->Form->create(NULL, ['id' => 'defaultGridBlockForm']);
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover dataTable">
        <thead>
            <tr role="row" class="heading sortable-control">
                <th><?= $this->Paginator->sort('VideoGalleries.name', __('Title')); ?></th>
                <th><?= $this->Paginator->sort('VideoGalleries.url', __('Youtybe Link')); ?></th>
                <th><?= $this->Paginator->sort('VideoCategories.name', __('Video Category')); ?></th>
                <th><?= $this->Paginator->sort('VideoGalleries.created', __('Date Added')); ?></th>
                <th><?= $this->Paginator->sort('VideoGalleries.lft', __('Order')); ?></th>
                <th><?= $this->Paginator->sort('VideoGalleries.status', __('Status')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td><?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Title'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('url', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Link'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('video_category_id', ['label' => false, 'class' => 'form-control form-filter input-sm', 'empty' => __('All Categories'), 'templates' => 'filter_bootstrap']); ?></td>
                <td>
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
                    <?= $this->Form->control('created_from', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('From'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker, 'addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('created_to', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('To'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </td>
                <td></td>
                <td>
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => false, 'class' => 'form-control form-filter input-sm', 'options' => $options, 'empty' => __('All Status'), 'templates' => 'filter_bootstrap']); ?>
                </td>
                <td>
                    <div class="margin-bottom-5">
                        <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-search']).
                            __(' Search'), ['class'=>'btn btn-sm btn-success filter-submit margin-bottom']); ?>
                    </div>
                    <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']).
                        __(' Reset'), ['action' => 'resetFilters'], ['escape' => false, 'block' => true, 'class' => 'btn btn-sm btn-default filter-cancel', 'confirm' => __('Are you sure you want to reset the filters?')]); ?>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if($this->Paginator->counter('{{count}}')): ?>
                <?php foreach($videoGalleries as $videoGallery): ?>
                <tr>
                    <td><?= h($videoGallery->name); ?></td>
                    <td><?= h($videoGallery->url); ?></td>
                    <td><?php
                    $categories = [];
					if(!empty($categoryPath[$videoGallery->video_category_id])){
                    foreach($categoryPath[$videoGallery->video_category_id] as $category)
                    {
                        $categories[] = $category->name;
                    }
                    
                    echo implode(' &raquo; ', $categories);
					}
                    ?></td>
                    <td><?= $this->Time->format($videoGallery->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center"><?php
                    $categoryTree = array_keys($treeList->toArray(), $videoGallery->video_category_id);
                    if($this->Paginator->sortKey() == 'VideoGalleries.lft')
                    {
                        $currentKeyId = array_search($videoGallery->id, $categoryTree);
                        $previousNode = ((array_key_exists($currentKeyId - 1, $categoryTree))?true:false);
                        $nextNode = ((array_key_exists($currentKeyId + 1, $categoryTree))?true:false);

                        if($nextNode)
                        {
                            echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-down']), 
                                ['action' => 'move', 'down', $videoGallery->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move gallery video #{0} down?', $videoGallery->id)]);
                        }
                        else
                        {
                            echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }

                        if($previousNode)
                        {
                            echo ' '.$this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-up']), 
                                ['action' => 'move', 'up', $videoGallery->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move gallery video #{0} up?', $videoGallery->id)]);
                        }
                        else
                        {
                            echo ' '.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }
                    }
                    else
                    {
                        echo $this->Html->link('#'.(array_search($videoGallery->id, $categoryTree) + 1), 'javascript:void(0);', ['class' => 'font-blue-steel', 'escape' => false]);
                    }
                    ?></td>
                    <td class="text-center"><?php
                    if($videoGallery->status):
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-check']), 
                            ['action' => 'statusChange', 'inactive', $videoGallery->id]+$pageNo, ['class' => 'font-blue-steel', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to inactive gallery video #{0}?', $videoGallery->id)]);
                    else:
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), 
                            ['action' => 'statusChange', 'active', $videoGallery->id]+$pageNo, ['class' => 'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to active gallery video #{0}?', $videoGallery->id)]);
                    endif;
                    ?></td>
                    <td class="text-center">
                        
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), 
                            ['action' => 'edit', $videoGallery->id]+$pageNo, ['class'=>'font-blue-steel', 'escape' => false]); ?>
                        
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $videoGallery->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete gallery video #{0}?', $videoGallery->id)]); ?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="7" class="text-center danger"><?= __('No record found...'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
echo $this->Form->end();

if($this->Paginator->counter('{{count}}'))
{
    echo $this->element('Admin/paginator');
}
echo $this->fetch('postLink');