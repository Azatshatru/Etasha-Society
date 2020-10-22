<?php
/**
 * @author: Manoj Tanwar
 * @date: April 23, 2019
 * @version: 1.0.0
 */
$pageNo = [];
if($this->request->getQuery('page') > 1)
{
    $pageNo = ['page' => $this->request->getQuery('page')];
}

echo $this->Flash->render();
echo $this->Form->control('page_url', ['type' => 'hidden', 'value' => $this->Url->build(['action' => 'index'])]);

echo $this->Form->create(NULL, ['id' => 'defaultGridBlockForm']);
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover dataTable">
        <thead>
            <tr role="row" class="heading sortable-control">
                <th><?= $this->Paginator->sort('JobApplicants.name', __('Name')); ?></th>
                <th><?= $this->Paginator->sort('JobApplicants.email', __('Email')); ?></th>
                <th><?= $this->Paginator->sort('JobApplicants.mobile', __('Mobile')); ?></th>
                <th><?= $this->Paginator->sort('Jobs.name', __('Apply for Post')); ?></th>
                <th><?= $this->Paginator->sort('JobApplicants.job_type', __('Job Type')); ?></th>
                <th><?= $this->Paginator->sort('JobApplicants.experience', __('Experience')); ?></th>
                <!--<th><?= __('Area Expertise'); ?></th>-->
                <th><?= $this->Paginator->sort('JobApplicants.created', __('Date Added')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td><?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('email', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Email'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('mobile', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Mobile'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('job_id', ['label' => false, 'class' => 'form-control form-filter input-sm', 'empty' => __('All Posts'), 'templates' => 'filter_bootstrap']); ?></td>
                <td>
                    <?php $options = ['Full Time' => 'Full Time', 'Part Time' => 'Part Time', 'Guest Lecturer' => 'Guest Lecturer', 'Visiting Faculty' => 'Visiting Faculty']; ?>
                    <?= $this->Form->control('job_type', ['label' => false, 'class' => 'form-control form-filter input-sm', 'options' => $options, 'empty' => __('All Job Type'), 'templates' => 'filter_bootstrap']); ?>
                </td>
                <td>
                    <?php $options = ['01 Year' => '01 Year', '02 Years' => '02 Years', '03 Years' => '03 Years', '04 Years' => '04 Years', '05 Years' => '05 Years', '06 Years' => '06 Years', '07 Years' => '07 Years', '08 Years' => '08 Years', '09 Years' => '09 Years', '10 Years' => '10 Years', '10+ Years' => '10+ Years']; ?>
                    <?= $this->Form->control('experience', ['label' => false, 'class' => 'form-control form-filter input-sm', 'options' => $options, 'empty' => __('All Experiences'), 'templates' => 'filter_bootstrap']); ?>
                </td>
                <!--<td></td>-->
                <td>
                    <?php $picker = $this->FormAjax->pickerControl(); ?>
                    <?= $this->Form->control('created_from', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('From'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker, 'addonClass' => 'margin-bottom-5']]); ?>
                    <?= $this->Form->control('created_to', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('To'), 'readonly' => true, 'templates' => 'filter3_bootstrap', 'templateVars' => ['picker' => $picker]]); ?>
                </td>
                <td>
					
                    <div class="margin-bottom-5">
                        <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-search']).
                            __(' Search'), ['class'=>'btn btn-sm btn-success filter-submit margin-bottom']); ?>
                    </div>
                    <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-times']).
                        __(' Reset'), ['action' => 'resetFilters'], ['escape' => false, 'block' => true, 'class' => 'btn btn-sm btn-default filter-cancel', 'confirm' => __('Are you sure you want to reset the filters?')]); ?>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php if($this->Paginator->counter('{{count}}')): ?>
                <?php foreach($jobApplicants as $jobApplicant): ?>
                <tr>
                    <td class="name"><?= h($jobApplicant->name); ?></td>
                    <td class="email"><?= h($jobApplicant->email); ?></td>
                    <td class="mobile"><?= h($jobApplicant->mobile); ?></td>
                    <td class="job"><?= $jobApplicant->has('job')?($jobApplicant->job->name):''; ?></td>
                    <td class="job_type"><?= h($jobApplicant->job_type); ?></td>
                    <td class="experience"><?= h($jobApplicant->experience); ?></td>
                    <td class="resume hidden"><?= h($imageDir.$jobApplicant->resume_path); ?></td>
					<td class="area_expertise hidden"><?= h($jobApplicant->area_expertise); ?></td>
					<td class="qualification hidden"><?= h($jobApplicant->qualification); ?></td>
                    <!--<td <?= $jobApplicant->area_expertise?'class="text-center tooltips" data-container="body" data-html="true" data-placement="top" data-original-title="'.$jobApplicant->area_expertise.'"':'' ?>><?= $jobApplicant->area_expertise?$this->Html->tag('i', '', ['class' => 'fa fa-eye']):'' ?></td>-->
                    <td class="created"><?= $this->Time->format($jobApplicant->created, 'dd MMM yyyy hh:mm a') ?></td>
                    <td class="text-center">
						<?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), 
                            ['action' => ''], ['class'=>'font-blue-steel modal-custom', 'escape' => false]); ?>
                        <?= (($jobApplicant->resume_path && file_exists($imageRoot.$jobApplicant->resume_path))?$this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-download']), 
                            $this->Url->build('/', true).$imageDir.$jobApplicant->resume_path, ['escape' => false, 'class' => 'font-blue-steel', 'target' => '_blank']):'');?>
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $jobApplicant->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete applicant #{0}?', $jobApplicant->id)]); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="9" class="text-center danger"><?= __('No record found...'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Component/long-modal', [
    'showHeader' => true, 'modalTitle' => __('View Enquiry Detail')
]); ?>
<script>
function check(resume)
{
	
	var url1='http://www.z91.in/'+resume;
    var url = '<a href="'+url1+'" target="_blank">Resume</a> ';
	return url;
}
</script>
<?php
echo $this->Form->end();

if($this->Paginator->counter('{{count}}'))
{
    echo $this->element('Admin/paginator');
}
echo $this->fetch('postLink');
echo $this->Html->scriptBlock("
$(document).on('click', '.modal-custom', function(event) {
	var resume = $(this).parent().parent().find('.resume').html();
    var url = check(resume); 
    event.preventDefault();
    $('#long-modal').modal('show');
	 var name = $(this).parent().parent().find('.name').html();
     var email = $(this).parent().parent().find('.email').html();
     var phone = $(this).parent().parent().find('.mobile').html();
     var created = $(this).parent().parent().find('.created').html();
     var job = $(this).parent().parent().find('.job').html();
     var job_type = $(this).parent().parent().find('.job_type').html();
     var experience = $(this).parent().parent().find('.experience').html();
     
     var qualification = $(this).parent().parent().find('.qualification').html();
     var area_expertise = $(this).parent().parent().find('.area_expertise').html();
	 
	
     $('#long-modal .modal-body').html('<table style=\'width:100%\'><tr><td class=\'namelable\'>Name : </td><td>'+name+'</td></tr><tr><td class=\'namelable\'>Email : </td><td>'+email+'</td></tr><tr><td class=\'namelable\'>Phone no. : </td><td>'+phone+'</td></tr><tr><td class=\'namelable\'>Job : </td><td>'+job+'</td></tr><tr><td class=\'namelable\'>Job Type  : </td><td>'+job_type+'</td></tr><tr><td class=\'namelable\'>Experience : </td><td>'+experience+'</td></tr><tr><td class=\'namelable\'>Resume : </td><td>'+url+'</td></tr><tr><td class=\'namelable\'>Qualification : </td><td>'+qualification+'</td></tr><tr><td class=\'namelable\'>Area Expertise : </td><td>'+area_expertise+'</td></tr><tr><td class=\'namelable\'>Enquiry Date : </td><td>'+created+'</td></tr></table>');
	
	
    
     
    $('.namelable').css('width','25%');
    $('.namelable').css('padding','3%');
    $('.namelable').css('font-weight','600');
});
", ['block' => true]);