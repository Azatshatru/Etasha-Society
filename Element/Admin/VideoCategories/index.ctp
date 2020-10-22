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
                <th class="multi">
                    <?= $this->Paginator->sort('VideoCategories.name', __('Name')); ?>
                    <?= $this->Paginator->sort('VideoCategories.slug', __('Slug')); ?>
                </th>
                <?php if($videoMaximumLevel > 1): ?>
                <th><?= $this->Paginator->sort('ParentVideoCategories.name', __('Parent Category')); ?></th>
                <?php endif; ?>
                <th><?= $this->Paginator->sort('VideoCategories.from_date', __('Published From')); ?></th>
                <th><?= $this->Paginator->sort('VideoCategories.to_date', __('Published To')); ?></th>
                <th><?= $this->Paginator->sort('VideoCategories.created', __('Date Added')); ?></th>
                <th><?= $this->Paginator->sort('VideoCategories.lft', __('Order')); ?></th>
                <th><?= $this->Paginator->sort('VideoCategories.status', __('Status')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td>
                    <?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter2_bootstrap', 'templateVars' => ['addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('slug', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Slug'), 'templates' => 'filter_bootstrap']); ?>
                </td>
                <?php if($videoMaximumLevel > 1): ?>
                <td><?= $this->Form->control('parent_id', ['label' => false, 'class' => 'form-control form-filter input-sm', 'empty' => __('All Categories'), 'templates' => 'filter_bootstrap']); ?></td>
                <?php endif; ?>
                <td>
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
                    <?= $this->Form->control('from_date_from', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('From'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker, 'addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('from_date_to', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('To'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </td>
                <td>
                    <?= $this->Form->control('to_date_from', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('From'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker, 'addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('to_date_to', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('To'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </td>
                <td>
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
                <?php foreach($videoCategories as $videoCategory): ?>
                <tr>
                    <td class="multi">
                        <?= array_key_exists($videoCategory->id, $treeList->toArray())?h($treeList->toArray()[$videoCategory->id]):h($videoCategory->name); ?>
                        <div class="text-sub"><span><?= __('Slug'); ?>:</span> <?= h($videoCategory->slug); ?></div>
                    </td>
                    <?php if($videoMaximumLevel > 1): ?>
                    <td><?= $videoCategory->has('parent_video_category')?array_key_exists($videoCategory->parent_video_category->id, $treeList->toArray())?h($treeList->toArray()[$videoCategory->parent_video_category->id]):h($videoCategory->parent_video_category->name):'' ?></td>
                    <?php endif; ?>
                    <td><?= $videoCategory->from_date?$this->Time->format($videoCategory->from_date, 'dd MMM yyyy'):''; ?></td>
                    <td><?= $videoCategory->to_date?$this->Time->format($videoCategory->to_date, 'dd MMM yyyy'):''; ?></td>
                    <td><?= $this->Time->format($videoCategory->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center"><?php
                    $categoryTree = array_keys($treeList2->toArray(), $videoCategory->parent_id);
                    if($this->Paginator->sortKey() == 'VideoCategories.lft')
                    {
                        $currentKeyId = array_search($videoCategory->id, $categoryTree);
                        $previousNode = ((array_key_exists($currentKeyId - 1, $categoryTree))?true:false);
                        $nextNode = ((array_key_exists($currentKeyId + 1, $categoryTree))?true:false);

                        if($nextNode)
                        {
                            echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-down']), 
                                ['action' => 'move', 'down', $videoCategory->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move video category #{0} down?', $videoCategory->id)]);
                        }
                        else
                        {
                            echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }

                        if($previousNode)
                        {
                            echo ' '.$this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-up']), 
                                ['action' => 'move', 'up', $videoCategory->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move video category #{0} up?', $videoCategory->id)]);
                        }
                        else
                        {
                            echo ' '.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }
                    }
                    else
                    {
                        echo $this->Html->link('#'.(array_search($videoCategory->id, $categoryTree) + 1), 'javascript:void(0);', ['class' => 'font-blue-steel', 'escape' => false]);
                    }
                    ?></td>
                    <td class="text-center"><?php
                    if($videoCategory->status):
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-check']), 
                            ['action' => 'statusChange', 'inactive', $videoCategory->id]+$pageNo, ['class' => 'font-blue-steel', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to inactive video category #{0}?', $videoCategory->id)]);
                    else:
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), 
                            ['action' => 'statusChange', 'active', $videoCategory->id]+$pageNo, ['class' => 'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to active video category #{0}?', $videoCategory->id)]);
                    endif;
                    ?></td>
                    <td class="text-center">
                        
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), 
                            ['action' => 'edit', $videoCategory->id]+$pageNo, ['class'=>'font-blue-steel', 'escape' => false]); ?>
                        
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $videoCategory->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete video category #{0}?', $videoCategory->id)]); ?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td <?= ($videoMaximumLevel > 1)?'colspan="8"':'colspan="7"'?> class="text-center danger"><?= __('No record found...'); ?></td>
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
