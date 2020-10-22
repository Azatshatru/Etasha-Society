<?php 
$this->Html->script(['jquery.magnific-popup'], ['block' => true]);
/* $this->Html->script(['../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min'], ['block' => true]);
$this->Html->css(['../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min'], ['block' => true]); */

?>
<style>
.valid_error{
	color:red;
}
</style>
<link href="https://www.eyecon.ro/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
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
    <p>If you’re a self-motivated individual, ETASHA has a diverse range of opportunities for you. Be a part of the change-making process and get going on a transformational journey.
</p>
    

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
      <p>ETASHA values its volunteers for their diverse and creative inputs, enthusiasm and the value addition that they bring. And that’s what also brings us closer to achieving our goals. Our volunteers vary from bright 18-year olds to energetic 60-year olds, students, professionals, people taking a break from work and housewives with time to spare. Teaching, Writing, Photography, Data Analysis, Video-making, Counselling, whatever be your calling, you can always streamline your passion towards creating value for ETASHA trainees.</p>
      <a class="popup-modal" href="#test-modal-4">JOIN US</a>
	  
      <div id="test-modal-4" class="mfp-hide white-popup-block">
	  <form id="inquiry" class="inquiry" name="inquiry" action="javascript:void(0)" method="post" onSubmit="return savevolunteer();">
           <h2>VOLUNTEERING FORM ETASHA</h2>
           <p>Information provided will be kept confidential.</p>
           
           <label >
            Name <span class="validate-star">*</span>
				<?= $this->Form->control('name', ['label' => false,'class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="name"></span>
           </label>
           <label >
            Email <span class="validate-star">*</span>
				<?= $this->Form->control('email', ['label' => false,'type'=>'text','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="email"></span>
           </label>
           <label >
            Contact No.<span class="validate-star">*</span>
				<?= $this->Form->control('phone', ['label' => false,'type'=>'text','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="phone"></span>
           </label>
           <label >
            D.O.B<span class="validate-star">*</span>
               
				<?= $this->Form->control('day',['label' => false,'options' => $days,'empty' => true,'class'=>'form-control day-box','empty'=>'Select Day']) ?>
				
				<?= $this->Form->control('month',['label' => false,'options' => $month,'empty' => true,'class'=>'form-control month-box','empty'=>'Select Month']) ?>
				
				<?= $this->Form->control('year',['label' => false,'options' => $year,'empty' => true,'class'=>'form-control year-box','empty'=>'Select Year']) ?>
				
           </label>
		   <span class="valid_error" data-valmsg-for="day"></span><span class="valid_error" data-valmsg-for="month"></span><span class="valid_error" data-valmsg-for="year"></span>
           <label >
            Address <span class="validate-star">*</span>
                <?= $this->Form->control('address', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="address"></span>
           </label>
           <label c>
            Qualification <span class="validate-star">*</span>
             <?= $this->Form->control('qualification', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="qualification"></span>
           </label>
           <label>
            College/University
             <?= $this->Form->control('college', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="college"></span>
           </label>
           <label>
            Company, Designation (for working volunteers)
              <?= $this->Form->control('company_detail', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="company_detail"></span>
           </label>
           <label>
            Area of interest
             <?= $this->Form->control('interest', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="interest"></span>
           </label>
           <label>
            Specific Skills
             <?= $this->Form->control('skill', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="skill"></span>
           </label>
           <label>
            Languages - Spoken / Written
             <?= $this->Form->control('language', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="language"></span>
           </label>
           <label>
            No. of weeks you can volunteer
             <?= $this->Form->control('week_no', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="week_no"></span>
           </label>
           <label>
            Willings to travel / stay outsation Y/N
             <?= $this->Form->control('travel', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="travel"></span>
           </label>
           <label>
            The month and week you can begin (if selected)
             <?= $this->Form->control('begin', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="begin"></span>
           </label>
           <label>
            Any past experience of interning Y/N
             <?= $this->Form->control('experience', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="experience"></span>
           </label>
           <label>
            If Yes:
             
           </label>
           <label>
            Organizations Name
              <?= $this->Form->control('organization', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="organization"></span>
           </label>
           <label>
            Location
             <?= $this->Form->control('location', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="location"></span>
           </label>
           <label>
            Duration Of internship
             <?= $this->Form->control('internship', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="internship"></span>
           </label>
           <label>
            Nature of internship
            <?= $this->Form->control('internship_nature', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="internship_nature"></span>
           </label>
           <label>
            Project
             <?= $this->Form->control('project', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="project"></span>
           </label>
           <label>
            How did you hear about ETASHA?
             <?= $this->Form->control('about_etasha', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="about_etasha"></span>
           </label>
           
           

           <div class="bottomvl">
             <div class="col-sm-6">
               <p>Submitted by :</p>
               <?= $this->Form->control('submitted_by', ['label' => false,'type'=>'text','autocomplete' => 'off','id'=>'submitted_by','class'=>'sts']); ?>
				<span class="valid_error" data-valmsg-for="submitted_by"></span>
             </div>
             <div class="col-sm-6 bottfr">
               <p>Date :</p>
              
			   <?= $this->Form->control('submitted_date', ['label' => false,'type'=>'text','autocomplete' => 'off','id'=>'submitted_date','class'=>'','readonly'=>'true','value'=>date('d-m-Y')]); ?>
				<span class="valid_error" data-valmsg-for="submitted_date"></span>
             </div>
           </div>
		   
           <br>
           <?= $this->Form->button('Submit <div class="loader" style="float:right;display:none;"></div>', ['escape' => false]) ?>
		   <br>
            <div id="inquiryResponse"></div>
      <p><a class="popup-modal-dismiss" href="#"><?= $this->Html->Image('form-cr.png')?></a></p>
	 </form>
    </div>
	
    </div>
  </div>

  



  <div class="col-sm-6">
    <div class="connected">
      <div class="coninside">
        <?= $this->Html->Image('connected.png',['class'=>'img-responsive'])?>
      </div>
      <h2>Collaborate </h2>
      <p class="lesspad">Want to be an active partner or contributor, we’re keen to collaborate. Connect with us to know more about our work, active programmes, processes and upcoming events.

</p><p> Do sign up for a project tour for a deeper understanding of our work and programmes. We’re happy to meet and facilitate a project tour for you.</p>
<a href="contactus.html">CONNECT</a>
    </div>
  </div>
</div> 


</section>


<section class="bevol">
  <div class="container">
    <div class="beinside">
      <p>For corporate volunteering and internship opportunities, write to <a href="mailto:volunteer@etashasociety.org">volunteer@etashasociety.org</a> <br>or connect with Mini Bhargava (+91 9810652004), Latika Grover (+91 9871485889) or Parul Mehra
(+91 9810192201)
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
        <p>Aligned with the United Nation’s Sustainable Development Goals SDG 1 (No Poverty), SDG 4 (Quality Education), SDG 5 (Gender Equality) SDG 8 (Decent Work and Economic Growth) SDG 17 (Partnerships for the Goals), ETASHA’s programmes positively impact the ecosystem around the youth, including school systems, mothers, families and the community at large.
<br>
        We don’t just work on skill-development but on bringing about a positive mindset change in the individual and in the community at large, for sustained employment and income generation. We are constantly generating and sharing knowledge with diverse stakeholders from the community to influence sustainable impact at scale. Our overall goal is to improve lives and livelihoods and bring about a mindset change towards skilling. And that is why, ETASHA’s theory of change demonstrates not just sustainable livelihoods but a shift that our trainees experience in their lives – from confusion about life goals to confident decision making; from financial dependence to economic independence; from drifting jobs to building stable careers and most importantly a long-term vision towards evolving their lives.</p>
      </div>
    </div>


    </div>
  </div>
</section>
<script src="https://www.eyecon.ro/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>

function savevolunteer()
{
	if(validates() != false) {
		
        url = 'Enquiries/volunteer';
        $(".loader").css("display", "block");
		var posting = $.post(url, 
		{ 
		  
			name: $('#name').val(),
			phone: $('#phone').val(),
			email: $('#email').val(),
			address: $('#address').val(),    
			qualification: $('#qualification').val(),    
			college: $('#college').val(),    
			company_detail: $('#company-detail').val(),    
			interest: $('#interest').val(),
			skill: $('#skill').val(),
			language: $('#language').val(),
			week_no: $('#week-no').val(),    
			travel: $('#travel').val(),    
			begin: $('#begin').val(),    
			experience: $('#experience').val(),
			organization: $('#organization').val(),
			location: $('#location').val(),
			internship: $('#internship').val(),
			internship_nature: $('#internship-nature').val(),
			project: $('#project').val(),
			about_etasha: $('#about-etasha').val(),
			submitted_by: $('#submitted_by').val(),
			submitted_date: $('#submitted_date').val(),
			year: $('#year').val(),
			month: $('#month').val(),
			day: $('#day').val(),
		});

		posting.done(function (data) {
			$("#inquiryResponse").html('<div class="alert alert-success" style="display:block;" onclick=\'this.classList.add("hidden")\'>Volunteer form has been submitted successfully.</div>');
			$(".loader").css("display", "none");
			$("input.sts, textarea, select").val('');
			$(".valid_error").text('');
			
		});
	}
	else {
		$(".loader").css("display", "none");
		return false;
    }
}
function validates() {
	
	if (document.inquiry.name.value == "") {
       
        $(".valid_error[data-valmsg-for='name']").text("Please fill out name field.");
        $(".valid_error[data-valmsg-for='name']").parent().addClass("has-error");

        document.inquiry.name.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='name']").text("✔");
        $(".valid_error[data-valmsg-for='name']").parent().removeClass("has-error").addClass("has-success");
    }
	
	var testresult;
    if (document.inquiry.email.value == "") {
        $(".valid_error[data-valmsg-for='email']").text("Please fill out email Field.");
        $(".valid_error[data-valmsg-for='email']").parent().addClass("has-error");
        
        document.inquiry.email.focus();
        return false;
    }
    else {
        var string = document.inquiry.email.value;
        var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
        if (filter.test(string)) {
            testresult = true;
            
            $(".valid_error[data-valmsg-for='email']").text("✔");
            $(".valid_error[data-valmsg-for='email']").parent().removeClass("has-error").addClass("has-success");
        }
        else {
            $(".valid_error[data-valmsg-for='email']").text("Please fill out valid email.");
            $(".valid_error[data-valmsg-for='email']").parent().addClass("has-error");
            
            document.inquiry.email.value = "";
            document.inquiry.email.focus();
            return false;
        }
    }
	
	if (document.inquiry.phone.value == "") {

        $(".valid_error[data-valmsg-for='phone']").text("Please fill out phone Field.");
        $(".valid_error[data-valmsg-for='phone']").parent().addClass("has-error");

        document.inquiry.phone.focus();
        return false;
    }
    else {
		
		 var filter = /^(\+[0-9]{1,4}[- ]{0,1})?\(?([0-9]{3})\)?[- ]{0,1}([0-9]{3})[- ]{0,1}([0-9]{4})$/;
		 var string = document.inquiry.phone.value;
        if (filter.test(string)) {           
            $(".valid_error[data-valmsg-for='phone']").text("✔");
            $(".valid_error[data-valmsg-for='phone']").parent().removeClass("has-error").addClass("has-success");
        }
        else {
           $(".valid_error[data-valmsg-for='phone']").text("Please fill out valid mobile no.");
			$(".valid_error[data-valmsg-for='phone']").parent().removeClass("has-error").addClass("has-success");
            return false;
        }
        
    }
	if (document.inquiry.day.value == "") {
       
        $(".valid_error[data-valmsg-for='day']").text("Please select day.");
        $(".valid_error[data-valmsg-for='day']").parent().addClass("has-error");

        document.inquiry.day.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='day']").text("✔");
        $(".valid_error[data-valmsg-for='day']").parent().removeClass("has-error").addClass("has-success");
    }
	
	if (document.inquiry.month.value == "") {
       
        $(".valid_error[data-valmsg-for='month']").text("Please select month.");
        $(".valid_error[data-valmsg-for='month']").parent().addClass("has-error");

        document.inquiry.month.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='month']").text("✔");
        $(".valid_error[data-valmsg-for='month']").parent().removeClass("has-error").addClass("has-success");
    }
	
	if (document.inquiry.year.value == "") {
       
        $(".valid_error[data-valmsg-for='year']").text("Please select year.");
        $(".valid_error[data-valmsg-for='year']").parent().addClass("has-error");

        document.inquiry.year.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='year']").text("✔");
        $(".valid_error[data-valmsg-for='year']").parent().removeClass("has-error").addClass("has-success");
    }
	
	
	

	if (document.inquiry.address.value == "") {
       
        $(".valid_error[data-valmsg-for='address']").text("Please fill out address field.");
        $(".valid_error[data-valmsg-for='address']").parent().addClass("has-error");

        document.inquiry.address.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='address']").text("✔");
        $(".valid_error[data-valmsg-for='address']").parent().removeClass("has-error").addClass("has-success");
    }
	
	if(document.inquiry.qualification.value == "") {

        $(".valid_error[data-valmsg-for='qualification']").text("Plaese fill out qualification field.");
        $(".valid_error[data-valmsg-for='qualification']").parent().addClass("has-error");

        document.inquiry.qualification.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='qualification']").text("✔");
        $(".valid_error[data-valmsg-for='qualification']").parent().removeClass("has-error").addClass("has-success");
     }
	if(document.inquiry.submitted_by.value == "") {

        $(".valid_error[data-valmsg-for='submitted_by']").text("Plaese fill out submitted by field.");
        $(".valid_error[data-valmsg-for='submitted_by']").parent().addClass("has-error");

        document.inquiry.submitted_by.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='submitted_by']").text("✔");
        $(".valid_error[data-valmsg-for='submitted_by']").parent().removeClass("has-error").addClass("has-success");
     }
}
</script>
<?=
$this->Html->scriptBlock("
/* $.fn.datepicker.defaults.format = 'yyyy/mm/dd';
$('#dob').datepicker({
    //startDate: '-1d'
}); */
/* $('#tdate1').datepicker({
    //startDate: '-1d'
}); */
$(function(){
			window.prettyPrint && prettyPrint();
			$('.tdate1').datepicker({
				format: 'mm-dd-yyyy'
			});	
        	var nowTemp = new Date();
        	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        	var checkin = $('.tdate1').datepicker({
          	onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
        })
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
