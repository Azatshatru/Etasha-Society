<?php
/**
 * @author: Manoj Tanwar
 * @date: Apr 24, 2019
 * @version: 1.0.0
 */
?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions">
            
            <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).
                $this->Html->tag('span', __(' Add New Newsletter'), ['class' => 'hidden-xs']), ['action' => 'add'], ['escape' => false, 'class' => 'btn btn-circle btn-info']); ?>
       
        </div>
   </div>
   <div class="portlet-body" id="defaultGridBlock">
       <?= $this->element('Admin/Newsletters/index'); ?>
   </div>
</div>
