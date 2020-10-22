<?php
/**
 * @author: Manoj Manoj
 * @date: April 22, 2019
 * @version: 1.0.0
 */
?>
<?= $this->Flash->render(); ?>
  
<?= $this->Form->create($setting); ?>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption text-uppercase"><?= $page_title; ?></div>
        <div class="actions btn-set">
           <?= $this->Form->button($this->Html->tag('i', '', ['class' => 'fa fa-check']).
                __(' Save Settings'), ['escape' => false, 'class' => 'btn btn-success']); ?>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable-bordered">
		    <div class="row">
				<div class="col-md-12">
					<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div align="center">
								<span class="caption-subject font-green bold uppercase">SMTP SETTING</span>
							</div>
						</div>
						<div class="portlet-body">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('smtp_host', ['label' => ['text' => __('Smtp Host'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('smtp_port', ['label' => ['text' => __('Smtp Port'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('smtp_email', ['label' => ['text' => __('Smtp Username'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('smtp_password', ['type' => 'password','label' => ['text' => __('Smtp Password'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<?php $options = ['1' => 'Active', '0' => 'Inactive']; ?>
								<?= $this->Form->control('tls', ['label' => ['text' => __('tls'), 'class' => 'control-label'], 'class' => 'form-control', 'options' => $options, 'empty' => __('Select Tls'), 'default' => 0, 'templates' => 'form_bootstrap']); ?>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div align="center">
								<span class="caption-subject font-green bold uppercase">EMAILS DETAIL</span>
							</div>
						</div>
						<div class="portlet-body">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('from_email', ['label' => ['text' => __('From Email'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('from_name', ['label' => ['text' => __('From Name'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('sender_name', ['label' => ['text' => __('Sender name'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('send_to', ['label' => ['text' => __('Send To'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap', 'multiple' => 'multiple','type'=>'email']); ?>
							</div>
							<!--<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('admission_send_to', ['label' => ['text' => __('Send to for Admission enquiry'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('career_send_to', ['label' => ['text' => __('Send to for career enquiry'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>-->
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div align="center">
								<span class="caption-subject font-green bold uppercase">SITE SETTING</span>
							</div>
						</div>
						<div class="portlet-body">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('site_mail', ['label' => ['text' => __('Site Mail ID'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('site_phone1', ['label' => ['text' => __('Site Phone no. 1'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('site_phone2', ['label' => ['text' => __('Site Phone no. 2'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('address', ['label' => ['text' => __('Site Address'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('fax', ['label' => ['text' => __('fax'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('city_office_address', ['label' => ['text' => __('City Office Address'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap','type'=>"textarea",'rows'=>3]); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('content', ['label' => ['text' => __('Content'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap','type'=>"textarea",'rows'=>3]); ?>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
            <!--<div class="row">
				<div class="col-md-12">
					<div class="portlet light portlet-fit bordered">
						<div class="portlet-title">
							<div align="center">
								<span class="caption-subject font-green bold uppercase">SOCIAL LINKS</span>
							</div>
						</div>
						<div class="portlet-body">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('facebook_link', ['label' => ['text' => __('Facebook Link'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('twitter_link', ['label' => ['text' => __('Twitter Link'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('instagram_link', ['label' => ['text' => __('Instagram Link'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('linkedin_link', ['label' => ['text' => __('Linkedin Link'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('youtube_link', ['label' => ['text' => __('Youtube Link'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('google_map', ['label' => ['text' => __('Google map Url'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('website', ['label' => ['text' => __('Website'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('site_url', ['label' => ['text' => __('Erp Url'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
							<div class="col-xs-12 col-sm-6">
								<?= $this->Form->control('video_link', ['label' => ['text' => __('Video Url'), 'class' => 'control-label'], 'class' => 'form-control', 'templates' => 'form_bootstrap']); ?>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>-->
        </div>
    </div>
</div>
 <?= $this->Form->end();  ?>