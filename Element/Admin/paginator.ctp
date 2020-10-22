<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */
?>
<div class="row">
    <div class="col-md-5 col-sm-5">
        <div class="dataTables_info" role="status" aria-live="polite">
            <?= $this->Paginator->counter(__('Showing {{start}} to {{end}} of {{count}} records')); ?>
        </div>
    </div>
    <div class="col-md-7 col-sm-7 text-right">
        <div class="dataTables_paginate paging_bootstrap_full_number">
            <ul class="pagination">
                <?= $this->Paginator->first($this->Html->tag('i', '', ['class' => 'fa fa-angle-double-left']), ['escape' => false]); ?>
                <?= $this->Paginator->prev($this->Html->tag('i', '', ['class' => 'fa fa-angle-left']), ['escape' => false]); ?>
                <?= $this->Paginator->numbers(); ?>
                <?= $this->Paginator->next($this->Html->tag('i', '', ['class' => 'fa fa-angle-right']), ['escape' => false]); ?>
                <?= $this->Paginator->last($this->Html->tag('i', '', ['class' => 'fa fa-angle-double-right']), ['escape' => false]); ?>
            </ul>
        </div>
    </div>
</div>
