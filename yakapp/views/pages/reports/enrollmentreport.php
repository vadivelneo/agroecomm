<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
		<?php echo $this->session->flashdata('message'); ?>
          <div class="col-sm-6">
            <h1>Direct Downline Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Direct Downline Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
		
<section class="content">
      <div class="container-fluid">
        <div class="row">
		 
		  
		 
          <div class="col-12">
          
                
              <!-- /.card-header -->
			  <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Search</h3>
              </div>
				<div class="card-body">
				<form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('reports/search_direct_downline'); ?>" enctype="multipart/form-data"> 
		  
				   <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
					<div class="current_main_inner1">
							<ul style="font-size:14px;margin-bottom: 25px;align:centre;">
								<li>Total Direct Count: <?php echo count($level_count); ?></li>
							</ul>
						</div>
						 
						<input type="text"   name="search_cus_id" class="input-large search-l" id="search_cus_id" placeholder="Customer ID" value="<?php echo $this->input->post('search_cus_id');?>" >
						<span id="auto_complete_sale_ord_no"></span>
								   
						<input type="text"  name="search_cus_name" class="input-large search-l" id="search_cus_name" placeholder="Customer Name" value="<?php echo $this->input->post('search_cus_name');?>">
						<span id="auto_complete_cus_name"></span>
						
					   <input type="text"   name="search_cus_phone" class="input-large search-l" id="search_cus_phone" placeholder="Customer Phone" value="<?php echo $this->input->post('search_cus_phone');?>">
						<span id="auto_complete_cus_code"></span>
				   
						
						<button id="search" name="search" type="submit" class="btn-success">Search</button>
					 </div> 
				  </form>
				</div>
              </div>
			 
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
                <h3 class="card-title"> Direct Downline Report </h3>
				<div>
             	
        	</div>
			 
              </div>
              <!-- /.card-header -->
				<div class="card-body table-responsive p-0">
					<table class="table table-hover text-nowrap">
						<thead>
							 <tr>
								<th>S.No</th>
								<th>Customer ID</th>
								<th>Customer Name</th>
								<th>Customer Mobile</th>
								<th>Customer Rank</th>
							
							</tr>
						</thead>
						<tbody>
							 <?php
								  //echo "<pre>";
								  //print_r($subuser_data);
							if(!empty($subuser_data)) {
								$i = $this->uri->segment(5) ? $this->uri->segment(5)+1 : 1;
							 foreach($subuser_data as $pro) { ?>
								  <tr>
							
								<td  class="show_table"><?php echo $i; ?></td>
								<td  class="show_table"><?php echo $pro['OFCR_USR_VALUE']; ?></td>
								<td><?php echo ucfirst($pro['OFCR_FST_NME']).' '.ucfirst($pro['OFCR_LST_NME']); ?></td>
								<td><?php echo $pro['OFCR_MOB']; ?></td>
								<td><?php echo ''; ?></td>
								
								
							  
							</tr>
								  <?php $i++;}} else{?>
								  <tr>
									<td colspan="6" style="text-align:center;"> No Records Found </td>
								  </tr>
								  <?php }?>
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
 
 
 
 
