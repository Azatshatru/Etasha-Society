<?php
$pageNo = [];
if($this->request->getQuery('page') > 1)
{
    $pageNo = ['page' => $this->request->getQuery('page')];
}

echo $this->Flash->render();
echo $this->Form->control('page_url', ['type' => 'hidden', 'value' => $this->Url->build(['action' => 'course'])]);

echo $this->Form->create(NULL, ['id' => 'defaultGridBlockForm']);
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover dataTable">
        <thead>
            <tr role="row" class="heading sortable-control">
                <th><?= $this->Paginator->sort('Enquiries.name', __('Name')); ?></th>
                <th><?= $this->Paginator->sort('Enquiries.email', __('Email')); ?></th>
                <th><?= $this->Paginator->sort('Enquiries.phone', __('Phone no.')); ?></th>
                <th><?= $this->Paginator->sort('Enquiries.institute_id', __('School')); ?></th>
                <th><?= $this->Paginator->sort('Enquiries.created', __('Date Added')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td><?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('email', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Email'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('phone', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Phone no.'), 'templates' => 'filter_bootstrap']); ?></td>                
                <td><?= $this->Form->control('institute_id', ['label' => false, 'class' => 'form-control form-filter input-sm', 'empty' => __('All Institutes'), 'templates' => 'filter2_bootstrap', 'templateVars' => ['addonClass' => 'margin-bottom-5']]); ?></td>                
                <td>
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
                    <?= $this->Form->control('created_from', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('From'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker, 'addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('created_to', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('To'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
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
                <?php  foreach($enquiries as $enquiry): ?>
                <tr>
                    <td class="institute hidden"><?= h($enquiry->institute->name); ?></td>
                    <td class="course hidden"><?= h($enquiry->course->name); ?></td>
                    <td class="name"><?= h($enquiry->name); ?></td>
                    <td class="email"><?= h($enquiry->email); ?></td>
                    <td class="phone"><?= h($enquiry->phone); ?></td>
                    <td class="phone"><?= h($enquiry->institute->name); ?></td>
                    <td class="created"><?= $this->Time->format($enquiry->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), 
                            ['action' => ''], ['class'=>'font-blue-steel modal-custom', 'escape' => false]); ?>
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $enquiry->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete state #{0}?', $enquiry->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="5" class="text-center danger"><?= __('No record found...'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Component/long-modal', [
    'showHeader' => true, 'modalTitle' => __('View Enquiry Detail')
]); ?>
<?php
echo $this->Form->end();

if($this->Paginator->counter('{{count}}'))
{
    echo $this->element('Admin/paginator');
}

echo $this->fetch('postLink');
echo $this->Html->scriptBlock("
$(document).on('click', '.modal-custom', function(event) {
    event.preventDefault();
    $('#long-modal').modal('show');
     var name = $(this).parent().parent().find('.name').html();
     var email = $(this).parent().parent().find('.email').html();
     var phone = $(this).parent().parent().find('.phone').html();
     var created = $(this).parent().parent().find('.created').html();
     var institute = $(this).parent().parent().find('.institute').html();
     var course = $(this).parent().parent().find('.course').html();
     
    $('#long-modal .modal-body').html('<table style=\'width:100%\'><tr><td class=\'namelable\'>Name : </td><td>'+name+'</td></tr><tr><td class=\'namelable\'>Email : </td><td>'+email+'</td></tr><tr><td class=\'namelable\'>Phone no. : </td><td>'+phone+'</td></tr><tr><td class=\'namelable\'>Enquiry Date : </td><td>'+created+'</td></tr><tr><td class=\'namelable\'>School : </td><td>'+institute+'</td></tr><tr><td class=\'namelable\'>Course : </td><td>'+course+'</td></tr></table>');
    $('.namelable').css('width','25%');
    $('.namelable').css('padding','3%');
    $('.namelable').css('font-weight','600');
});
", ['block' => true]);