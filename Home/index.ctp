<?php
$title_for_layout = 'Dungarpur Public School';
$keywords = 'Dungarpur Public School';
$description = 'Dungarpur Public School';
$this->set(compact('title_for_layout', 'description', 'keywords'));
?> 
<!-- InstanceBeginEditable name="body" -->
<div id="mainslider" class="carousel slide" data-ride="carousel">
 	<div class="carousel-inner">
	<?php if(!empty($banners)){ $i=1;
	foreach ($banners as $banner):
	?>
		<div class="carousel-item <?php if($i==1){ ?>active<?php } ?>" data-interval="4000">
			<?php echo $this->Image->image($banner->banner_image, '', 1600, 586, true, false, true, false, true, ['alt' => $banner->alt_tag]); ?>
		</div>
	<?php $i++;endforeach; }?>	
 	</div>
 	
 	<div class="carousel_nav">
 		<a href="#mainslider" class="control-prev" data-slide="prev"><i class="icon-angle-left"></i></a>
 		<a href="#mainslider" class="control-next" data-slide="next"><i class="icon-angle-right"></i></a>
 	</div>
 	
</div>

<div id="welcome" class="container">
	<div class="row">
		<div class="col-lg-5 col-xl-6 order-2 d-none d-lg-block">
			<img src="images/welcome.jpg" alt="Welcome" class="img-fluid">
		</div>
		<div class="col-lg-7 col-xl-6">
			<h4>Welcome</h4>
			<h1>Dungarpur Public School</h1>
			<div class="tagline">Our mission is to develop young creative minds for our nation with social, moral, intellectual and emotional values.</div>
			<p>Dungarpur Public School is the culmination of the vision, inspiration and zeal of Mr. V.K. Ladia Chairman of S.R.S.L.Group.It was the year 1995 that we started our journey in molding the career of the children living in the remote areas. Since that day, we never looked back but we are continuously marching towards attaining the goals and objectives.</p>
			
			<a href="about.html" class="btn btn-secondary">Read More</a>
		</div>
	</div>
</div>

<div id="alumni_meet">
	<a href="<?= $this->url->build('/alumni') ?>">Register Yourself for Alumni Meet</a>
</div>

<div id="princi">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-lg-3"><img src="images/Principal-1.jpg" alt="" class="pr_img"></div>
			<div class="col-md-8 col-lg-9 pr_txt">
				<i class="icon-quote-right"></i>
				<h3>Rajeev Dutt Sharma</h3>
				<div class="post">Director-Principal</div>
				<p class="subtitle"><strong>FROM THE DIRECTOR-PRINCIPAL’S DESK
“The real issue in education is to see that when the child leaves the school, he is well established in goodness both outwardly and inwardly.”</strong></p>
				<p>In the –year 1995 that it has come into existence, the DPS has done much to maintain and expand the standard of education and soul ethical values. The school has achieved enviable reputation. It offers practical, spiritual and self-improvement training to the students. The institution attracts the masses for its enduring and endearing values. We set high standards and believe that growth must result from efficient exploration of an individual in born talent..</p>
				<p>The main motive is to educate the child to his/her maximum capability with all the means available in modern age and to provide overall personality development, foster independent thinking, develop leadership qualities and confidence and enrich them about their culture. </p>
				<p>It is a developing school and we propose to add to its excellence in all facets of school education year after year. There is no end of perfection. But on a modest estimate, we can confidently say that this school is sufficiently equipped with A V Rooms,Laboratories, Library and Sports facilities with excellent teachers.</p>
				<p>To bring up the school calls for wholehearted dedication the part of students, staff members as well as everyone associated with the school. We expect co-operation in making our dreams a reality. Let us therefore remember that:
				
				</p>
				<p style="text-align: center;">
					<strong>“To get together is the beginning;<br/>
						To stay together is progress"
					</strong>
				
				</p>
<!--				<a href="#" class="btn btn-secondary">Read More</a>-->
			</div>
		</div>
	</div>
</div>

<div class="facilities">
	<div class="container">
		<div class="row">
			<a href="<?php echo $this->url->build('/downloads'); ?>" class="col-lg-3 order-lg-3" id="dwdsec">
				<div>
					<i class="icon-download-cloud"></i> Downloads
				</div>
			</a>

			<div class="col-lg-3  order-lg-1 txtb fcltb">
				<h2>Activities</h2>
				<p>Lorem Ipsum is simply dummy text of the typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

			</div>

			<div class="col-lg-6 order-lg-2">
				<div class="row">
					<div class="col-sm-6 imgblk">
						<img src="images/act1.jpg" alt="" class="img-fluid">
					</div>
					<div class="col-sm-6 txtb">
						<h3>Co-Curricular Activities</h3>
						<p>Lorem Ipsum is simply dummy text of the typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
					</div>
				</div>
			</div>
			</div>
		
		<div class="row">
			<div class="col-lg-6">
				<div class="row">
					<div class="col-sm-6 order-md-2 order-lg-1 imgblk">
						<img src="images/act2.jpg" alt="" class="img-fluid">
					</div>
					<div class="col-sm-6 order-md-1 order-lg-2 txtb">
						<h3>Art &amp; Media</h3>
						<p>Lorem Ipsum is simply dummy text of the typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
					</div>
				</div>
			</div>
			
			<div class="col-lg-6">
				<div class="row">
					<div class="col-sm-6 imgblk">
						<img src="images/act3.jpg" alt="" class="img-fluid">
					</div>
					<div class="col-sm-6 txtb">
						<h3>Sports</h3>
						<p>The School has large play grounds for all school games. It has a Career Counseling Centre which gives all kinds of information about the career options after school education.</p>
					</div>
				</div>
			</div>
	</div>
	</div>
</div>




<!-- InstanceEndEditable -->
<?php 
$this->Html->scriptBlock(" 
$(document).ready(function(){
Shadowbox.init({
	overlayOpacity: 0.8,
}, setupDemos);

function setupDemos() {
	Shadowbox.setup('.homegallery a', {
		gallery: 'mustang',
		continuous: true,
		counterType: 'false'
	});
}
});
", ['block' => true]); ?>