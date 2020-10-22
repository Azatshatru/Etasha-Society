<?php
/**
 * @author: Manoj Tanwar
 * @date: April 24,2019
 * @version: 1.0.0
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title><?= implode(' | ', [$page_title, __($coreVariable['siteName'])]) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow" />
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['http://fonts.googleapis.com/css?family=Oswald:400,300,700', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700']) ?>
    <?= $this->Html->css(['../assets/global/plugins/font-awesome/css/font-awesome.min', '../assets/global/plugins/simple-line-icons/simple-line-icons.min', '../assets/global/plugins/bootstrap/css/bootstrap.min', '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min', '../assets/global/plugins/bootstrap-select/css/bootstrap-select.min', '../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min', '../assets/global/css/components-rounded.min', '../assets/global/css/plugins.min']) ?>
    <?= $this->Html->css(['../assets/layouts/layout5/css/layout.min', '../assets/layouts/layout5/css/custom.min', 'admin-custom']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">
    <div class="wrapper">
        <header class="page-header">
            <nav class="navbar mega-menu" role="navigation">
                <div class="container-fluid">
                    <div class="clearfix navbar-fixed-top">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                            <span class="sr-only"><?= __('Toggle navigation') ?></span>
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                        </button>
                        <?= $this->Html->link($this->Html->image('../images/logo.png'), ['controller' => 'Dashboards', 'action' => 'index'], ['escape' => false, 'id' => 'index', 'class' => 'page-logo', 'alt' => __($coreVariable['siteName'])]); ?>
                        <div class="topbar-actions">
                            <div class="btn-group-img btn-group">
                                <button type="button" class="btn btn-sm md-skip">
                                    <span><?= !empty($userAuth)?__('Hi, {0}', $userAuth['name']):'' ?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="nav-collapse collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Dashboards.index')?'active open':''?>">
                                <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'icon-home']).
                                    __('Dashboard'), ['controller' => 'Dashboards', 'action' => 'index'], ['escape' => false, 'class' => 'text-uppercase']) ?>
                            </li>
                            <?php $managerMenuArray = ['Admin.DownloadCategories.index','Admin.Newsletters.index','Admin.NewsletterCategories.index','Admin.Users.index','Admin.News.index', 'Admin.Downloads.index','Admin.Enquiries.index','Admin.JobApplicants.index', 'Admin.Jobs.index','Admin.Contacts.index'] ?>
                            <li class="dropdown more-dropdown <?= (isset($activeMenu) && in_array($activeMenu, $managerMenuArray))?'active open-more selected':'' ?>">
                                <a href="javascript:void(0);" class="text-uppercase"> <i class="icon-layers"></i> <?= __('Manager') ?></a>
                                <ul class="dropdown-menu">
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('DownloadCategories', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.DownloadCategories.index')?'active':''?>"><?= $this->Html->link(__('List Download Categories'), ['controller' => 'DownloadCategories', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('Downloads', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Downloads.index')?'active':''?>"><?= $this->Html->link(__('List Download'), ['controller' => 'Downloads', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('NewsletterCategories', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.NewsletterCategories.index')?'active':''?>"><?= $this->Html->link(__('List Newsletter Categories'), ['controller' => 'NewsletterCategories', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('Newsletters', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Newsletters.index')?'active':''?>"><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('News', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.News.index')?'active':''?>"><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('Users', $navModules)): ?>
                                    <li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Users.index')?'active':''?>"><?= $this->Html->link(__('List User'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                                    <?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('Enquiries', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Enquiries.index')?'active':''?>"><?= $this->Html->link(__(' Enquiries'), ['controller' => 'Enquiries', 'action' => 'index']) ?></li>
									<?php endif; ?>
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('Enquiries', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Contacts.index')?'active':''?>"><?= $this->Html->link(__(' Contact Enquiries'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
									<?php endif; ?>
								    <?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('Jobs', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Jobs.index')?'active':''?>"><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('JobApplicants', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.JobApplicants.index')?'active':''?>"><?= $this->Html->link(__('Job Applicants'), ['controller' => 'JobApplicants', 'action' => 'index']) ?></li>
									<?php endif; ?>
                                </ul>
                            </li>
							 
							<?php $managergvMenuArray = ['Admin.ImageCategories.index', 'Admin.ImageGalleries.index'] ?>
							<li class="dropdown more-dropdown  <?= (isset($activeMenu) && in_array($activeMenu, $managergvMenuArray))?'active open-more selected':'' ?>">
								<a href="javascript:;"><i class="icon-settings"></i> <?= __('Photo Gallery & Video Gallery') ?> </a>
								<ul class="dropdown-menu">
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('ImageCategories', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.ImageCategories.index')?'active':''?>"><?= $this->Html->link(__('Image Gallery Category'), ['controller' => 'ImageCategories', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('ImageGalleries', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.ImageGalleries.index')?'active':''?>"><?= $this->Html->link(__('Image Gallery'), ['controller' => 'ImageGalleries', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('VideoCategories', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.VideoCategories.index')?'active':''?>"><?= $this->Html->link(__('Video Category'), ['controller' => 'VideoCategories', 'action' => 'index']) ?></li>
									<?php endif; ?>
									
									<?php if(($userAuth && $userAuth['role'] == 'Admin') || in_array('VideoGalleries', $navModules)): ?>
									<li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.VideoGalleries.index')?'active':''?>"><?= $this->Html->link(__('Video Gallery'), ['controller' => 'VideoGalleries', 'action' => 'index']) ?></li>
									<?php endif; ?>
								</ul>
							</li>
                            <?php $preferenceMenuArray = ['Admin.Users.changeProfile', 'Admin.Users.changePassword','Admin.Settings.index'] ?>
                            <li class="dropdown dropdown-fw dropdown-fw-disabled <?= (isset($activeMenu) && in_array($activeMenu, $preferenceMenuArray))?'active open selected':'' ?>">
                                <a href="javascript:void(0);" class="text-uppercase"> <i class="icon-settings"></i> <?= __('Preference') ?></a>
                                <ul class="dropdown-menu dropdown-menu-fw">
                                    <li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Users.changeProfile')?'active':''?>"><?= $this->Html->link(__('My Profile'), ['controller' => 'Users', 'action' => 'changeProfile']) ?></li>
                                    <li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Users.changePassword')?'active':''?>"><?= $this->Html->link(__('Change Password'), ['controller' => 'Users', 'action' => 'changePassword']) ?></li>
									 <li class="<?= (isset($activeMenu) && $activeMenu == 'Admin.Settings.index')?'active':''?>"><?= $this->Html->link(__('Site Setting'), ['controller' => 'Settings', 'action' => 'index']) ?></li>
                                </ul>
                            </li>
                            <li><?= $this->Html->link($this->Html->tag('i', '', ['class' => 'icon-logout']).
                                __('Logout'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, 'class' => 'text-uppercase']) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <div class="container-fluid">
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->fetch('content') ?>
                    </div>
                </div>
            </div>
            
            <p class="copyright">Copyright 2019 © ETASHA</p>
            
            <a href="#index" class="go2top">
                <i class="icon-arrow-up"></i>
            </a>
        </div>
    </div>
    
    <!--[if lt IE 9]>
    <?= $this->Html->script(['../assets/global/plugins/respond.min', '../assets/global/plugins/excanvas.min', '../assets/global/plugins/ie8.fix.min']) ?>
    <![endif]-->
    <?= $this->Html->script(['../assets/global/plugins/jquery.min', '../assets/global/plugins/bootstrap/js/bootstrap.min', '../assets/global/plugins/js.cookie.min', '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min', '../assets/global/plugins/jquery.blockui.min', '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min']) ?>
    <?= $this->Html->script(['../assets/global/plugins/bootstrap-select/js/bootstrap-select.min', '../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min', '../assets/global/scripts/app.min']) ?>
    <?= $this->Html->script(['../assets/layouts/layout5/scripts/layout.min', '../assets/pages/scripts/components-bootstrap-select.min', '../assets/pages/scripts/components-date-time-pickers.min', 'admin']) ?>
    <?= $this->fetch('script') ?>
</body>
</html>
