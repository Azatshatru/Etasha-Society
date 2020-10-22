<?php
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
			    <th></th>
                <th><?= $this->Paginator->sort('Enquiries.type', __('Enquiry Type')); ?></th>
                <th><?= $this->Paginator->sort('Enquiries.name', __('Name')); ?></th>
                <th><?= $this->Paginator->sort('Enquiries.email', __('Email')); ?></th>
                <th><?= $this->Paginator->sort('Enquiries.phone', __('Phone no.')); ?></th>
                <th><?= $this->Paginator->sort('Enquiries.created', __('Date Added')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
				<td></td>
                <td> <?php $options = ['donation' => 'donation', 'volunteer' => 'volunteer','subscribe'=>'Subscribe']; ?>
                    <?= $this->Form->control('type', ['label' => false, 'class' => 'form-control form-filter input-sm', 'options' => $options, 'empty' => __('All Types'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('name', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Name'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('email', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Email'), 'templates' => 'filter_bootstrap']); ?></td>
                <td><?= $this->Form->control('phone', ['label' => false, 'class' => 'form-control form-filter input-sm', 'placeholder' => __('Phone no.'), 'templates' => 'filter_bootstrap']); ?></td>                
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
                <?php foreach($enquiries as $enquiry): ?>
                <tr <?php if($enquiry->open == false){ ?> style="background-color:#d8d8d8" <?php } ?>>
				     <td class="text-center"><?= ($enquiry->material_image != '' && file_exists($imageRoot.$enquiry->material_image))?$this->Image->image($enquiry->material_image, '', 90, 90, true, false, true):'' ?>
					 <?php
					  echo $this->Html->Image('media/'.str_replace("\\", '/', $enquiry->material_image),['width'=>'200','height'=>'200','style'=>'display:none;','class'=>'img_url']);
					 ?>
					 </td>
                    <td class="message hidden"><?= h($enquiry->message); ?></td>
                    <td class="subject hidden"><?= h($enquiry->subject); ?></td>
                    
                    <td class="donations_material hidden"><?= h(@$enquiry->donations_material); ?></td>
                    <td class="drop_pickup hidden"><?= h(@$enquiry->drop_pickup); ?></td>
                    
					
                    
                   
                    <td class="en_id hidden"><?= $enquiry->id; ?></td>
                    <td class="type"><?= h($enquiry->type); ?></td>
                    <td class="name"><?= h($enquiry->name); ?></td>
                    <td class="email"><?= h($enquiry->email); ?></td>
                    <td class="phone"><?= h($enquiry->phone); ?></td>
                    <td class="created"><?= $this->Time->format($enquiry->created, 'dd MMM yyyy hh:mm a') ?></td>
					<td class="dob hidden"><?= $this->Time->format($enquiry->dob, 'dd MMM yyyy') ?></td>
                    <td class="address hidden"><?= h(@$enquiry->address); ?></td>
                    <td class="qualification hidden"><?= h(@$enquiry->qualification); ?></td>
                    <td class="college hidden"><?= h(@$enquiry->college); ?></td>
                    <td class="company_detail hidden"><?= h(@$enquiry->company_detail); ?></td>
                    <td class="interest hidden"><?= h(@$enquiry->interest); ?></td>
                    <td class="skill hidden"><?= h(@$enquiry->skill); ?></td>
                    <td class="language hidden"><?= h(@$enquiry->language); ?></td>
                    <td class="week_no hidden"><?= h(@$enquiry->week_no); ?></td>
                    <td class="travel hidden"><?= h(@$enquiry->travel); ?></td>
                    <td class="begin hidden"><?= h(@$enquiry->begin); ?></td>
                    <td class="experience hidden"><?= h(@$enquiry->experience); ?></td>
                    <td class="organization hidden"><?= h(@$enquiry->organization); ?></td>
                    <td class="location hidden"><?= h(@$enquiry->location); ?></td>
                    <td class="internship hidden"><?= h(@$enquiry->internship); ?></td>
                    <td class="internship_nature hidden"><?= h(@$enquiry->internship_nature); ?></td>
                    <td class="project hidden"><?= h(@$enquiry->project); ?></td>
                    <td class="about_etasha hidden"><?= h(@$enquiry->about_etasha); ?></td>
                    <td class="submitted_by hidden"><?= h(@$enquiry->submitted_by); ?></td>
                    <td class="submitted_date hidden"><?= $this->Time->format($enquiry->submitted_date, 'dd MMM yyyy') ?></td>
                    <td class="text-center">
                        <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-eye']), 
                            ['action' => ''], ['class'=>'font-blue-steel modal-custom', 'escape' => false]); ?>
                        <?= $this->FormAjax->postLink($this->Html->tag('i', '', ['class' => 'fa fa-trash-o']), 
                            ['action' => 'delete', $enquiry->id]+$pageNo, ['class'=>'font-red', 'escape' => false, 'block' => true, 'confirm' => __('Are you sure you want to delete state #{0}?', $enquiry->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="5" class="text-center danger"><?= __('No record found...'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->element('Component/long-modal', [
    'showHeader' => true, 'modalTitle' => __('View Enquiry Detail')
]); ?>
<?php
echo $this->Form->end();

if($this->Paginator->counter('{{count}}'))
{
    echo $this->element('Admin/paginator');
}

echo $this->fetch('postLink');
echo $this->Html->scriptBlock("
$(document).on('click', '.modal-custom', function(event) {
    var id = $(this).parent().parent().find('.en_id').html();
 $.ajax({
        method: 'POST',
        url: '" . $this->Url->build(['controller' => 'Enquiries', 'action' => 'view']) . "/'+id,
        dataType: 'html',
        cache: false,
        beforeSend: function() {
            $('.loader-div').show();
            $('#ajax-indicator').fadeIn();
        }
    }).done(function(data) {
        $('#loader').html('');
    }).always(function() {
     $('.loader-div').hide();
        $('#ajax-indicator').fadeOut();
    });
    event.preventDefault();
    $('#long-modal').modal('show');
	 var src = $(this).parent().parent().find('.img_url').attr('src'); 
     var type = $(this).parent().parent().find('.type').html();
     var name = $(this).parent().parent().find('.name').html();
     var email = $(this).parent().parent().find('.email').html();
     var phone = $(this).parent().parent().find('.phone').html();
     var created = $(this).parent().parent().find('.created').html();
     var message = $(this).parent().parent().find('.message').html();
     
	 var dob = $(this).parent().parent().find('.dob').html();
     var address = $(this).parent().parent().find('.address').html();
     var qualification = $(this).parent().parent().find('.qualification').html();
     var college = $(this).parent().parent().find('.college').html();
     var company_detail = $(this).parent().parent().find('.company_detail').html();
     var interest = $(this).parent().parent().find('.interest').html();
	 var skill = $(this).parent().parent().find('.skill').html();
     var language = $(this).parent().parent().find('.language').html();
     var week_no = $(this).parent().parent().find('.week_no').html();
     var travel = $(this).parent().parent().find('.travel').html();
     var begin = $(this).parent().parent().find('.begin').html();
     var experience = $(this).parent().parent().find('.experience').html();
	 var organization = $(this).parent().parent().find('.organization').html();
     var location = $(this).parent().parent().find('.location').html();
     var internship = $(this).parent().parent().find('.internship').html();
     var internship_nature = $(this).parent().parent().find('.internship_nature').html();
     var project = $(this).parent().parent().find('.project').html();
     var about_etasha = $(this).parent().parent().find('.about_etasha').html();
	 var submitted_by = $(this).parent().parent().find('.submitted_by').html();
     var submitted_date = $(this).parent().parent().find('.submitted_date').html();
     var donations_material = $(this).parent().parent().find('.donations_material').html();
     var drop_pickup = $(this).parent().parent().find('.drop_pickup').html();
     
    if(type=='donation'){
        var subject = $(this).parent().parent().find('.subject').html();
        $('#long-modal .modal-body').html('<table style=\'width:100%\'><tr><td class=\'namelable\'>Image : </td><td><img src='+src+' width=210 height=210 /></td></tr><tr><td class=\'namelable\'>Name : </td><td>'+name+'</td></tr><tr><td class=\'namelable\'>Email : </td><td>'+email+'</td></tr><tr><td class=\'namelable\'>Phone no. : </td><td>'+phone+'</td></tr><tr><td class=\'namelable\'>Donations material : </td><td>'+donations_material+'</td></tr><tr><td class=\'namelable\'>Drop or Pickup  : </td><td>'+drop_pickup+'</td></tr><tr><td class=\'namelable\'>Address : </td><td>'+address+'</td></tr><tr><td class=\'namelable\'>Enquiry Date : </td><td>'+created+'</td></tr></table>');
	}
	else if(type=='subscribe'){
		var subject = $(this).parent().parent().find('.subject').html();
        $('#long-modal .modal-body').html('<table style=\'width:100%\'><tr><td class=\'namelable\'>Email : </td><td>'+email+'</td></tr><tr><td class=\'namelable\'>Enquiry Date : </td><td>'+created+'</td></tr></table>');
	}else{
		var subject = $(this).parent().parent().find('.subject').html();
        $('#long-modal .modal-body').html('<table style=\'width:100%\'><tr><td class=\'namelable\'>Name : </td><td>'+name+'</td></tr><tr><td class=\'namelable\'>Email : </td><td>'+email+'</td></tr><tr><td class=\'namelable\'>Phone no. : </td><td>'+phone+'</td></tr><tr><td class=\'namelable\'>Date of Birth. : </td><td>'+dob+'</td></tr><tr><td class=\'namelable\'>Address : </td><td>'+address+'</td></tr><tr><td class=\'namelable\'>Qualification : </td><td>'+qualification+'</td></tr><tr><td class=\'namelable\'>College : </td><td>'+college+'</td></tr><tr><td class=\'namelable\'>Company, Designation : </td><td>'+company_detail+'</td></tr><tr><td class=\'namelable\'>Area of interest : </td><td>'+interest+'</td></tr><tr><td class=\'namelable\'>Specific Skills : </td><td>'+skill+'</td></tr><tr><td class=\'namelable\'>Languages - Spoken / Written : </td><td>'+language+'</td></tr><tr><td class=\'namelable\'>No. of weeks you can volunteer : </td><td>'+week_no+'</td></tr><tr><td class=\'namelable\'>Willings to travel / stay outsation Y/N : </td><td>'+travel+'</td></tr><tr><td class=\'namelable\'>The month and week you can begin : </td><td>'+begin+'</td></tr><tr><td class=\'namelable\'>Any past experience of interning Y/N : </td><td>'+experience+'</td></tr><tr><td class=\'namelable\'>Organizations : </td><td>'+organization+'</td></tr><tr><td class=\'namelable\'>Location : </td><td>'+location+'</td></tr><tr><td class=\'namelable\'>Duration Of internship : </td><td>'+internship+'</td></tr><tr><td class=\'namelable\'>Nature of internship : </td><td>'+internship_nature+'</td></tr><tr><td class=\'namelable\'>Project : </td><td>'+project+'</td></tr><tr><td class=\'namelable\'>How did you hear about ETASHA? : </td><td>'+about_etasha+'</td></tr><tr><td class=\'namelable\'>Submitted by : </td><td>'+submitted_by+'</td></tr><tr><td class=\'namelable\'>Date  : </td><td>'+submitted_date+'</td></tr><tr><td class=\'namelable\'>Enquiry Date : </td><td>'+created+'</td></tr></table>');
	}
    
     
    $('.namelable').css('width','25%');
    $('.namelable').css('padding','3%');
    $('.namelable').css('font-weight','600');
});
", ['block' => true]);