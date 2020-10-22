<?php
/**
 * @author: Manoj Tanwar
 * @date: April 22,2019
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
                <th><?= $this->Paginator->sort('Tcertificates.tc_image', __('TC')); ?></th>
                <th><?= $this->Paginator->sort('Tcertificates.scholar_no', __('Scholar No.')); ?></th>
                <th><?= $this->Paginator->sort('Tcertificates.student_name', __('Student Name')); ?></th>
                <th><?= $this->Paginator->sort('Sessions.name', __('Session')); ?></th>
                <th><?= $this->Paginator->sort('Classes.name', __('Class')); ?></th>
                <th><?= $this->Paginator->sort('Tcertificates.dob', __('Date of Birth')); ?></th>
                <th><?= $this->Paginator->sort('Tcertificates.created', __('Date Added')); ?></th>
                <th><?= $this->Paginator->sort('Tcertificates.status', __('Status')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td></td>
                <td><?= $this->Form->control('scholar_no', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('student_name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('session_id', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Session'),'empty' => __('Session'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('class_id', ['label' => false, 'class' => 'form-control form-filter input-sm', 'empty' => __('Class'), 'templates' => 'filter_bootstrap']); ?></td>
                <td>
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
                    <?= $this->Form->control('dob', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Date of birth'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker, 'addonClass' => 'margin-bottom-5']]); ?>
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
                <?php foreach($tcertificates as $tc): ?>
            <tr>
                <td class="text-center">
                    <?php  $ext = pathinfo($tc->tc_image, PATHINFO_EXTENSION); 
                    if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif'){ ?>
                    <?= ($tc->tc_image != '' && file_exists($imageRoot.$tc->tc_image))?$this->Html->link($this->Html->image($this->Image->image($tc->tc_image, '', 150, 150, true, false, true, false, false)),$this->Image->image($tc->tc_image, '', 600, 99999, true, false, true, false, false), ['escape' => false, 'class' => 'modal-custom']):''; } else { ?>
                    <?= ($tc->tc_image != '' && file_exists($imageRoot.$tc->tc_image))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download fa-lg']),'/'.$imagePath.$tc->tc_image,['escape' => false, 'class' => 'btn green modal-custom']):''; } ?>
                    
                </td>
                <td><?= h($tc->scholar_no); ?></td>
                <td><?= h($tc->student_name); ?></td>
                <td><?= $tc->has('session')?h($tc->session->name):'' ?></td>
                <td><?= $tc->has('class')?h($tc->class->name):'' ?></td>
                <td><?= $this->Time->format($tc->dob, 'dd MMM yyyy') ?></td>
                <td><?= $this->Time->format($tc->created, 'dd MMM yyyy hh:mm a') ?></td>
                <td class="text-center"><?php
                    if($tc->status):
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-check']), 
                            ['action' => 'statusChange', 'inactive', $tc->id]+$pageNo, ['class' => 'font-blue-steel', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to inactive TC #{0}?', $tc->id)]);
                    else:
                        echo $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']), 
                            ['action' => 'statusChange', 'active', $tc->id]+$pageNo, ['class' => 'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to active TC #{0}?', $tc->id)]);
                    endif;
                    ?>
                </td>
                <td class="text-center">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-edit']), 
                            ['action' => 'edit', $tc->id]+$pageNo, ['class'=>'font-blue-steel', 'escape' => false]); ?>
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $tc->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete admission form setting #{0}?', $tc->id)]) ?>
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
    'showHeader' => true, 'modalTitle' => __('TC Image')
]); 
if($this->Paginator->counter('{{count}}'))
{
    echo $this->element('Admin/paginator');
}
echo $this->fetch('postLink');
 $this->Html->scriptBlock("
$(document).on('click', '.modal-custom', function(event) {
    event.preventDefault();
    var img = $('<embed />', {src: $(this).attr('href')});
    $('#long-modal').modal('show');
    
    $('#long-modal .modal-body').html('<div align=\'center\'></div>');
    img.appendTo($('#long-modal .modal-body div'));
    $('embed').css('width','100%');
    $('embed').css('min-height','500px');
});
", ['block' => true]);