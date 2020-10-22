<?php
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
                <th></th>
                <th><?= $this->Paginator->sort('Alumnus.student_name', __('Student Name')); ?></th>
                <th><?= $this->Paginator->sort('Alumnus.father_name', __('Father Name')); ?></th>
                <th><?= $this->Paginator->sort('Alumnus.email', __('Email')); ?></th>
                <th><?= $this->Paginator->sort('Alumnus.Mobile', __('Mobile')); ?></th>
                <th><?= $this->Paginator->sort('Alumnus.address', __('Address')); ?></th>
                <th><?= $this->Paginator->sort('Alumnus.occupation', __('Occupation')); ?></th>
                <th><?= $this->Paginator->sort('Alumnus.created', __('Date Added')); ?></th>
                <th><?= $this->Paginator->sort('Alumnus.status', __('Status')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td></td>
                <td><?= $this->Form->control('student_name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Student Name'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('father_name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Father Name'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('email', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Email'), 'templates' => 'filter_bootstrap']); ?></td>
				<td><?= $this->Form->control('mobile', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Mobile'), 'templates' => 'filter_bootstrap']); ?></td>
				<td></td>
				<td></td>
                <td>
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
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
                <?php foreach($alumnus as $alumni): ?>
                <tr>
                    <td class="text-center"><?= ($alumni->student_img != '' && file_exists($imageRoot.$alumni->student_img))?$this->Image->image($alumni->student_img, '', 120, 120, true, false, true):'' ?></td>
                    <td class="student_name"><?= $alumni->student_name ?></td>
                    <td class="father_name"><?= h($alumni->father_name); ?></td>
                    <td class="email"><?= h($alumni->email); ?></td>
                    <td class="mobile"><?= h($alumni->mobile); ?></td>
                    <td class="address"><?= h($alumni->address); ?></td>
                    <td class="occupation"><?= h($alumni->occupation); ?></td>
                    <td class="msg hidden"><?= h($alumni->msg); ?></td>
                    <td class="passout_yr hidden"><?= h($alumni->passout_yr); ?></td>
                    <td class="passout_class hidden"><?= h($alumni->passout_class); ?></td>
                    <td class="created"><?= $this->Time->format($alumni->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center"><?php
                    if($alumni->status):
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-check']), 
                            ['action' => 'statusChange', 'inactive', $alumni->id]+$pageNo, ['class' => 'font-blue-steel', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to inactive alumni #{0}?', $alumni->id)]);
                    else:
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), 
                            ['action' => 'statusChange', 'active', $alumni->id]+$pageNo, ['class' => 'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to active alumni #{0}?', $alumni->id)]);
                    endif;
                    ?></td>
                    <td class="text-center">
					 <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), 
                            ['action' => ''], ['class'=>'font-blue-steel modal-custom', 'escape' => false]); ?>
						<?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $alumni->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete alumni #{0}?', $alumni->id)]); ?>
                      
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="11" class="text-center danger"><?= __('No record found...'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
echo $this->Form->end(); ?>
<?= $this->element('Component/long-modal', [
    'showHeader' => true, 'modalTitle' => __('View Enquiry Detail')
]); 
if($this->Paginator->counter('{{count}}'))
{
    echo $this->element('Admin/paginator');
}
echo $this->fetch('postLink');
echo $this->Html->scriptBlock("
$(document).on('click', '.modal-custom', function(event) {
    var id = $(this).parent().parent().find('.en_id').html();

    event.preventDefault();
    $('#long-modal').modal('show');
     var student_name  = $(this).parent().parent().find('.student_name').html();
     var father_name   = $(this).parent().parent().find('.father_name').html();
     var email         = $(this).parent().parent().find('.email').html();
     var phone         = $(this).parent().parent().find('.mobile').html();
     var created       = $(this).parent().parent().find('.created').html();
     var message       = $(this).parent().parent().find('.msg').html();
     var occupation    = $(this).parent().parent().find('.occupation').html();
     var address       = $(this).parent().parent().find('.address').html();
     var passout_yr    = $(this).parent().parent().find('.passout_yr').html();
     var passout_class = $(this).parent().parent().find('.passout_class').html();
     
    
        var subject = $(this).parent().parent().find('.subject').html();
        $('#long-modal .modal-body').html('<table style=\'width:100%\'><tr><td class=\'namelable\'>Student Name : </td><td>'+student_name+'</td></tr><tr><td class=\'namelable\'>Father Name : </td><td>'+father_name+'</td></tr><tr><td class=\'namelable\'>Email : </td><td>'+email+'</td></tr><tr><td class=\'namelable\'>Mobile no. : </td><td>'+phone+'</td></tr><tr><td class=\'namelable\'>Date : </td><td>'+created+'</td></tr><tr><td class=\'namelable\'>Occupation : </td><td>'+occupation+'</td></tr><tr><td class=\'namelable\'>Passout yr : </td><td>'+passout_yr+'</td></tr><tr><td class=\'namelable\'>Passout class : </td><td>'+passout_class+'</td></tr><tr><td class=\'namelable\'>Message : </td><td>'+message+'</td></tr><tr><td class=\'namelable\'>Address : </td><td>'+address+'</td></tr></table>');
    
     
    $('.namelable').css('width','25%');
    $('.namelable').css('padding','3%');
    $('.namelable').css('font-weight','600');
});
", ['block' => true]);