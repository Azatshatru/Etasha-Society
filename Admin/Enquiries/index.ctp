
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions">
         <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).
                $this->Html->tag('span', __(' Export Volunteer Enquiry'), ['class' => 'hidden-xs']), ['action' => 'export', '_ext' => 'xlsx'], ['escape' => false, 'class' => 'btn btn-circle btn-info']); ?>
		<?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).
                $this->Html->tag('span', __(' Export Donation Enquiry'), ['class' => 'hidden-xs']), ['action' => 'donation', '_ext' => 'xlsx'], ['escape' => false, 'class' => 'btn btn-circle btn-info']); ?>
		<?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus']).
                $this->Html->tag('span', __(' Export Subscribe Enquiry'), ['class' => 'hidden-xs']), ['action' => 'exportSubscribe', '_ext' => 'xlsx'], ['escape' => false, 'class' => 'btn btn-circle btn-info']); ?>
        </div>
   </div>
   <div class="portlet-body" id="defaultGridBlock">
       <?= $this->element('Admin/Enquiries/index'); ?>
   </div>
</div>
