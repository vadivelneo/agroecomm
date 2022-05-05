<?php                   
		$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$sessionuserData = $this->session->userdata('userlogin');

  
		if($sort_by == "asc")
		{
			 $order = "desc";
		}
		else $order = "asc";
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
		<?php echo $this->session->flashdata('message'); ?>
          <div class="col-sm-6">
            <h1> My Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> My Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
		
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
               <?php
				$sessionuserData = $this->session->userdata('userlogin');
				if($sessionuserData['user_id'] == '1') 
				{
				?>
              <!-- /.card-header -->
			  <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Search</h3>
              </div>
				<div class="card-body">
				<form id="validate-enhanced" action="<?php echo site_url('genelogy/enrollment'); ?>" class="form parsley-form" method="post">

                <div class="row">
					<div class="form-group">
						<label for="name">Customer ID</label>
						<input type="text" id="OfficerID" value='<?php echo $this->input->post("OfficerID");?>' name="OfficerID" class="form-control"  >
					</div> <br>
					<div class="form-group">
						<label for="name">Customer Name</label>
						<input type="text" id="OfficerName" value='<?php echo $this->input->post("OfficerName");?>' name="OfficerName" class="form-control"  >
					</div><br>
					<div class="form-group">
						<label for="name">Mobile</label>
						<input type="text" id="OfficerMobile" value='<?php echo $this->input->post("OfficerMobile");?>' name="OfficerMobile" class="form-control"  >
					</div>
					<div class="form-group">
					<label for="name">&nbsp;</label>
						<button type="submit" style='margin-top: 38%;' class="btn btn-primary" name="search">Submit</button> 
					</div>
                </div>
				</form>
				</div>
              </div>
			  <?php } ?>
              <!-- /.card-body -->
            
			
				 
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
         
      
    </section>
	
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> My Profile </h3>
				<div>
             <a href="<?php echo site_url('genelogy/officerform'); ?>" class="btn btn-primary" style="float:right; margin-top:10px; margin-bottom:10px;">Add New</a>	
        	</div>
			<!--
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>-->
              </div>
              <!-- /.card-header -->
				<div class="card-body table-responsive p-0">
					<table class="table table-hover text-nowrap">
						<thead>
							<tr>
								<th><a href="<?php echo site_url('genelogy/enrollment');?>/OFCR_ID/<?=$order?>/<?=$page_num?>">Sno</a></th>
								<th><a href="<?php echo site_url('genelogy/enrollment');?>/OFCR_ID/<?=$order?>/<?=$page_num?>">Customer ID</a></th>
								<th><a href="<?php echo site_url('genelogy/enrollment');?>/OFCR_FST_NME/<?=$order?>/<?=$page_num?>">Customer Name</a></th>
								<th><a href="<?php echo site_url('genelogy/enrollment');?>/OFCR_USR_EMAIL/<?=$order?>/<?=$page_num?>">Email</a></th>
								<!--<th>PAN Number</th>-->
								<th><a href="<?php echo site_url('genelogy/enrollment');?>/OFCR_MOB/<?=$order?>/<?=$page_num?>">Mobile</a></th>
								<th><a href="<?php echo site_url('genelogy/enrollment');?>/rank/<?=$order?>/<?=$page_num?>">Rank Achived</a></th>
								<th><a href="<?php echo site_url('genelogy/enrollment');?>/OFCR_TRE_SPNCR_ID/<?=$order?>/<?=$page_num?>">Referal ID</a></th>

								<th>Action</th>

							</tr>
						</thead>
						<tbody>
							<?php
							if(!empty($enrollment)) {

							$uri_segment = $this->uri->segment('5');
							$i = 1;
							if($uri_segment == '')
							{
							$i = 1;
							}
							else
							{
							$i = $this->uri->segment('5') + 1;
							}
							foreach($enrollment as $Report) { 
							$j = $i % 2;
							if($j == 0)
							{
							$class = "odd";
							}
							else
							{
							$class = "even";
							}
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $Report['OFCR_USR_VALUE']; ?></td>
								<td><?php echo $Report['OFCR_FST_NME'].' '.$Report['OFCR_LST_NME']; ?></td>
								<td><?php echo $Report['OFCR_USR_EMAIL']; ?></td>
								<!--<td><?php //echo $Report['OFCR_PAN']; ?></td>-->
								<td><?php echo $Report['OFCR_MOB']; ?></td>
								<td><?php echo $Report['rank']; ?></td>
								<td><?php echo $Report['OFCR_TRE_SPNCR_ID']; ?></td>

								<td class="text-center">
								<a href="<?php echo site_url('genelogy/editOfficerProfile/'); ?>/<?php echo $Report['OFCR_ID']; ?>"> 
								<button class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></button></a>
								</td>

							</tr>

							<?php $i++; }  } else { ?>
							<tr>
							<td colspan="8" style="text-align:center;">
							No Records Found
							</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<div class="dataTables_paginate paging_bootstrap">
						<center> <?php echo $page_links; ?> </center>
					</div>
				</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 