<?php                   
		$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
		$sessionuserData = $this->session->userdata('userlogin');

  
		if($sort_by == "asc")
		{
			 $order = "desc";
		}
		else $order = "asc";
?>
<div class="container">

  <div class="content">

<?php 
 if($sessionuserData['user_id'] != '1')
		  { ?>
    <div class="content-container" style="margin-bottom:450px";>
 <?php } else { ?>
 <div class="content-container">
 <?php } ?>

      <div class="row">

        <div class="col-md-12">
         <!-- /.portlet-content -->
		        
      </div>
		<div class="sessionMsg">
        	<?php echo $this->session->flashdata('message'); ?>
        </div>
          <div class="portlet">

            <div class="portlet-header">

              <h3>
                <i class="fa fa-table"></i>
                My Profile
              </h3>
             
			 <div>
             <a href="<?php echo site_url('genelogy/officerform'); ?>" class="btn btn-primary" style="float:right; margin-top:10px; margin-bottom:10px;">Add New</a>	
        	</div>
          
            </div> <!-- /.portlet-header -->
			<?php
$sessionuserData = $this->session->userdata('userlogin');
  if($sessionuserData['user_id'] == '1') 
  {
	?>
 <div class="portlet-content">
		
          <form id="validate-enhanced" action="<?php echo site_url('genelogy/enrollment'); ?>" class="form parsley-form" method="post">
          
          <div class="row">

            <div class="col-sm-4">

<div class="form-group">
                  <label for="name">Customer ID</label>
                  <input type="text" id="OfficerID" name="OfficerID" class="form-control"  >
              </div> <br>
              <div class="form-group">
                  <label for="name">Customer Name</label>
                  <input type="text" id="OfficerName" name="OfficerName" class="form-control"  >
              </div><br>
<div class="form-group">
                  <label for="name">Mobile</label>
                  <input type="text" id="OfficerMobile" name="OfficerMobile" class="form-control"  >
              </div>
                            
            </div> <!-- /.col -->

          
            
            <div class="col-sm-4">
			  
              <div class="form-group">
              	  &nbsp;
              </div>
              <div class="form-group">
              	  &nbsp;
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="search">Submit</button>
              </div>

            </div> <!-- /.col -->
            
             <!-- /.col -->
			</form>
          </div> <!-- /.row -->

           <!-- /.row -->


        </div> 
		
<?php }	?>
            <div class="portlet-content">
            
              <div class="table-responsive">

              <table class="table table-striped table-bordered table-hover table-highlight table-checkable" data-provide="datatable" data-display-rows="10" data-info="true" data-search="true" data-length-change="true" data-paginate="true">
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
                       		<button class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></button></a>
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
              </div> <!-- /.table-responsive -->
              

            </div> <!-- /.portlet-content -->

          </div> <!-- /.portlet -->

        

        </div> <!-- /.col -->

      </div> <!-- /.row -->

    </div> <!-- /.content-container -->
      
  </div> <!-- /.content -->


</div>