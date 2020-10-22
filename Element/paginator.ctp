<?php
/**
 * @author: Sonia Solanki
 * @date: Oct 15,2018
 * @version: 1.0.0
 */

$this->Paginator->templates([
    'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>'           
]);

?>
<div class="row">
    <div class="col-md-5 col-sm-5">
        <div class="dataTables_info" role="status" aria-live="polite">
            <?= $this->Paginator->counter(__('Showing {{start}} to {{end}} of {{count}} records')); ?>
        </div>
    </div>
    <div class="col-md-7 col-sm-7">
        <div class="Page navigation">
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
