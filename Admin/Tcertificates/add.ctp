<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
use Cake\Utility\Hash;
use Cake\Utility\Text;

?>
<?= $this->Flash->render(); 
$this->Html->css(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
?>
<?= $this->Form->create($tcertificates,['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index'], ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save'), ['escape' => false, 'class' => 'btn btn-success']); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="tabbable tabbable-tabdrop tabbable-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><?= $this->Html->link(__('General'), '#general_details', ['escape' => false, 'data-toggle' => 'tab']); ?></li>
                        <li><?= $this->Html->link(__('TC Upload'), '#attachment_details', ['escape' => false, 'data-toggle' => 'tab']); ?></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="general_details">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <?= $this->Form->control('session_id', ['label' => ['text' => __('Session'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Select One'), 'templates' => 'form_bootstrap']); ?>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <?= $this->Form->control('class_id', ['label' => ['text' => __('Class'), 'class' => 'control-label'], 'class' => 'form-control', 'empty' => __('Select One'), 'templates' => 'form_bootstrap']); ?>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                                <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'default' => 1, 'required' => true, 'templates' => 'form_bootstrap']); ?>
                            </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="tab-pane fade" id="attachment_details">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th></th>
                                            <th><?= __('Scholar No.') ?></th>
                                            <th><?= __('Student Name') ?></th>
                                            <th><?= __('Date of Birth') ?></th>
                                            <th><?= __('TC image') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-plus']).
                                __(' Add'), ['escape' => false, 'type' => 'button', 'class' => 'btn blue btn-add-more-attachment']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

<table class="table table-striped table-bordered table-hover hidden" id="sample-table-attachment">
    <tbody>
        <tr>
            <td class="text-center">
                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 'javascript:void(0);', ['escape' => false, 'class' => 'font-red btn-remove-row']); ?>
                <?= $this->Form->control('tcertificates.random010110.identifier', ['type' => 'hidden', 'value' => 'KEY-EDU-random010110']); ?>
            </td>
            <td>
                <?= $this->Form->control('tcertificates.random010110.scholar_no', ['label' => false, 'class' => 'form-control control-name', 'templates' => 'form_bootstrap', 'required' => true]); ?>
            </td>
            <td>
                <?= $this->Form->control('tcertificates.random010110.student_name', ['label' => false, 'class' => 'form-control control-name', 'templates' => 'form_bootstrap', 'required' => true]); ?>
            </td>
            <td>
                <?php $picker = $this->FormAjax->pickerControl(); ?>
                <?= $this->Form->control('tcertificates.random010110.dob', ['label' => false, 'class' => 'form-control', 'type' => 'text', 'templates' => 'form2_bootstrap',  'templateVars' => ['picker' => $picker]]); ?>
            </td>
            <td>
                <?= $this->Form->file('tcertificates.random010110.tc_image', ['label' => false, 'class' => 'form-control control-specialization', 'templates' => 'form_bootstrap', 'required' => true]); ?>
                <?= $this->Html->tag('div', __('Allowed extensions: Gif, Jpeg, Png, Jpg, txt, doc, docx, pdf'), ['class' => 'font-purple-sharp']); ?>
            </td>
        </tr>
    </tbody>
</table>
<?= $this->Html->scriptBlock("
var totalRowsAttachment = 0;
$(document).on('click', '.btn-add-more-attachment', function() {
    $('#attachment_details tbody').append($('#sample-table-attachment tbody').html().replace(/random010110/g, totalRowsAttachment++));
     $('.date-picker').datepicker({
            orientation:'auto right',
            autoclose:!0,
            clearBtn:!0
        });
});

$(document).on('click', '.btn-remove-row', function() {
    $(this).closest('tr').remove();
});
", ['block' => true]);