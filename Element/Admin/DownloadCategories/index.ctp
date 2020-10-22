<?php
/**
 * @author: Manoj Tanwar
 * @date: Fab 04, 2019
 * @version: 1.0.0
 */
use Cake\Utility\Hash;

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
                    <?= $this->Paginator->sort('ImageCategories.name', __('Name')); ?>
                    <?= $this->Paginator->sort('ImageCategories.slug', __('Slug')); ?>
                </th>
                <?php if($imgMaximumLevel > 1): ?>
                <th><?= $this->Paginator->sort('ParentImageCategories.name', __('Parent Category')); ?></th>
                <?php endif; ?>
                
                <th><?= $this->Paginator->sort('ImageCategories.created', __('Date Added')); ?></th>
                <th><?= $this->Paginator->sort('ImageCategories.lft', __('Order')); ?></th>
                <th><?= $this->Paginator->sort('ImageCategories.status', __('Status')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td>
                    <?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter2_bootstrap', 'templateVars' => ['addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('slug', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Slug'), 'templates' => 'filter_bootstrap']); ?>
                </td>
                <?php if($imgMaximumLevel > 1): ?>
                <td><?= $this->Form->control('parent_id', ['label' => false, 'class' => 'form-control form-filter input-sm', 'empty' => __('All Categories'), 'templates' => 'filter_bootstrap']); ?></td>
                <?php endif; ?>
                
                <td> <?php $picker = $this->FormAjax->pickerControl(); ?>
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
                <?php foreach($downloadCategories as $downloadCategorie): ?>
                <tr>
                   <td class="multi">
                        <?= array_key_exists($downloadCategorie->id, $treeList->toArray())?h($treeList->toArray()[$downloadCategorie->id]):h($downloadCategorie->name); ?>
                        <div class="text-sub"><span><?= __('Slug'); ?>:</span> <?= h($downloadCategorie->slug); ?></div>
                    </td>
                    <?php if($imgMaximumLevel > 1): ?>
                    <td><?= $downloadCategorie->has('parent_image_category')?array_key_exists($downloadCategorie->parent_image_category->id, $treeList->toArray())?h($treeList->toArray()[$downloadCategorie->parent_image_category->id]):h($downloadCategorie->parent_image_category->name):'' ?></td>
                    <?php endif; ?>
                   
                    <td><?= $this->Time->format($downloadCategorie->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center"><?php
                    $categoryTree = array_keys($treeList2->toArray(), $downloadCategorie->parent_id);
                    if($this->Paginator->sortKey() == 'DownloadCategories.lft')
                    {
                        $currentKeyId = array_search($downloadCategorie->id, $categoryTree);
                        $previousNode = ((array_key_exists($currentKeyId - 1, $categoryTree))?true:false);
                        $nextNode = ((array_key_exists($currentKeyId + 1, $categoryTree))?true:false);

                        if($nextNode)
                        {
                            echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-down']), 
                                ['action' => 'move', 'down', $downloadCategorie->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move image category #{0} down?', $downloadCategorie->id)]);
                        }
                        else
                        {
                            echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }

                        if($previousNode)
                        {
                            echo ' '.$this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-up']), 
                                ['action' => 'move', 'up', $downloadCategorie->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move image category #{0} up?', $downloadCategorie->id)]);
                        }
                        else
                        {
                            echo ' '.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }
                    }
                    else
                    {
                        echo $this->Html->link('#'.(array_search($downloadCategorie->id, $categoryTree) + 1), 'javascript:void(0);', ['class' => 'font-blue-steel', 'escape' => false]);
                    }
                    ?></td>
                    <td class="text-center"><?php
                    if($downloadCategorie->status):
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-check']), 
                            ['action' => 'statusChange', 'inactive', $downloadCategorie->id]+$pageNo, ['class' => 'font-blue-steel', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to inactive image category #{0}?', $downloadCategorie->id)]);
                    else:
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), 
                            ['action' => 'statusChange', 'active', $downloadCategorie->id]+$pageNo, ['class' => 'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to active image category #{0}?', $downloadCategorie->id)]);
                    endif;
                    ?></td>
                    <td class="text-center">
                       
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), 
                            ['action' => 'edit', $downloadCategorie->id]+$pageNo, ['class'=>'font-blue-steel', 'escape' => false]); ?>
                       
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $downloadCategorie->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete image category #{0}?', $downloadCategorie->id)]); ?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td <?= ($imgMaximumLevel > 1)?'colspan="9"':'colspan="8"'?> class="text-center danger"><?= __('No record found...'); ?></td>
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
