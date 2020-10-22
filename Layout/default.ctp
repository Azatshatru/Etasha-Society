<!DOCTYPE html>
<html>
<head>

  <style>
  @import url('https://fonts.googleapis.com/css?family=Roboto');
  </style>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Open+Sans:700');
  </style>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Satisfy');
  </style>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Maven+Pro');
  </style>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Roboto:700');
  </style>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Roboto:900');
  </style>
  <style>
  @import url('https://fonts.googleapis.com/css?family=Roboto:300');
  /*.press:hover .predrop{display: block!important;transition: all ease-in .4s;}*/
  .prosds{display: inline-block;font-size: 18px;margin-bottom: 0px;padding-left: 10px;}
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php if(!empty($title_for_layout)){ echo $title_for_layout;}else{?>ETASHA Society<?php }?></title>
	<meta name="keywords" content="<?php if(!empty($keywords)){ echo $keywords;}else{?><?php }?>"/>
<meta name="description" content="<?php if(!empty($description)){ echo $description;}else{?><?php }?>"/>
	<link rel="icon" type="image/png" href="images/30-logo.png">
	<?= $this->Html->css(['style', 'responsive', 'bootstrap.min']) ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
   <?= $this->Html->css(['magnific-popup', 'owl.carousel', 'owl.theme.default.min','common']) ?>
   <?= $this->fetch('css') ?>
   <?= $this->fetch('meta') ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
	<?= $this->Html->script(['bootstrap.min', 'owl.carousel', 'main']) ?>
	<?php
	if ($this->fetch('metaTags')) {
		echo $this->fetch('metaTags');
	}
	?>
 <!-- Global site tag (gtag.js) - Google Analytics -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180196294-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-180196294-1');
</script>
</head>
<body>

<header>
  
  <div class="top-head clearfix">
    <div class="logo">
      <a href="index.html">
		<?= $this->html->image('EtashaLogo.png')?>
	  </a>
    </div>

    <div class="rightside">
      

    <div class="rightnav">
      <ul>
        <li><a href="https://www.etashasociety.org/blog/covid/">COVID-19</a></li>
       <li><a href="aboutus.html">About Us</a></li>
       <li><a class="headd" href="http://etasha.azurewebsites.net/" target="_blank">Placement Hub</a></li>
       <li><a href="<?= $this->Url->build('/donation') ?>" class="weislt">
       Contribute</a></li>
       <li><a href="helpline.html" ><img src="img/LOGO 2.png" height="60px" width="130px" ></a></li>
       
       <!-- <li><a href="">Get Involved</a></li> --> 
      </ul>
    </div>



    <div class="menubar">
      <i class="fas fa-bars"></i>
    </div>

    </div>
     <div class="whitespace" ></div>
    <div class="hidden-menu animated fadeInRight delay-.5s">

      <div class="close">
        <?= $this->html->image('cross-n.png')?>
      </div>

      <ul>
        <li><a href="index.html">Home</a></li>
        <li class="whosd"><a href="#">Who we are</a>
        <span><i class="fas fa-chevron-down"></i></span>
        <div class="whodrop" id="dropnabv">
        <ul>
        <li><a href="aboutus.html">About Us</a></li>
        <li><a href="team.html">Our Team</a></li>
        <li><a href="governor.html">Governing Council</a></li>
        </ul>
        </div>
      </li>
        <li class="whatds"><a href="#">What we do</a>
        <span><i class="fas fa-chevron-down"></i></span>
        <div class="subdrop" id="dropnabv">
          <ul>
           <li><a href="vocational.html">Vocational Training</a></li>
           <li><a href="counselling.html">Counselling in Schools</a></li>
           <li><a href="employbility.html">Employability Skills Dev. </a></li>
           <li><a href="teachertraining.html">Training of Trainers</a></li>
           <li><a href="womendevelopment.html">Women Entrepreneurs</a></li>
           <li><a href="helpline.html">Helpline</a></li>
          </ul>
        </div>
        </li>
        
        <li class="newsds"><a href="https://www.etashasociety.org/blog/covid/">Covid Response</a></li>
        <li class="newsds"><a href="how-we-work.html">How we work</a></li>
        <li class="getin"><a href="#">Get Involved</a>
        <span><i class="fas fa-chevron-down"></i></span>
        <div class="getdrop" id="dropnabv">
          <ul>
          <li><a href="<?= $this->url->build('/volunteer') ?>">Volunteer</a></li>
          <li><a href="alumniconnect.html">Alumni Connect</a></li>
          <li><a href="<?= $this->Url->build('/current-opening') ?>">Current Openings</a></li>
          <li><a href="recruit.html">Recruit Our Trainee</a></li>
          <!-- <li><a href="http://eboxe.com/ETASHA/visitproject.html">Project Locations</a></li> -->
          <li><a href="<?= $this->Url->build('/donation') ?>">Make a Donation</a></li>
          </ul>
        </div>
      </li>
        <li class="resour"><a href="#">Resources & Media</a>
        <span><i class="fas fa-chevron-down"></i></span>
        <div class="resdrop" id="dropnabv">
          <ul>
           <li><a href="<?= $this->Url->build('/newsletter')?>">Newsletter</a></li>
           <li class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#">Press Room 
            <p class="prosds"><i class="fas fa-chevron-down rotate"></i></p>
            </a>
            
            <ul class="dropdown-menu" id="droppress">
            <li><a href="<?= $this->url->build('/news') ?>">News</a></li>
            <li><a href="<?= $this->url->build('/photo-gallery') ?>">Image Gallery</a></li>
            <li><a href="<?= $this->url->build('/videos') ?>">Video Gallery</a></li>
           
           
            </ul>
            
           </li>
           <li><a href="/blog">Blog</a></li>
           <li><a href="<?= $this->Url->build('/documents')?>">Documents</a></li>
           
          </ul>
        </div>
      </li>
        <li><a href="contactus.html">Contact us</a></li>
        <li><a href="<?= $this->Url->build('/donation') ?>">Donate</a></li>
      </ul>


      <div class="menusocial">
        <ul>
          <li><a href="http://www.facebook.com/etashasociety" target="_blank"><i class="fab fa-facebook-f ffb"></i></a></li>
          <li><a href="http://www.instagram.com/etashasociety/" target="_blank"><i class="fab fa-instagram intg"></i></a></li>
          <li><a href="http://twitter.com/etashasociety" target="_blank"><i class="fab fa-twitter twittr"></i></a></li>
          <li><a href="http://www.youtube.com/ETASHAIndia" target="_blank"><i class="fab fa-youtube youtb"></i></a></li>
          <li><a href="http://www.etashasociety.org/blog" target="_blank"><i class="fas fa-rss rssf"></i></a></li>
          <li><a href=""><i class="fab fa-google-plus-g ggp"></i></a></li>


        </ul>
      </div>
    </div>

  </div>

</header>
        <?= $this->fetch('content') ?>
<section class="support">
  <div class="container">
    <h1>Empower lives and co-create economic progress</h1>
    <a href="https://etashasociety.org/donate-now.html">Donate Now</a>
  </div>
</section>

<footer class="fbg clearfix">
  
<div class="insidefoot clearfix">
  
    
  <div class="firstone">
    <h2>ABOUT US</h2>
    <p>ETASHA Society is a non-profit organisation that empowers low-income communities by skilling them to be employable in a changing world.</p>
  </div>
<div class="contact">
    <h2>CONTACT US</h2>
    <p>E-48,GK-II Enclave, New Delhi, India<br>Ph: +91 11 29221320/21/22<br><a href="mailto:email: info@etashasociety.org">Email: info@etashasociety.org
    </a></p>
  </div>
  <div class="connect">
    <h2>CONNECT</h2>
    <ul>
      <li><a href="http://www.facebook.com/etashasociety" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
      <li><a href="http://www.instagram.com/etashasociety/" target="_blank"><i class="fab fa-instagram inst"></i></a></li>
      <li><a href="http://twitter.com/etashasociety" target="_blank"><i class="fab fa-twitter twit"></i></a></li>
      <li><a href="http://www.youtube.com/ETASHAIndia" target="_blank"><i class="fab fa-youtube yout"></i></a></li>
      <li><a href="http://www.etashasociety.org/blog" target="_blank"><i class="fas fa-rss blog"></i></a></li>
      <li><a href=""><i class="fab fa-google-plus-g goog"></i></a></li>
      
    </ul>
  </div>
 </div>

    <div class="footmenu">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="aboutus.html">Who We Are</a></li>
        <li><a href="how-we-work.html">How We Work</a></li>
        
        <li><a href="contactus.html">Get In Touch</a></li>
        <li><a href="<?= $this->Url->Build('/current-opening') ?>">Current Openings</a></li>
        <li><a href="/blog">Blog</a></li>
        <li><a href="<?= $this->url->build('/photo-gallery') ?>">Gallery</a></li>
      </ul>
    </div>

    <div class="lastline">
      <div class="insidelast">
        <div class="copy">
          <p>Copyright 2019 © ETASHA</p>
        </div>
      </div>
    </div>

</footer>
<?= $this->fetch('script') ?>
<a href="javascript:void(0);" id="back-to-top"><i class="icon-angle-up"></i></a>


<!-- InstanceEndEditable --> 

</body>
<!-- InstanceEnd --></html>