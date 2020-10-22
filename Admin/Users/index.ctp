<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions">
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).
                $this->Html->tag('span', __(' Add New User'), ['class' => 'hidden-xs']), ['action' => 'add'], ['escape' => false, 'class' => 'btn btn-circle btn-info']); ?>
        </div>
   </div>
   <div class="portlet-body" id="defaultGridBlock">
       <?= $this->element('Admin/Users/index'); ?>
   </div>
</div>
