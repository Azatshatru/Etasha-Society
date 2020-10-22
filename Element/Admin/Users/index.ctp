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
                <th><?= $this->Paginator->sort('Users.name', __('Name')); ?></th>
                <th><?= $this->Paginator->sort('Users.email', __('Email')); ?></th>
                <th><?= $this->Paginator->sort('Users.role', __('Role')); ?></th>
                <th><?= $this->Paginator->sort('Users.mobile', __('Mobile')); ?></th>
                <th><?= $this->Paginator->sort('Users.last_login', __('Last Login')); ?></th>
                <th><?= $this->Paginator->sort('Users.created', __('Date Added')); ?></th>
                <th><?= $this->Paginator->sort('Users.status', __('Status')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td><?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('email', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Email'), 'templates' => 'filter_bootstrap']); ?></td>
                <td>
                    <?php $options = ['Admin' => 'Admin', 'Editor' => 'Editor']; ?>
                    <?= $this->Form->control('role', ['label' => false, 'class' => 'form-control form-filter input-sm', 'options' => $options, 'empty' => __('All Role'), 'templates' => 'filter_bootstrap']); ?>
                </td>
                <td><?= $this->Form->control('mobile', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Mobile'), 'templates' => 'filter_bootstrap']); ?></td>
                <td>
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
                    <?= $this->Form->control('last_login_from', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('From'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker, 'addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('last_login_to', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('To'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </td>
                <td>
                    <?= $this->Form->control('created_from', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('From'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker, 'addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('created_to', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('To'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </td>
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
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?= h($user->name); ?></td>
                    <td><?= h($user->email); ?></td>
                    <td><?= h($user->role); ?></td>
                    <td><?= h($user->mobile); ?></td>
                    <td><?= $user->last_login?$this->Time->format($user->last_login, 'dd MMM yyyy'):__('N/A'); ?></td>
                    <td><?= $this->Time->format($user->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center"><?php
                    if($user->status):
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-check']), 
                            ['action' => 'statusChange', 'inactive', $user->id]+$pageNo, ['class' => 'font-blue-steel', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to inactive user #{0}?', $user->id)]);
                    else:
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), 
                            ['action' => 'statusChange', 'active', $user->id]+$pageNo, ['class' => 'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to active user #{0}?', $user->id)]);
                    endif;
                    ?></td>
                    <td class="text-center">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), 
                            ['action' => 'edit', $user->id]+$pageNo, ['class'=>'font-blue-steel', 'escape' => false]); ?>
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $user->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete user #{0}?', $user->id)]); ?>
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
