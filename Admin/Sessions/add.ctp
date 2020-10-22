<?php
/**
 * @author: Sonia Solanki
 * @date: April 01, 2018
 * @version: 1.0.0
 */

$this->Html->css(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput'], ['block' => true]);
?>
<?= $this->Flash->render(); ?>

<?= $this->Form->create($session, ['type' => 'file']); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']).
                __(' Back'), ['action' => 'index'], ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Session'), ['escape' => false, 'class' => 'btn btn-success']); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Name'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
                    <?= $this->Form->control('status', ['label' => ['text' => __('Status'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Status'), 'default' => 1, 'required' => true, 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <?= $this->Form->control('top_on_list', ['label' => ['text' => __(' Move the session at the top of the list.'), 'class' => 'mt-checkbox mt-checkbox-outline'], 'class' => 'form-control', 'type' => 'checkbox', 'default' => 1, 'templates' => 'form_bootstrap']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>

