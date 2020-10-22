
<?php

/* $form3_bootstrap = [
    'error' => '<span class="help-block">{{content}}</span>',
    'inputContainer' => '<div class="form-group {{addonClass}} input {{type}}{{required}}">{{content}}</div>',
    'inputContainerError' => '<div class="form-group {{addonClass}} input {{type}}{{required}} has-error">{{content}}{{error}}</div>',
    'input' => '<div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-end-date="+0d"><input type="{{type}}" name="{{name}}"{{attrs}}/>{{picker}}</div>',
]; */
echo $this->Flash->render();
echo $this->Form->control('page_url', ['type' => 'hidden', 'value' => $this->Url->build(['action' => 'index'])]);

echo $this->Form->create(NULL, ['id' => 'TcertificatesSearch']);
?>
<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-md-6">
				<?= $this->Form->control('scholar_no', ['label' => 'Scholar No.', 'class' => 'form-control', 'placeholder' => __('Scholar number')]); ?>
			</div>   
			<div class="col-md-6">
				<?php //$picker = $this->FormAjax->pickerControl(); ?>
				<?= $this->Form->control('dob', ['label' => __('Date of birth'), 'class' => 'form-control', 'placeholder' => 'Date of birth','type' => 'text','autocomplete' => 'off','id'=>'tbDate']); ?>
			</div>
		</div>
		<div class="form-group btnbar text-center">
			<?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-search']).
				 __(' View Details'), ['class'=>'btn btn-dark btn-lg']); ?>
			
		</div>
	</div>
</div>
<br>
<?php if(!empty($tcertificates)){
$Tcertificates = $tcertificates;
?>
<div class="container">
	<div id="content">
<div class="table-responsive tab">
	<?php if($tcertificates): ?>
    <table width="333" style="border:1px solid #CCCCCC;">
        <thead>
            <tr role="row" class="heading sortable-control">
                <th colspan="2">Transfer certificate details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="30" style="text-align:center"><strong>Scholar No.</strong></td>
                <td width="166" style="text-align:center"> <?= h($Tcertificates->scholar_no); ?></td>
            </tr>
            <tr>
                <td style="text-align:center"><strong>Student Name </strong></td>
                <td style="text-align:center"><?= h($Tcertificates->student_name); ?></td>
            </tr>
            <tr>
                <td style="text-align:center"><strong>Date of birth</strong></td>
                <td style="text-align:center"><?= $this->Time->format($Tcertificates->dob, 'dd MMM yyyy') ?></td>
            </tr>
            <tr>
                <td style="text-align:center"><strong>Class</strong></td>
                <td style="text-align:center"><?= ($Tcertificates->has('class'))?h($Tcertificates->class->name):''; ?></td>
            </tr>
            <tr>
                <td style="text-align:center"><strong>Session</strong></td>
                <td style="text-align:center"><?= ($Tcertificates->has('session'))?h($Tcertificates->session->name):''; ?></td>
            </tr>
            <tr>
                <td style="text-align:center"><strong>Download </strong></td>
                <td style="text-align:center">
                    <strong>
                        <?php  $ext = pathinfo($Tcertificates['tc_image'], PATHINFO_EXTENSION); 
                        if($ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='gif'){ ?>
                            <?= ($Tcertificates['tc_image'] != '')?$this->Html->link('',$this->Image->image($Tcertificates['tc_image'], '', 600, 99999, true, false, true, false, false), ['escape' => false, 'class' => 'popup','title' => $Tcertificates['scholar_no']])
                              .$this->Html->tag('div',$this->Html->link($this->Html->tag('i','',['class' => 'fa fa-download']).__(' Download'), '/'.$imageRoot.$Tcertificates['tc_image'],['escape' => false,'class' => 'download','download']),['class' => 'down']):'';
                        } else { ?>
                        <?= ($Tcertificates['tc_image'] != '')?$this->Html->link('','/'.$imagePath.$Tcertificates['tc_image'],['escape' => false, 'class' => 'popup','title' => $Tcertificates['scholar_no']])
                                .$this->Html->tag('div',$this->Html->link($this->Html->tag('i','',['class' => 'fa fa-download']).__(' Download'), '/'.$imageRoot.$Tcertificates['tc_image'],['escape' => false,'class' => 'download','download']),['class' => 'down']):'';
                        } ?>
                    </strong>
                </td>
            </tr>
            </tbody>
    </table>
    <?php endif; ?>
</div>
</div></div>
<?php 

}else{ ?>
         <p style="color:#940607" align="center"><?= __('No record found...'); ?></p>
 <?php }
 echo $this->Form->end();
echo $this->fetch('postLink'); ?>
<?= $this->Html->scriptBlock("
$.fn.datepicker.defaults.format = 'yyyy/mm/dd';
$('#tbDate').datepicker({
    //startDate: '-1d'
});
$(document).on('submit', '#TcertificatesSearch', function(){
    if($('#TcertificatesSearch #scholar-no').val() == '') {
        $('#TcertificatesSearch #scholar-no').css('border','1px solid red');
        $('#TcertificatesSearch #scholar-no').focus();
        return false;
    } else {
         $('#TcertificatesSearch #scholar-no').css('border','1px solid #c2cad8');
    }
    
if($('#TcertificatesSearch #dob').val() == '') {
        $('#TcertificatesSearch #dob').css('border','1px solid red');
        $('#TcertificatesSearch #dob').focus();
        return false;
    } else {
       $('#TcertificatesSearch #dob').css('border','1px solid #c2cad8');
    }

});
", ['block' => true]);
