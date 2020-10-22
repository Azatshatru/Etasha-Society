<?php
$this->Html->script(['pagination'], ['block' => true]);

$this->assign('metaTitle', 'Opportunity at Srajan | Srajan Academy');
$this->assign('metaKeywords', '');
$this->assign('metaDescription', '');

$this->assign('pageTitle', 'Opportunity at Srajan');
$this->Html->addCrumb(__('Opportunity at Srajan'), 'javascript:void(0);');
?>
<section class="vocational">
  <div class="container">
    <div class="vocationalin">
      <h2>CURRENT OPENINGS</h2>
      
    </div>
  </div>
</section>


<div class="container">
<br>
<?= $this->Flash->render() ?>

	<div id="content">
        	<div class="col-sm-12">
			<?= $this->element('JobApplicants/index'); ?>
			</div>
        	<div class="col-sm-12">
            	  <?= $this->Form->create($jobApplicant, ['type' => 'file','novalidate' => true,'id'=>'frmCareer']); ?>
                <div class="row">
					<div class="col-sm-6">
                        <div class="form-group">
                       <?= $this->Form->control('job_id', ['label' => __('Apply For'), 'class' => 'form-control', 'options' => $jobs, 'empty' => __('Select One'), 'data-val' => "true", 'data-val-required' => __('Please Select Job Type'), 'templates' => 'form_bootstrap_validate']); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('name', ['label' => __('Name'), 'class' => 'form-control', 'data-val' => "true", 'data-val-required' => __('Please Enter Name'), 'templates' => 'form_bootstrap_validate']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('post', ['label' => __('Job Post'), 'class' => 'form-control', 'data-val' => "true", 'data-val-required' => __('Please Enter Post'), 'templates' => 'form_bootstrap_validate']); ?>
                        </div>
                    </div>
					<div class="col-sm-6">
                        <div class="form-group">
                              <?php $options = ['Full Time' => 'Full Time', 'Part Time' => 'Part Time', 'Guest Lecturer' => 'Guest Lecturer', 'Visiting Faculty' => 'Visiting Faculty']; ?>
							<?= $this->Form->control('job_type', ['label' => __('Job Type'), 'class' => 'form-control', 'options' => $options, 'empty' => __('Select One'), 'data-val' => "true", 'data-val-required' => __('Please Select Job Type'), 'templates' => 'form_bootstrap_validate']); ?>
						</div>
                    </div>
                </div>
				<div class="row">
					<div class="col-sm-6">
                        <div class="form-group">
                             <?= $this->Form->control('email', ['label' => __('Email'), 'class' => 'form-control', 'data-val' => "true", 'data-val-required' => __('Enter Valid Email'), 'templates' => 'form_bootstrap_validate']); ?>
                        </div>
                    </div>
               
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('mobile', ['label' => __('Mobile No.'), 'class' => 'form-control', 'data-val' => "true", 'data-val-regex-pattern' => '^\d+$', 'data-val-required' => __('Please Enter Mobile'), 'data-val-regex' => __('Invalid Mobile No.'), 'templates' => 'form_bootstrap_validate']); ?>
                        </div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label></label>
                            <?= $this->Form->control('qualification', ['label' => __('Highest Qualification'), 'class' => 'form-control', 'data-val' => "true", 'data-val-required' => __('Please Enter Qualification'), 'templates' => 'form_bootstrap_validate']); ?>
                        </div>
                    </div>
					<div class="col-sm-6">
                        <div class="form-group">
                            <?php $options = ['01 Year' => '01 Year', '02 Years' => '02 Years', '03 Years' => '03 Years', '04 Years' => '04 Years', '05 Years' => '05 Years', '06 Years' => '06 Years', '07 Years' => '07 Years', '08 Years' => '08 Years', '09 Years' => '09 Years', '10 Years' => '10 Years', '10+ Years' => '10+ Years']; ?>
							<?= $this->Form->control('experience', ['label' => __('Experience'), 'class' => 'form-control', 'options' => $options, 'empty' => __('Select One'), 'templates' => 'form_bootstrap_validate']); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('area_expertise', ['label' => __('Area Expertise'), 'class' => 'form-control', 'templates' => 'form_bootstrap_validate']); ?>
                        </div>
                    </div>
					<div class="col-sm-6">
                        <div class="form-group">
                            <?= $this->Form->control('resume_file', ['label' => __('Upload CV'), 'class' => 'btn-block ', 'type' => 'file', 'data-val' => "true", 'data-val-required' => __('Please Upload CV'),'required'=>true, 'templates' => 'form_bootstrap_validate','accept'=>'.doc,.docx,.rtf,.pdf']); ?>
                            <p class="help-block">
                            	Select &amp; Upload your resume from here<br>(Only Upload .doc, .docx, .rtf or .pdf files)
                            </p>
                        </div>
                    </div>
            	</div>
                <div class="row">
                	<div class="col-sm-12">
                    	<?= $this->Form->button($this->Html->tag('div',$this->Html->tag('i', '', ['class' => 'icon-spin6 animate-spin']),['class'=>'imgloader']).
                __(' Submit'), ['escape' => false, 'class' => 'btn btn-dark btn-lg']); ?>
                    </div>
                </div><br>
            <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>


<?=
$this->Html->scriptBlock("
$(document).on('submit', '#frmCareer', function(){
	if($('#frmCareer #job-id').val() == '') {
        $(\"#frmCareer .valid_error[data-valmsg-for='job_id']\").text('×');
        $(\"#frmCareer .valid_error[data-valmsg-for='job_id']\").parent().removeClass('has-success').addClass('has-error');
        
        $('#frmCareer #job-id').focus();
        return false;
    } else {
        $(\"#frmCareer .valid_error[data-valmsg-for='job_id']\").text('✔');
        $(\"#frmCareer .valid_error[data-valmsg-for='job_id']\").parent().removeClass('has-error').addClass('has-success');
    }
    if($('#frmCareer #name').val() == '') {
        $(\"#frmCareer .valid_error[data-valmsg-for='name']\").text('×');
        $(\"#frmCareer .valid_error[data-valmsg-for='name']\").parent().removeClass('has-success').addClass('has-error');
        
        $('#frmCareer #name').focus();
        return false;
    } else {
        $(\"#frmCareer .valid_error[data-valmsg-for='name']\").text('✔');
        $(\"#frmCareer .valid_error[data-valmsg-for='name']\").parent().removeClass('has-error').addClass('has-success');
    }
     if($('#frmCareer #post').val() == '') {
        $(\"#frmCareer .valid_error[data-valmsg-for='post']\").text('×');
        $(\"#frmCareer .valid_error[data-valmsg-for='post']\").parent().removeClass('has-success').addClass('has-error');
        
        $('#frmCareer #post').focus();
        return false;
    } else {
        $(\"#frmCareer .valid_error[data-valmsg-for='post']\").text('✔');
        $(\"#frmCareer .valid_error[data-valmsg-for='post']\").parent().removeClass('has-error').addClass('has-success');
    }
	if($('#frmCareer #job-type').val() == '') {
        $(\"#frmCareer .valid_error[data-valmsg-for='job_type']\").text('×');
        $(\"#frmCareer .valid_error[data-valmsg-for='job_type']\").parent().removeClass('has-success').addClass('has-error');
        
        $('#frmCareer #job-id').focus();
        return false;
    } else {
        $(\"#frmCareer .valid_error[data-valmsg-for='job_type']\").text('✔');
        $(\"#frmCareer .valid_error[data-valmsg-for='job_type']\").parent().removeClass('has-error').addClass('has-success');
    }
	if($('#frmCareer #email').val() == '') {
        $(\"#frmCareer .valid_error[data-valmsg-for='email']\").text('×');
        $(\"#frmCareer .valid_error[data-valmsg-for='email']\").parent().removeClass('has-success').addClass('has-error');
        
        $('#frmCareer #email').focus();
        return false;
    } else {
        var filter = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if(filter.test($('#frmCareer #email').val())) {
            $(\"#frmCareer .valid_error[data-valmsg-for='email']\").text('✔');
            $(\"#frmCareer .valid_error[data-valmsg-for='email']\").parent().removeClass('has-error').addClass('has-success');
        } else {
            $(\"#frmCareer .valid_error[data-valmsg-for='email']\").text('×');
            $(\"#frmCareer .valid_error[data-valmsg-for='email']\").parent().removeClass('has-success').addClass('has-error');
            
            $('#frmCareer #email').val('');
            $('#frmCareer #email').focus();
            return false;
        } 
    }
	 
    if($('#frmCareer #mobile').val() == '') {
        $(\"#frmCareer .valid_error[data-valmsg-for='mobile']\").text('×');
        $(\"#frmCareer .valid_error[data-valmsg-for='mobile']\").parent().removeClass('has-success').addClass('has-error');
        
        $('#frmCareer #mobile').focus();
        return false;
    } else {
        var filter = /^(\+[0-9]{1,4}[- ]{0,1})?\(?([0-9]{3})\)?[- ]{0,1}([0-9]{3})[- ]{0,1}([0-9]{4})$/;
        if(filter.test($('#frmCareer #mobile').val())) {
            $(\"#frmCareer .valid_error[data-valmsg-for='mobile']\").text('✔');
            $(\"#frmCareer .valid_error[data-valmsg-for='mobile']\").parent().removeClass('has-error').addClass('has-success');
        } else {
            $(\"#frmCareer .valid_error[data-valmsg-for='mobile']\").text('×');
            $(\"#frmCareer .valid_error[data-valmsg-for='mobile']\").parent().removeClass('has-success').addClass('has-error');
            
            $('#frmCareer #mobile').val('');
            $('#frmCareer #mobile').focus();
            return false;
        } 
    }
    if($('#frmCareer #qualification').val() == '') {
        $(\"#frmCareer .valid_error[data-valmsg-for='qualification']\").text('×');
        $(\"#frmCareer .valid_error[data-valmsg-for='qualification']\").parent().removeClass('has-success').addClass('has-error');
        
        $('#frmCareer #qualification').focus();
        return false;
    } else {
        $(\"#frmCareer .valid_error[data-valmsg-for='qualification']\").text('✔');
        $(\"#frmCareer .valid_error[data-valmsg-for='qualification']\").parent().removeClass('has-error').addClass('has-success');
    }
    
	
    if($('#frmCareer #resume-file').value == 0) {
	$(\"#frmCareer .valid_error[data-valmsg-for='resume_file']\").text('×');
        $(\"#frmCareer .valid_error[data-valmsg-for='resume_file']\").parent().removeClass('has-success').addClass('has-error');
        
        $('#frmCareer #resume-file').focus();
        return false;
    } else {
        $(\"#frmCareer .valid_error[data-valmsg-for='resume_file']\").text('✔');
        $(\"#frmCareer .valid_error[data-valmsg-for='resume_file']\").parent().removeClass('has-error').addClass('has-success');
    } 
});
", ['block' => true]);
