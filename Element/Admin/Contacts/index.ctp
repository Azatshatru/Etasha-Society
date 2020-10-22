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
                <th><?= $this->Paginator->sort('Contacts.type', __('Enquiry Type')); ?></th>
                <th><?= $this->Paginator->sort('Contacts.name', __('Name')); ?></th>
                <th><?= $this->Paginator->sort('Contacts.email', __('Email')); ?></th>
                <th><?= $this->Paginator->sort('Contacts.phone', __('Phone no.')); ?></th>
                <th><?= $this->Paginator->sort('Contacts.created', __('Date Added')); ?></th>
                <th><?= __('Actions'); ?></th>
            </tr>
            <tr role="row" class="filter">
                <td> <?php $options = ['connect' => 'connect', 'visit' => 'visit']; ?>
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
                <?php foreach($contacts as $enquiry): ?>
                <tr <?php if($enquiry->open == false){ ?> style="background-color:#d8d8d8" <?php } ?>>
                    <td class="type"><?= h($enquiry->type); ?></td>
                    <td class="name"><?= h($enquiry->name); ?></td>
                    <td class="email"><?= h($enquiry->email); ?></td>
                    <td class="phone"><?= h($enquiry->phone); ?></td>
                    <td class="created"><?= $this->Time->format($enquiry->created, 'dd MMM yyyy hh:mm a') ?></td>
					<td class="age hidden"><?= h($enquiry->age); ?></td>
					<td class="address hidden"><?= h($enquiry->addres); ?></td>
					<td class="profession hidden"><?= h($enquiry->profession); ?></td>
					<td class="sex hidden"><?= h($enquiry->sex); ?></td>
					<td class="about_first hidden"><?= h($enquiry->about_first); ?></td>
					<td class="about_second hidden"><?= h($enquiry->about_second); ?></td>
					<td class="comment hidden"><?= h($enquiry->comment); ?></td>
					<td class="organisation hidden"><?= h($enquiry->organisation); ?></td>
					<td class="visit_purpush hidden"><?= h($enquiry->visit_purpush); ?></td>
					<td class="visit_date hidden"><?= $this->Time->format($enquiry->visit_date, 'dd MMM yyyy ') ?></td>
					<td class="visit_purpose hidden"><?= $enquiry->visit_purpush ?></td>
					</td>
					</td>
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
        url: '" . $this->Url->build(['controller' => 'Contacts', 'action' => 'view']) . "/'+id,
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
    var type = $(this).parent().parent().find('.type').html();
     var name = $(this).parent().parent().find('.name').html();
     var email = $(this).parent().parent().find('.email').html();
     var phone = $(this).parent().parent().find('.phone').html();
     var created = $(this).parent().parent().find('.created').html();
     
	 
     var age = $(this).parent().parent().find('.age').html();
     var address = $(this).parent().parent().find('.address').html();
     var profession = $(this).parent().parent().find('.profession').html();
     var sex = $(this).parent().parent().find('.sex').html();
     var about_first = $(this).parent().parent().find('.about_first').html();
     var about_second = $(this).parent().parent().find('.about_second').html();
	 if(about_second==1)
	 {
		 var newsLetter ='Yes';
	 }
	 else{
		 var newsLetter ='No';
	 }
	 var comment = $(this).parent().parent().find('.comment').html();
     var organisation = $(this).parent().parent().find('.organisation').html();
     var visit_date = $(this).parent().parent().find('.visit_date').html();
     var visit_purpose = $(this).parent().parent().find('.visit_purpose').html();
    
    if(type=='visit'){
        
        $('#long-modal .modal-body').html('<table style=\'width:100%\'><tr><td class=\'namelable\'>Name : </td><td>'+name+'</td></tr><tr><td class=\'namelable\'>Organisation : </td><td>'+organisation+'</td></tr><tr><td class=\'namelable\'>Age : </td><td>'+age+'</td></tr><tr><td class=\'namelable\'>Profession : </td><td>'+profession+'</td></tr><tr><td class=\'namelable\'>Date for Visit : </td><td>'+visit_date+'</td></tr><tr><td class=\'namelable\'>Purpose For Visit : </td><td>'+visit_purpose+'</td></tr><tr><td class=\'namelable\'>How did you hear about ETASHA? : </td><td>'+about_first+'</td></tr><tr><td class=\'namelable\'>Comments : </td><td>'+comment+'</td></tr><tr><td class=\'namelable\'>Enquiry Date : </td><td>'+created+'</td></tr></table>');
    }else{
		$('#long-modal .modal-body').html('<table style=\'width:100%\'><tr><td class=\'namelable\'>Name : </td><td>'+name+'</td></tr><tr><td class=\'namelable\'>Email : </td><td>'+email+'</td></tr><tr><td class=\'namelable\'>Contact no. : </td><td>'+phone+'</td></tr><tr><td class=\'namelable\'>Age : </td><td>'+age+'</td></tr><tr><td class=\'namelable\'>Address : </td><td>'+address+'</td></tr><tr><td class=\'namelable\'>Profession : </td><td>'+profession+'</td></tr><tr><td class=\'namelable\'>Sex : </td><td>'+sex+'</td></tr><tr><td class=\'namelable\'>How did you hear about ETASHA? : </td><td>'+about_first+'</td></tr><tr><td class=\'namelable\'>Would you like to receive our Newsletter : </td><td>'+newsLetter+'</td></tr><tr><td class=\'namelable\'>Comments : </td><td>'+comment+'</td></tr><tr><td class=\'namelable\'>Enquiry Date : </td><td>'+created+'</td></tr></table>');
	}
     
    $('.namelable').css('width','25%');
    $('.namelable').css('padding','3%');
    $('.namelable').css('font-weight','600');
	});
", ['block' => true]);