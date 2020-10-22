<?php
//$this->Html->script(['alumni'], ['block' => true]);

$this->assign('metaTitle', ' Alumni| ' . __($coreVariable['siteName']));
$this->assign('metaKeywords', '' );
$this->assign('metaDescription', '');
$this->assign('pageTitle', 'Alumni');
$this->Html->addCrumb(__('Alumni'), 'javascript:void(0);');
?>

<div id="pageheader">
	<div class="container">
		<h1>Alumni</h1>
	</div>
</div>
<div class="container"><br>
<?= $this->Flash->render() ?>
</div>
<div class="container">
	
	<div id="content">
		
		<?= $this->Form->create($alumni, ['type' => 'file','class'=>'inquiry','id'=>'inquiry']); ?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('student_name', ['label' => ['text' => __('Name'), 'class' => 'control-label','for'=>'student_name'], 'class' => 'form-control','required'=>'required']); ?>
						<span class="valid_error" data-valmsg-for="name"></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('father_name', ['label' => ['text' => __('Fathers Name'), 'class' => 'control-label','for'=>'father_name'], 'class' => 'form-control','required'=>'required']); ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('email', ['label' => ['text' => __('Email'), 'class' => 'control-label','for'=>'email'], 'class' => 'form-control','required'=>'required']); ?>
						<span class="valid_error" data-valmsg-for="email"></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('mobile', ['label' => ['text' => __('Mobile No.'), 'class' => 'control-label','for'=>'mobile'], 'class' => 'form-control','required'=>'required']); ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('address', ['label' => ['text' => __('Address'), 'class' => 'control-label','for'=>'mobile'], 'class' => 'form-control','rows'=>3]); ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('msg', ['label' => ['text' => __('Comment'), 'class' => 'control-label','for'=>'mobile'], 'class' => 'form-control','rows'=>3]); ?>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('occupation', ['label' => ['text' => __('Occupation'), 'class' => 'control-label','for'=>'mobile'], 'class' => 'form-control']); ?>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('passout_yr', ['label' => ['text' => __('Year of Last Passout'), 'class' => 'control-label','for'=>'passout_yr'], 'class' => 'form-control']); ?>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('passout_class', ['label' => ['text' => __('Last Passout Class'), 'class' => 'control-label','for'=>'passout_yr'], 'class' => 'form-control']); ?>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->control('student_img', ['label' => ['text' => __('Upload Photo'), 'class' => 'control-label','for'=>'student_img'], 'class' => 'form-control','type'=>'file']); ?>
					</div>
				</div>
			</div>

			

			<input type="hidden" name="weinqValid" id="weinqValid">
			<div style="display:none"><input name="wespmCheckr" type="text" id="wespmCheckr"></div>

			<div class="form-group btnbar text-center">
				<?= $this->Form->button($this->Html->tag('div',$this->Html->tag('i', '', ['class' => 'icon-spin6 animate-spin']),['class'=>'imgloader']).
                __(' Submit'), ['escape' => false, 'class' => 'btn btn-dark btn-lg']); ?>
			</div>

			<div class="inquiryResponse"></div>
		<?= $this->Form->end(); ?>
		
	</div>
   		    
</div>

<?php 
$this->Html->scriptBlock(" 
$(document).ready(function(){

});
", ['block' => true]); ?>