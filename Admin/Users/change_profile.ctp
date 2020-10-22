<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
?>
<?= $this->Flash->render(); ?>

<?= $this->Form->create($user); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-home']).
                __(' Dashboard'), ['controller' => 'Dashboards', 'action' => 'index'], ['escape' => false, 'class' => 'btn purple']); ?>
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-star']).
                __(' Change Password'), ['action' => 'changePassword'], ['escape' => false, 'class' => 'btn btn-default btn-secondary-outline']); ?>
            <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Change'), ['escape' => false, 'class' => 'btn btn-success']); ?>
        </div>
    </div>
    <div class="portlet-body col-sm-8 col-sm-offset-2">
        <div class="tabbable-bordered">
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->control('name', ['label' => ['text' => __('Name'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->control('email', ['label' => ['text' => __('Email'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']) ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <?= $this->Form->control('mobile', ['label' => ['text' => __('Mobile'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>
