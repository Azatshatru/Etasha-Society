<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
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
                <th><?= $this->Paginator->sort('Classes.name', __('Name')); ?></th>
                <th><?= $this->Paginator->sort('Classes.created', __('Date Added')); ?></th>
                <th><?= $this->Paginator->sort('Classes.lft', __('Order')); ?></th>
                <th><?= $this->Paginator->sort('Classes.status', __('Status')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td><?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter_bootstrap']); ?></td>
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
                <?php foreach($classes as $class): ?>
                <tr>
                    <td><?= h($class->name); ?></td>
                    <td><?= $this->Time->format($class->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center"><?php
                    $categoryTree = array_keys($treeList->toArray(), $class->parent_id);
                    if($this->Paginator->sortKey() == 'Classes.lft')
                    {
                        $currentKeyId = array_search($class->id, $categoryTree);
                        $previousNode = ((array_key_exists($currentKeyId - 1, $categoryTree))?true:false);
                        $nextNode = ((array_key_exists($currentKeyId + 1, $categoryTree))?true:false);

                        if($nextNode)
                        {
                            echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-down']), 
                                ['action' => 'move', 'down', $class->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move course #{0} down?', $class->id)]);
                        }
                        else
                        {
                            echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }

                        if($previousNode)
                        {
                            echo ' '.$this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-chevron-circle-up']), 
                                ['action' => 'move', 'up', $class->id]+$pageNo, ['class'=>'font-grey-mint', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to move course #{0} up?', $class->id)]);
                        }
                        else
                        {
                            echo ' '.$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-circle']), 
                                'javascript:void(0);', ['class' => 'font-grey-mint', 'escape' => false]);
                        }
                    }
                    else
                    {
                        echo $this->Html->link('#'.(array_search($class->id, $categoryTree) + 1), 'javascript:void(0);', ['class' => 'font-blue-steel', 'escape' => false]);
                    }
                    ?></td>
                    <td class="text-center"><?php
                    if($class->status):
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-check']), 
                            ['action' => 'statusChange', 'inactive', $class->id]+$pageNo, ['class' => 'font-blue-steel', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to inactive course #{0}?', $class->id)]);
                    else:
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), 
                            ['action' => 'statusChange', 'active', $class->id]+$pageNo, ['class' => 'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to active course #{0}?', $class->id)]);
                    endif;
                    ?></td>
                    <td class="text-center">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), 
                            ['action' => 'edit', $class->id]+$pageNo, ['class'=>'font-blue-steel', 'escape' => false]); ?>
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $class->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete course #{0}?', $class->id)]); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="9" class="text-center danger"><?= __('No record found...'); ?></td>
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
