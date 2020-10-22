
<div id="accordion" class="panel-group">
    <div class="panel panel-default">
        <?php $i = 0; foreach($paginateJobs as $job): ?>
          <?= $this->Html->tag('div', $this->Html->tag('H4',$this->Html->link($job->name, 'javascript:void(0)', ['data-toggle' => 'collapse', 'data-target' => '#job_'.$job->id, 'aria-expanded' => ($i?"false":"true"), 'class' => ($i?'collapsed':'')]),['class'=>'panel-title']), ['class' => 'panel-heading']) ?>
            <?= $this->Html->tag('div', $this->Html->tag('div', $job->content, ['class' => 'panel-body']), ['id' => 'job_'.$job->id, 'data-parent' => '#accordion', 'class' => 'panel-collapse collapse collapse '.($i++?'':'')]) ?>
        <?php endforeach; ?>
    </div>
</div>
<?php
if($this->Paginator->counter('{{pages}}') > 1)
{
    echo $this->element('paginator');
}
