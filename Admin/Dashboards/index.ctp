<?= $this->Flash->render(); ?>
<style>
    .dashboard-stat2, .dashboard-stat2 .display{
        margin-bottom:0px;
    }
    .page-content{
        padding-top:45px;
    }
     .widget-small-tag{
        font-size: 13px;
        font-weight: 600;
        color: #8e9daa;
    }
    .widget-thumb-body-stat{
        font-size: 24px !important;
    }
    .widget-row h4{
        font-weight: 600;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="portlet">
            <div class="portlet-title">
                    <h3>Dashboard</h3>
            </div>
        </div>
    </div></div>
<div id="show-das-data">
    <div class="row widget-row">
        <div class="col-md-3">
       <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4><a href="<?= $this->Url->build(['controller' => 'Downloads', 'action' => 'index']) ?>" >Downloads</a></h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-green icon-docs"></i>
                <div class="widget-thumb-body">
                    <small class="widget-small-tag">Active : <?= $data['downloads']['active']; ?></small>
                    <small class="widget-small-tag">InActive : <?= $data['downloads']['inactive']; ?></small>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?= $data['downloads']['total']; ?>">Total : <?= $data['downloads']['total']; ?></span>
                </div>
            </div>
        </div>
		</div>
		<div class="col-md-3">
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4> <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'index']) ?>" >News</a></h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-purple icon-bell"></i>
                <div class="widget-thumb-body">
                   <small class="widget-small-tag">Active : <?= $data['news']['active']; ?></small>
                    <small class="widget-small-tag">InActive : <?= $data['news']['inactive']; ?></small>
                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?= $data['news']['total']; ?>">Total : <?= $data['news']['total']; ?></span>
                </div>
            </div>
        </div>
		</div>
		<div class="col-md-3">
			<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
				<h4><a href="<?= $this->Url->build(['controller' => 'Enquiries', 'action' => 'index']) ?>" >Enquiries</a></h4>
				<div class="widget-thumb-wrap">
					<i class="widget-thumb-icon bg-red icon-layers"></i>
					<div class="widget-thumb-body">
						<small class="widget-small-tag">View : <?= $data['enquiries']['open']; ?></small>
						<small class="widget-small-tag">Pending : <?= $data['enquiries']['close']; ?></small>
						<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?= $data['enquiries']['total']; ?>">Total : <?= $data['enquiries']['total']; ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
				<h4> <a href="<?= $this->Url->build(['controller' => 'JobApplicants', 'action' => 'index']) ?>" >Job Applicants</a></h4>
				<div class="widget-thumb-wrap">
					<i class="widget-thumb-icon bg-purple glyphicon glyphicon-book"></i>
					<div class="widget-thumb-body">
					   <small class="widget-small-tag">View : <?= $data['job_applicants']['open']; ?></small>
						<small class="widget-small-tag">Pending : <?= $data['job_applicants']['close']; ?></small>
						<span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?= $data['job_applicants']['total']; ?>">Total : <?= $data['job_applicants']['total']; ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
            <h4><a href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'index']) ?>">Contact Enquiry</a></h4>
            <div class="widget-thumb-wrap">
                <i class="widget-thumb-icon bg-blue icon-grid"></i>
                <div class="widget-thumb-body">
                  <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?= $data['cenquiries']['total']; ?>">Total : <?= $data['cenquiries']['total']; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
