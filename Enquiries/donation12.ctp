<?php
$this->Html->script(['jquery.magnific-popup'], ['block' => true]);
?>
<div class="container"><br>
	<?= $this->Flash->render() ?>
</div>
<div class="innerbanner clearfix" style="position: relative;">
<?= $this->Html->Image('Donate.jpg',['class'=>'img-responsive'])?>


<div class="donatenow animated zoomIn delay-.5s clearfix">
  <p>75% of the new jobs to be created in India will be ‘skill-based’. However, only 20% of the Indian workforce possesses ‘marketable skills’. This problem is particularly acute for the large and growing unemployed population in low income communities. Enable Skilling for the youth.<br> Be a part of the change.</p>
  <div class="donatetop">
    <button class="hvr-sweep-to-right">DONATE NOW</button>
  </div>
  
</div>

</div>


<section class="startegy">

<div class="container">
  <div class="startegyinside cons don">
    
    <h2 class="don">Give with purpose</h2>
    <p>ETASHA runs skilling and employability courses for the youth and also actively engages and impacts the adolescents, youth, men and women that form the ecosystem of the youth. So, when you give to ETASHA, you don’t just empower a youth, but an entire community.</p>
  

  </div>
</div>






</section>





<section class="impact" style="padding: 0px!important;">

  <h2>What is the impact of my donation?</h2>
  <p>Your donations help young minds live up to their fullest potential. ETASHA skills the youth and ensures their placement in <br>modern work environments; Mentors ITI teachers to become skilled teachers and helps ITI students to become employable;<br> Raises women as skilled and successful entrepreneurs; Allows adolescents to <br>recognise their interests and talents and explore options available to them through career counselling.</p>
</section>


<section class="impact">
  <div class="kindd">
  <h2>In-Kind Donations</h2>
  <p>Donate your old classroom and office material and create new learning experiences for ETASHA students. From laptops<br> to furniture to stationery, it’s all valued and so much needed in our classrooms. We’re sure you’ll feel proud to receive<br> pictures of your materials being put to good use in our classrooms.</p>

  <a class="popup-modal hvr-sweep-to-right" href="#test-modal-4" class="">DONATE</a>
  <br><br>
  <div id="test-modal-4" class="mfp-hide white-popup-block donation">
           <h2>In-Kind Donations</h2>
           
            <?= $this->Form->create($enquiry,['type'=>'file']) ?>
           <label>
              Name &nbsp;
             <?= $this->Form->control('name', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
           </label>
           <label>
            Address &nbsp;
             <?= $this->Form->control('address', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'fsdsvs sein']); ?>
           </label>
           <label class="wichck">
            Phone &nbsp;
             <?= $this->Form->control('phone', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'phoch']); ?>
           </label>
           
           <label class="wichck">
              E-mail &nbsp;
             <?= $this->Form->control('email', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'phoch']); ?>
			 
           </label>
           
          <label>
              Donations material &nbsp;
             <?= $this->Form->control('donations_material', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'donts']); ?>
           </label>

           <label>
              Drop or Pickup &nbsp;
             <?= $this->Form->control('drop_pickup', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'pick']); ?>
           </label>
           
          

           <div class="uploadbox">
             <p>Upload the image of the Material</p>
             <label for="file-upload" class="custom-file-upload" style="width: 170px;text-align: center;">
            Upload image
            </label>
            <?= $this->Form->control('material_image', ['label' => false,'type'=>'file','id'=>'file-upload']); ?>
           </div>

           
           <br>
           <?= $this->Form->button('Send', ['escape' => false]) ?>
		 <?= $this->Form->end(); ?>
      <p><a class="popup-modal-dismiss" href="#">
	  <?= $this->Html->Image('crosscheck.png')?>
	  </a></p>
    </div>
  </div>

  </section>

  <section class="clearfix" style="width: 100%;float: left;margin: 0 auto;padding-bottom: 20px;">
<div class="totalamount clearfix">
  
  <p>You can also contribute directly through Paytm via QR code</p>
  <img src="img/paytm.png" class="img-responsive" style="display: inline-block;margin-right: 14px;">
  <?= $this->Html->Image('paytm.png',['class'=>'img-responsive','style'=>'display: inline-block;margin-right: 14px;'])?>
  <?= $this->Html->Image('ptmqr.png',['class'=>'img-responsive'])?>
</div>
</section>

<section class="ceretificat">
<div class="cerinside">
<h2>Credibility and Certifications</h2>
<ul>
  <li><img src="img/award.png"></li>
  <li><img src="img/allan.png"></li>
  <li><img src="img/caf.png"></li>
  <li><img src="img/give.png"></li>
  <li><img src="img/united.png"></li>

</ul>

</div>
</section>
  
  
</section>
<?=
$this->Html->scriptBlock("
$(function () {
  $('.popup-modal').magnificPopup({
    type: 'inline',
    preloader: true,
    focus: '#username',
    modal: true
  });
  $(document).on('click', '.popup-modal-dismiss', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
  });
});
", ['block' => true]);