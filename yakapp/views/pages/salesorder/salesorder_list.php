 
<link rel="stylesheet" href="http://localhost/neo/agro/agro_ecomm1/agro_ecomm1//resources/css/jquery-ui.css" />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
		<?php echo $this->session->flashdata('message'); ?>
          <div class="col-sm-6">
            <h1>Self Purchase</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Self Purchase     </li>
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
				<?php if(isset($salesorder->add_option)) { if($salesorder->add_option != '0') { ?>
					<span class="btn-group">
					<?php 
					$sessionData = $this->session->userdata('userlogin');
					if($sessionData['user_id'] == 1)  {
					?>
					<button class="addButton" onclick='window.location.href="<?php echo site_url('salesorder/addsalesorder'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Self Purchase</strong></button>
					<?php }  ?>
					</span>
					<?php } } ?>
				<form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('salesorder/search_salesorder'); ?>" enctype="multipart/form-data"> 
					<div tabindex="3" class="row wrapper_search" id="wrapper_search"> 
						<div class="report_field field_box col-md-2">
							<div class="report_field_label">
								<p>Sales Order No : </p>
							</div>	
							<div class="report_field_input">
						<input type="text" 	value="<?php echo $this->input->post('search_sale_ord_no');?>" name="search_sale_ord_no" class="form-control input-large search-l" id="search_sale_ord_no" placeholder="Sales Order No">
						<span id="auto_complete_sale_ord_no"></span>
						</div>
						</div>
						
						<?php 
						$sessionData = $this->session->userdata('userlogin');
						if($sessionData['user_id'] == 1)  {
						?>
						<div class="report_field field_box col-md-2">
							<div class="report_field_label">
								<p>Customer Name : </p>
							</div>	
							<div class="report_field_input">
						<input type="text" 	value="<?php echo $this->input->post('search_cus_name');?>" name="search_cus_name" class="form-control  input-large search-l" id="search_cus_name" placeholder="Customer Name">
						<span id="auto_complete_cus_name"></span>
						</div>
						</div>
						
						<div class="report_field field_box col-md-2">
							<div class="report_field_label">
								<p>Customer Code : </p>
							</div>	
							<div class="report_field_input">
						<input type="text" 	value="<?php echo $this->input->post('search_cus_code');?>" name="search_cus_code" class="form-control  input-large search-l" id="search_cus_code" placeholder="Customer Code">
						<span id="auto_complete_cus_code"></span>
						</div>
						</div>
						<?php }  ?>
						<div class="report_field field_box col-md-2">
							<div class="report_field_label">
								<p>From Date : </p>
							</div>	
							<div class="report_field_input">
						<input type="text" autocomplete='off' 	value="<?php echo $this->input->post('from_date');?>" name="from_date" class=" form-control  input-large search-l" id="from_date" placeholder="From Date">
						</div>
						</div>
						
						<div class="report_field field_box col-md-2">
							<div class="report_field_label">
								<p>To Date : </p>
							</div>	
							<div class="report_field_input">
						<input type="text" autocomplete='off'	value="<?php echo $this->input->post('to_date');?>" name="to_date" class="form-control  input-large search-l" id="to_date" placeholder="To Date">
						</div>
						</div>
						
						<div class="report_field field_box col-md-2">
							<div class="report_field_label">
								<p>Status : </p>
							</div>	
							<div class="report_field_input">
						<select class="form-control  status"  name="status" id="search_status">
						<option value="">Select to All</option>
						<option value="created" <?php if($this->input->post('status') =="created") { ?> selected="selected" <?php } ?>>Created</option>
						<option value="approved" <?php if($this->input->post('status') =="approved") { ?> selected="selected" <?php } ?>>Approved</option>
						<option value="cancelled" <?php if($this->input->post('status') =="cancelled") { ?> selected="selected" <?php } ?>>Cancelled</option>
						</select>
						</div>
						</div>
						<div class="report_field field_box col-md-2">
							<div class="report_field_label">
								 <p> Action </p>
							</div>	
							<div class="report_field_input">
						<button id="search" name="search" type="submit" class="btn btn-success">Search</button>
						</div></div>
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
                <h3 class="card-title"> Self Purchase </h3>
			</div>
              <!-- /.card-header -->
				<div class="card-body table-responsive p-0">
					<table class="table table-hover text-nowrap">
					<tr>
						<thead>
							<th width="100px"><a href="<?php echo site_url('salesorder/'.$uri2);?>/sales_order_requested_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">S.No &nbsp;&nbsp;</a></th>
							<th width="100px"><a href="<?php echo site_url('salesorder/'.$uri2);?>/sales_order_requested_date/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">SO Date &nbsp;&nbsp;</a></th>
							<th width="150px"><a href="<?php echo site_url('salesorder/'.$uri2);?>/sales_order_number/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Invoice No&nbsp;&nbsp;</a></th>
							<?php 
							$sessionData = $this->session->userdata('userlogin');
							if($sessionData['user_id'] == 1)  {
							?>

							<th  width="250px"><a href="<?php echo site_url('salesorder/'.$uri2);?>/sales_order_customer_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Customer Name&nbsp;&nbsp;</a></th>

							<th  width="150px"><a href="<?php echo site_url('salesorder/'.$uri2);?>/sales_order_customer_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Customer ID&nbsp;&nbsp;</a></th>

							<th  width="150px"><a href="<?php echo site_url('salesorder/'.$uri2);?>/sales_order_customer_name/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Mobile&nbsp;&nbsp;</a></th>

							<?php } ?>

							<th width="150px"><a href="<?php echo site_url('salesorder/'.$uri2);?>/so_grand_total/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues numeric_value ">Amount &nbsp;&nbsp;</a></th>

							<th width="200px"><a href="<?php echo site_url('salesorder/'.$uri2);?>/sales_order_status/<?=$order?>/<?=$page_num?>" class="listViewHeaderValues">Status&nbsp;&nbsp;</a></th>
							<th width="150px">Actions</th>
						</thead>
						<tbody>
							<?php 
							if(!empty($so_list)) {
							$i = $this->uri->segment(5) ? $this->uri->segment(5)+1 : 1;

							foreach($so_list as $SO) { ?>
							<tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
							<!--<td class="checkbox"><input type="checkbox" class="itemcheckbox" name="checkbox"></td>-->
							<td><a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>"><?php echo $i;?></a></td>
							<td><?php if(($SO['sales_order_transaction_date']) != '0000-00-00' && $SO['sales_order_transaction_date'] != '' && $SO['sales_order_transaction_date'] != NULL) { ?>
							<?php echo date('d-m-Y', strtotime($SO['sales_order_transaction_date'])); ?>
							<?php } else { ?>
							-
							<?php } ?> </td>
							<td><a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>"><?php echo $SO['sales_order_number'];?></a></td>

							<?php 
							if($sessionData['user_id'] == 1)  {
							?>
							<td><a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>"><?php echo  $SO['OFCR_FST_NME']." ".$SO['OFCR_LST_NME']; ;?></a></td>

							<td><a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>"  ><?php echo $SO['OFCR_USR_VALUE'];?></a></td>

							<td><a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>"  ><?php echo $SO['OFCR_MOB'];?></a></td>
							<?php } ?>

							<td><a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>" class="numeric_value" ><?php echo $SO['so_grand_total'];?></a></td>

							<td><a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>" ><?php echo $SO['sales_order_status'];?></a></td>
							<td>

							<a href="<?php echo site_url('salesorder/print_sales_order_a4/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="A4 Sheet Printer" target="_blank"><span class="fa fa-print"></span></a>

							<?php

							if($sessionData['user_id'] == 1)  { ?>
							<a href="<?php echo site_url('salesorder/print_sales_order/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="Thermal Printer" target="_blank"><span class="fa fa-print"></span></a>
							<?php } ?>
							 
							<?php if(isset($salesorder->view_option)) { if($salesorder->view_option != '0') { ?>
							<a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="View">
							<span class="fa fa-eye">
							</span>
							</a><?php } } ?>
							  
							 
							<?php if(isset($salesorder->edit_option)) { if($salesorder->edit_option != '0') { ?>
							 
							<?php

							if($sessionData['user_id'] == 1)  {
							if($SO['sales_order_status'] == "created"){?>

							<a href="<?php echo site_url('salesorder/edit_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="Edit">  <span class="fa fa-edit"></span></a>
							<?php }else {?>
							<a href="javascript:void(0)" onclick="edit_block();"><span class="fa fa-edit"></span></a>
							<?php } } } }?>
							 
							 
							</td>
							</tr>
							<?php $i++;}} else{?>
							<tr>
							<td colspan="6" style="text-align:center;"> No Records Found </td>
							</tr>
							<?php }?>
						</tbody>
					</tr>	
        

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
 
 
 <script>

function deleteso(id,status)
{
	sure = confirm('Are you sure to Delete?');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('salesorder/deletesalesorder/'); ?>/'+id+'/'+status;
	 	window.location.href = url;
    }
	else 
	{
    	return false;
    }
}
function send_email(id)
{
	sure = confirm('Are you sure want to Send Email');
	if (sure==true) 
	{
     	var url = '<?php echo site_url('pdf_saleorder/sales_order/'); ?>/'+id;
	 	window.location.href = url;
    }
	else 
	{
    	return false;
    }
}
function edit_block()
{
	alert("The Sales Orders Cant Be Edited in this Status!!");
	return false;
}



$(document).ready(function () {

$('#multipleItemselecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.itemcheckbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
	
$( "#from_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
		changeMonth: true,//this option for allowing user to select month
		changeYear: true, //this option for allowing user to select from year range
		maxDate : new Date
	});
	$( "#to_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
		changeMonth: true,//this option for allowing user to select month
		changeYear: true, //this option for allowing user to select from year range
		maxDate : new Date
	});
	
 $("#search_sale_ord_no").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_sale_order_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_sale_ord_no",
  });
  
 $("#search_po_ref_no").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_po_ref_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_po_ref_no",
  });
  
// smart search for sales quotation No
  $("#search_sale_qut_no").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_sale_qut_no'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_sale_qut_no",
  });	
  
  $("#search_cus_name").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_cus_name'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_cus_name",
  });	
  
  $("#search_cus_code").autocomplete({
    source: "<?php echo site_url('sales_autocomplete/get_cus_code'); ?>", 
	autoFocus:true,
	appendTo: "#auto_complete_cus_code",
  });
  
	
	
		

  });


</script>
