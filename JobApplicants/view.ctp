<div style="width: 100%;float:left;">
<img src="img/current-opening.jpg" style="width:100%;">
</div>





<section class="vocational">
    <div style="overflow:hidden;width: 100%;
    float: left;">
	<div class="row"><div class="col-md-1"></div>
	<div class="col-md-10"><?= $this->Flash->render() ?></div><div class="col-md-1"></div>
	</div>


		<div class="vocationalin" style="padding: 10px 0px 0px 0px;">
		  <h2>Current Opening</h2>
		</div>

		<div class="col-sm-12 text-center" style="width: 100%;float:left;width: 100%;float:left;padding:0px;">
      <div class="workright current" style="float: left;
    width: 100%;
    margin-top: 40px;">
        <p style="text-align:center;">ETASHA Society’s success is rooted in our team and our culture. Our team members share a strong passion for helping and mentoring young minds from underprivileged communities. We not only seek candidates who share the same passion as we have, but are also driven by new ideas to encourage us to work better as a team and touch more lives. At ETASHA, you can expect a work culture strongly characterized by enthusiasm and energy. If you have a strong desire to work with the underprivileged and are ambitious about bringing change in their communities, we strongly encourage you to apply.
</p>

      
      </div>
      </div>


		<?php if($count>0){ ?>
		<div class="clearfix" style="float:left;width: 100%;">
		<div class="container clearfix" id="document">
			

			<div class="tab-content">
			<?php  $j=1;
			
			?>
				<div id="tabs" class="tab-pane fade in active">
					<div class="innews">
						<ul>
							<?php if(!empty($jobs)){ 
								foreach($jobs as $job)
								{
							?>
								<li>
								<a href="<?= $this->Url->Build('/current-opening/'.$job->id) ?>"><?= $job->name ?></a>
								</li>
							<?php }} ?>
						</ul>
					</div>
				</div>
			<?php $j++; ?>
			</div>
		</div>
		</div>
		<?php }else{ ?>
		<h4>Currently we don't have any open positions but if you are interested in possible future opportunities please send your CV to 
		<p class="email_cls"><a href="mailto:email: etasha@etashasociety.org">etasha@etashasociety.org</a> 
		<a href="mailto:email: etashasociety@gmail.com">etashasociety@gmail.com</a></p> </h4>
		<?php } ?>
	</div>
</section>