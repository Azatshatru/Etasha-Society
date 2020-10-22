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
    <?= $this->Html->css(['http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700']) ?>
    <?= $this->Html->css(['../assets/global/plugins/font-awesome/css/font-awesome.min', '../assets/global/plugins/simple-line-icons/simple-line-icons.min', '../assets/global/plugins/bootstrap/css/bootstrap.min', '../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min', '../assets/global/css/components-rounded.min', '../assets/global/css/plugins.min','admin-custom']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="login">
    <div class="logo">
        <?= $this->Html->link($this->Html->image('logo.png'), ['controller' => 'Dashboards', 'action' => 'index'], ['escape' => false, 'alt' => $coreVariable['siteName']]); ?>
    </div>
    
    <div class="content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
    
    <div class="copyright">Copyright 2019 © ETASHA</div>
    
    <?= $this->Html->script(['../assets/global/plugins/jquery.min', '../assets/global/plugins/bootstrap/js/bootstrap.min', '../assets/global/plugins/js.cookie.min', '../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min', '../assets/global/plugins/jquery.blockui.min', '../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min']) ?>
    <?= $this->Html->script(['../assets/global/scripts/app.min']) ?>
    <?= $this->fetch('script') ?>
	<script>
	$('.creload').on('click', function() {
		var mySrc = $(this).prev().attr('src');
		$(this).prev().attr('src', mySrc);
		return false;
	});
	</script>
</body>
</html>
