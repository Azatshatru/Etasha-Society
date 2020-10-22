<?php
/**
 * @author: Manoj Tanwar
 * @date: Fab 01, 2019
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
                <th><?= $this->Paginator->sort('Downloads.name', __('Title')); ?></th>
                <th><?= $this->Paginator->sort('DownloadCategories.name', __('Download Category')); ?></th>
                <th><?= $this->Paginator->sort('Downloads.from_date', __('Published From')); ?></th>
                <th><?= $this->Paginator->sort('Downloads.to_date', __('Published To')); ?></th>
                <th><?= $this->Paginator->sort('Downloads.created', __('Date Added')); ?></th>
                <th><?= $this->Paginator->sort('Downloads.lft', __('Order')); ?></th>
                <th><?= $this->Paginator->sort('Downloads.status', __('Status')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td><?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Title'), 'templates' => 'filter_bootstrap']); ?></td>
				<td><?= $this->Form->control('download_category_id', ['label' => false, 'class' => 'form-control form-filter input-sm', 'empty' => __('All Categories'), 'templates' => 'filter_bootstrap']); ?></td>
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
                <?php foreach($downloads as $download): ?>
                <tr>
                    <td><?= h($download->name); ?></td>
					<td><?php
                    $categories = [];
                    foreach($categoryPath[$download->download_category_id] as $category)
                    {
                        $categories[] = $category->name;
                    }
                    
                    echo implode(' &raquo; ', $categories)
                    ?></td>
                    <td><?= $download->from_date?$this->Time->format($download->from_date, 'dd MMM yyyy'):''; ?></td>
                    <td><?= $download->to_date?$this->Time->format($download->to_date, 'dd MMM yyyy'):''; ?></td>
                    <td><?= $this->Time->format($download->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center"><?php
                    $categoryTree = array_keys($treeList->toArray(), $download->download_category_id);
                    if($this->Paginator->sortKey() == 'Downloads.lft')
                    {
                        $currentKeyId = array_search($download->id, $categoryTree);
                        $previousNode = ((array_key_exists($currentKeyId - 1, $categoryTree))?true:false);
                        $nextNode = ((array_key_exists($currentKeyId + 1, $categoryTree))?true:false);

                        if($nextNode)
                        {
                            echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-down']), 
                                ['action' => 'move', 'down', $download->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move download #{0} down?', $download->id)]);
                        }
                        else
                        {
                            echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }

                        if($previousNode)
                        {
                            echo ' '.$this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-up']), 
                                ['action' => 'move', 'up', $download->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move download #{0} up?', $download->id)]);
                        }
                        else
                        {
                            echo ' '.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }
                    }
                    else
                    {
                        echo $this->Html->link('#'.(array_search($download->id, $categoryTree) + 1), 'javascript:void(0);', ['class' => 'font-blue-steel', 'escape' => false]);
                    }
                    ?></td>
                    <td class="text-center"><?php
                    if($download->status):
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-check']), 
                            ['action' => 'statusChange', 'inactive', $download->id]+$pageNo, ['class' => 'font-blue-steel', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to inactive download #{0}?', $download->id)]);
                    else:
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), 
                            ['action' => 'statusChange', 'active', $download->id]+$pageNo, ['class' => 'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to active download #{0}?', $download->id)]);
                    endif;
                    ?></td>
                    <td class="text-center">
                        
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), 
                            ['action' => 'edit', $download->id]+$pageNo, ['class'=>'font-blue-steel', 'escape' => false]); ?>
                         
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $download->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete download #{0}?', $download->id)]); ?>
                        
                         <?= (($download->file_name && file_exists($imageRoot.$download->file_name))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download']), 
                            $this->Url->build('/', true).$imageDir.$download->file_name, ['escape' => false, 'class' => 'font-blue-steel', 'target' => '_blank']):'');?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="8" class="text-center danger"><?= __('No record found...'); ?></td>
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
