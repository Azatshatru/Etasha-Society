<?php
$this->Html->script(['jquery.magnific-popup'], ['block' => true]);
?>
<div class="container"><br>
	<?= $this->Flash->render() ?>
</div>
<div class="innerbanner clearfix" style="position: relative;">
<?= $this->Html->Image('Donate.jpg',['class'=>'img-responsive'])?>

<style>
.valid_error{
	color:red;
}
</style>
<div class="donatenow animated zoomIn delay-.5s clearfix">
  <p>75% of the new jobs to be created in India will be ‘skill-based’. However, only 20% of the Indian workforce possesses ‘marketable’ skills. This challenge is particularly formidable for the large and growing unemployed population in low income communities. Enable Skilling for Employment of the Underprivileged.
Help Develop a ‘New Age India’</p>
  <div class="donatetop">
    <!--<button class="hvr-sweep-to-right popup-modal" href="#test-modal-4">DONATE NOW</button>-->
    <a class ="hvr-sweep-to-right btn" href="donate-now.html">DONATE NOW</a>
  </div>
  
</div>

</div>


<section class="startegy">

<div class="container">
  <div class="startegyinside cons don">
    
    <h2 class="don">Give with purpose</h2>
    <p>ETASHA runs vocational and employability skill development programs for young boys and girls, while actively engaging and impacting the work-related mindsets of adolescents, youth, parents and teachers that form the ecosystem of the youth. So, when you give to ETASHA, you don’t just empower a young person, but an entire community.</p>
  

  </div>
</div>






</section>





<section class="impact" style="padding: 0px!important;">

  <h2>What is the impact of my donation?</h2>
  <p>Your donations help young minds live up to their fullest potential. 
ETASHA skills the youth and ensures their placement in <br>
modern work environments; 
Trains ITI teachers to become skilled Mentors and 
helps ITI students to become employable;<br>
Raises women as skilled and successful entrepreneurs; 
Allows adolescents to 
recognise their interests and talents and <br>explore options available to them through career guidance and counselling.

</p>
</section>


<section class="impact">
  <div class="kindd">
  <h2>In-Kind Donations</h2>
  <p>Donate your old but usable classroom and office material and create new learning experiences for ETASHA students. From laptops
to furniture to stationery, it’s all valued and so much needed in our classrooms. We’re sure you’ll feel proud to receive
pictures of your materials being put to good use in our classrooms.</p>

  <a class="popup-modal hvr-sweep-to-right" href="#test-modal-4" class="">DONATE</a>
  <br><br>
  <div id="test-modal-4" class="mfp-hide white-popup-block donation">
           <h2>In-Kind Donations</h2>
           
            <form id="inquiry" class="inquiry" name="inquiry" action="javascript:void(0)" method="post" onSubmit="return saveDonation();">
           <label>
              Name &nbsp;
             <?= $this->Form->control('name', ['label' => false,'type'=>'text','autocomplete' => 'off']); ?>
			  <span class="valid_error" data-valmsg-for="name"></span>
           </label>
           <label>
            Address &nbsp;
             <?= $this->Form->control('address', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'fsdsvs sein']); ?>
			  <span class="valid_error" data-valmsg-for="address"></span>
           </label>
           <label class="wichck">
            Phone &nbsp;
             <?= $this->Form->control('phone', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'phoch']); ?>
			 <span class="valid_error" data-valmsg-for="phone"></span>
           </label>
           
           <label class="wichck">
              E-mail &nbsp;
             <?= $this->Form->control('email', ['label' => false,'type'=>'text','autocomplete' => 'off','class'=>'phoch']); ?>
			 <span class="valid_error" data-valmsg-for="email"></span>
			 
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
			
            <?= $this->Form->control('material_image', ['label' => false,'type'=>'file','id'=>'file-upload']); ?><div id="show"></div>
			<input type="hidden" value="" id="imge_name">
			<span class="valid_error" data-valmsg-for="imge_name"></span>
           </div><br>
            <div id="inquiryResponse"></div>
           
           <br>
           <?= $this->Form->button('Send <div class="loader" style="float:right;display:none;"></div>', ['escape' => false]) ?>
		</form>
      <p><a class="popup-modal-dismiss" href="#">
	  <?= $this->Html->Image('crosscheck.png')?>
	  </a></p>
    </div>
  </div>

  </section>


  <section class="impact" style="float: left;">
  <div class="kindd">
  <h2>Offline Donations</h2>
  <p> Click Here to know about donation options.</p>

  <a class="hvr-sweep-to-right" href="https://etashasociety.org/contribution-option.html" target="_blank">DONATE OPTIONS</a>
  <br><br>


           
           <br>
           
  </div>

  </section>

  <!-- <section class="clearfix" style="width: 100%;float: left;margin: 0 auto;padding-bottom: 20px;">
<div class="totalamount clearfix">
  
  <p>You can also contribute directly through Paytm via QR code</p>
 
  <?= $this->Html->Image('paytm.png',['class'=>'img-responsive','style'=>'display: inline-block;margin-right: 14px;'])?>
  <?= $this->Html->Image('ptmqr.png',['class'=>'img-responsive'])?>
</div>
</section> -->

<section class="ceretificat" style="text-align: center;">
<div class="cerinside">
<h2>Credibility and Certifications</h2>
<img src="img/GSN-275-PLATINUM-valid-till-Dec-2019-300x237.jpg" style="max-width: 100%;">
<img src="img/CREDIBILITY-CERTIFICATIONS_2.jpg" style="max-width: 100%;">

</div>
</section>
  
  
</section>
<script>
function saveDonation()
{
	if(validates() != false) {
		
        url = 'Enquiries/donation';
        $(".loader").css("display", "block");
		var posting = $.post(url, 
		{ 
			name: $('#name').val(),
			phone: $('#phone').val(),
			email: $('#email').val(),
			address: $('#address').val(),    
			donations_material: $('#donations-material').val(),    
			drop_pickup: $('#drop-pickup').val(),    
			material_image: $('#imge_name').val(),    
			
		});

		posting.done(function (data) {
		$("#inquiryResponse").html('<div class="alert alert-success" style="display:block;" onclick=\'this.classList.add("hidden")\'>Donation form has been submitted successfully.</div>'); 
		//	$("#inquiryResponse").html(data);
			$(".loader").css("display", "none");
			$("input, textarea").val('');
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
	
	if (document.inquiry.address.value == "") {
       
        $(".valid_error[data-valmsg-for='address']").text("Please fill out address Field.");
        $(".valid_error[data-valmsg-for='address']").parent().addClass("has-error");

        document.inquiry.address.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='address']").text("✔");
        $(".valid_error[data-valmsg-for='address']").parent().removeClass("has-error").addClass("has-success");
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
	

	
	
	/* if(document.inquiry.imge_name.value == "") {

        $(".valid_error[data-valmsg-for='imge_name']").text("Plaese select image.");
        $(".valid_error[data-valmsg-for='imge_name']").parent().addClass("has-error");

        document.inquiry.imge_name.focus();
        return false;
    }
    else {
        $(".valid_error[data-valmsg-for='imge_name']").text("✔");
        $(".valid_error[data-valmsg-for='imge_name']").parent().removeClass("has-error").addClass("has-success");
     } */
	
}
</script>
<?=
$this->Html->scriptBlock("
 
 $('input[type=\'file\']').change(function(){ 
           var input = document.getElementById('file-upload');
		    formData= new FormData();
           file = input.files[0];
		   formData.append('image', file);
		    $.ajax({
			url: '".$this->Url->build(['controller'=>'Enquiries','action' => 'uplode'])."',
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function(success){
				if(success!='error')
				{
					$('#imge_name').val(success);
					$('#show').html(success);
				}
				else{
				}
			}
		  });
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

/* function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$('#file-upload').change(function() {
  readURL(this);
}); */
", ['block' => true]);