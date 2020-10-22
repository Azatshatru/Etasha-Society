<?php
/**
 * @author: Manoj tanwar
 * @date: April 22, 2019
 * @version: 1.0.0
 */
?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
    </div>
   <div class="portlet-body" id="defaultGridBlock">
       <?= $this->element('Admin/Alumnus/index'); ?>
   </div>
</div>
