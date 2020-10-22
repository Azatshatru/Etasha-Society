<?php 
$this->Html->script(['jquery.magnific-popup'], ['block' => true]);
$this->Html->script(['../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min'], ['block' => true]);
$this->Html->css(['../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min'], ['block' => true]);
?>
<div class="innerbanner clearfix">
	<?= $this->Html->Image('volbanner.png',['class'=>'img-responsive'])?>
</div>
<div class="container"><br>
<?= $this->Flash->render() ?>
</div>
<section class="startegy">

<div class="container">
  <div class="startegyinside">
    <h2>Share your Time</h2>
    <p>If you’re a self-motivated individual, ETASHA has a diverse range of
  opportunities for you. Be a part of the change-making process and get going on a transformational journey.</p>
    

  </div>
</div>
  
</section>


<section class="volunteer">
<div class="container">
  <div class="col-sm-6">
    <div class="becomevol">
      <div class="bcomeinside">
        <?= $this->Html->Image('volunteer.png',['class'=>'img-responsive'])?>
      </div>
      
      <h2>Become a Volunteer</h2>
      <p>ETASHA values its volunteers for their like-mindedness, creative inputs, enthusiasm and the value addition that they bring. And that’s what also brings us closer to achieving our goals. Our volunteers vary from bright 18-year olds to energetic 60-year olds, students, professionals, people taking a break from work and even housewives. Teaching, Writing, Photography, Data Analysis, Video-making, Counselling, whatever be your calling, you can always streamline your passion towards creating value for ETASHA trainees.</p>
      <a class="popup-modal" href="#test-modal-4">JOIN US</a>
	  
      <div id="test-modal-4" class="mfp-hide white-popup-block">
	  <?= $this->Form->create($enquiry) ?>
           <h2>VOLUNTEERING FORM ETASHA</h2>
           <p>Information provided will be kept confidential.</p>
           
           <label >
            Name <span class="validate-star">*</span>
				<?= $this->Form->control('name', ['label' => false,'required'=>true]); ?>
				<span class="valid_error" data-valmsg-for="name"></span>
           </label>
           <label >
            Email <span class="validate-star">*</span>
				<?= $this->Form->control('email', ['label' => false,'type'=>'text','required'=>true]); ?>
				<span class="valid_error" data-valmsg-for="email"></span>
           </label>
           <label >
            Contact No.<span class="validate-star">*</span>
				<?= $this->Form->control('phone', ['label' => false,'type'=>'text','required'=>true]); ?>
				<span class="valid_error" data-valmsg-for="phone"></span>
           </label>
           <label >
            D.O.B<span class="validate-star">*</span>
                <?= $this->Form->control('dob', ['label' => false,'type'=>'text','autocomplete' => 'off','required'=>true]); ?>
				<span class="valid_error" data-valmsg-for="phone"></span>
           </label>
           <label >
            Address <span class="validate-star">*</span>
                <?= $this->Form->control('address', ['label' => false,'type'=>'text','autocomplete' => 'off','required'=>true]); ?>
				<span class="valid_error" data-valmsg-for="address"></span>
           </label>
           <label c>
            Qualification <span class="validate-star">*</span>
             <?= $this->Form->control('qualification', ['label' => false,'type'=>'text','autocomplete' => 'off','required'=>true]); ?>
				<span class="valid_error" data-valmsg-for="qualification"></span>
           </label>
           <label>
            College/University
             <?= $this->Form->control('college', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="college"></span>
           </label>
           <label>
            Company, Designation (for working volunteers)
              <?= $this->Form->control('company_detail', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="company_detail"></span>
           </label>
           <label>
            Area of interest
             <?= $this->Form->control('interest', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="interest"></span>
           </label>
           <label>
            Specific Skills
             <?= $this->Form->control('skill', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="skill"></span>
           </label>
           <label>
            Languages - Spoken / Written
             <?= $this->Form->control('language', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="language"></span>
           </label>
           <label>
            No. of weeks you can volunteer
             <?= $this->Form->control('week_no', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="week_no"></span>
           </label>
           <label>
            Willings to travel / stay outsation Y/N
             <?= $this->Form->control('travel', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="travel"></span>
           </label>
           <label>
            The month and week you can begin (if selected)
             <?= $this->Form->control('begin', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="begin"></span>
           </label>
           <label>
            Any past experience of interning Y/N
             <?= $this->Form->control('experience', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="experience"></span>
           </label>
           <label>
            If Yes:
             
           </label>
           <label>
            Organizations Name
              <?= $this->Form->control('organization', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="organization"></span>
           </label>
           <label>
            Location
             <?= $this->Form->control('location', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="location"></span>
           </label>
           <label>
            Duration Of internship
             <?= $this->Form->control('internship', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="internship"></span>
           </label>
           <label>
            Nature of internship
            <?= $this->Form->control('internship_nature', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="internship_nature"></span>
           </label>
           <label>
            Project
             <?= $this->Form->control('project', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="project"></span>
           </label>
           <label>
            How did you hear about ETASHA?
             <?= $this->Form->control('about_etasha', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
				<span class="valid_error" data-valmsg-for="about_etasha"></span>
           </label>
           
           

           <div class="bottomvl">
             <div class="col-sm-6">
               <p>Submitted by :</p>
               <?= $this->Form->control('submitted_by', ['label' => false,'type'=>'text','autocomplete' => 'off','required'=>true]); ?>
				<span class="valid_error" data-valmsg-for="submitted_by"></span>
             </div>
             <div class="col-sm-6 bottfr">
               <p>Date :</p>
              <?= $this->Form->control('submitted_date', ['label' => false,'type'=>'text','autocomplete' => 'off','required'=>true,'id'=>'tdate1']); ?>
				<span class="valid_error" data-valmsg-for="submitted_date"></span>
             </div>
           </div>
           <br>
           <?= $this->Form->button('Submit', ['escape' => false]) ?>
      <p><a class="popup-modal-dismiss" href="#"><?= $this->Html->Image('form-cr.png')?></a></p>
	  <?= $this->Form->end(); ?>
    </div>
	
    </div>
  </div>

  



  <div class="col-sm-6">
    <div class="connected">
      <div class="coninside">
        <?= $this->Html->Image('connected.png',['class'=>'img-responsive'])?>
      </div>
      <h2>Collaborate </h2>
      <p class="lesspad">Want to be an active partner or donor, we’re keen to collaborate. Connect with us to know more about our work, active programmes, processes and events.</p><p> Do sign up for a project tour for a deeper understanding of our work and programmes. We’re happy to meet and facilitate a project tour for you.</p>
<a href="contactus.html">CONNECT</a>
    </div>
  </div>
</div> 


</section>


<section class="bevol">
  <div class="container">
    <div class="beinside">
      <p>For corporate volunteering and internship opportunities, write to <a href="mailto:volunteer.etashasociety@gmail.com">volunteer.etashasociety@gmail.com</a> <br>or connect with Ankita Chawla (+91-965 404 5534) or Parul Mehra
(+91 981 019 2201)
</p>
    </div>
  </div>
</section>

<section class="connectbox">
  <div class="container">
    <div class="row row-eq-height">
    <div class="col-sm-6">
      <div class="whyconnect">
        <?= $this->Html->Image('whycont.png',['class'=>'img-responsive'])?>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="rightcont">
        <h2>WHY CONNECT?</h2>
        <p>Aligned with the United Nation’s Sustainable Development Goals SDG 1 (No Poverty), SDG 4 (Quality Education), SDG 5 (Gender Equality) SDG 8 (Decent Work and Economic Growth) SDG 17 (Partnerships for the Goals), ETASHA’s programmes positively impact the ecosystem around the youth, including school systems, mothers, families and the community at large.<br>
        We don’t just work on skill-development but on bringing about a positive mindset change in the individual and in the community at large, for sustained employment and income generation. We are constantly generating and sharing knowledge with diverse stakeholders from the community to influence sustainable impact at scale. Our overall goal is to improve lives and livelihoods and bring about a mindset change towards skilling. And that is why, ETASHA’s theory of change demonstrates not just sustainable livelihoods but a shift that our trainees experience in their lives – from confusion about life goals to confident decision making; from financial dependence to economic independence; from drifting jobs to building stable careers and most importantly a long-term vision towards evolving their lives.</p>
      </div>
    </div>


    </div>
  </div>
</section>
<?=
$this->Html->scriptBlock("
$.fn.datepicker.defaults.format = 'yyyy/mm/dd';
$('#dob').datepicker({
    //startDate: '-1d'
});
$('#tdate1').datepicker({
    //startDate: '-1d'
});
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
