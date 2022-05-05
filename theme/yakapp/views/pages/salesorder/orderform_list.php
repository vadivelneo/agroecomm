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


<?php echo $this->load->view('pages/sales_left_side');
$page_num = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
$deliveryStatus = $this->uri->segment(3,"pending");
if($sort_by == "desc") $order = "asc"; else $order = "desc";
$uri2 = $this->uri->segment(2);

$search_so  = $this->session->userdata('sales_order_data');
  // echo "<PRE>";print_r($vq_data);
 $f_date=$search_so['from_date'];
 $t_date=$search_so['to_date'];

 ?>

<section>
  <div class="rightPanel">
  	
    <div class="row-fluid">
     
	  <?php if(isset($salesorder->add_option)) { if($salesorder->add_option != '0') { ?>
      <span class="btn-group">
	   <?php 
					$sessionData = $this->session->userdata('userlogin');
					
					?>
     <button class="addButton" onclick='window.location.href="<?php echo site_url('salesorder/order_form'); ?>"'><i class="icon-plus" ></i>&nbsp;<strong>Add Order Form</strong></button>
	
      </span><?php } } ?>
      
      <span class="span4 btn-toolbar">
        <div class="listViewActions pull-right">
          
          </div>
          <div class="clearfix">
		  
          </div>
          <input type="hidden" value="" id="recordsCount">
          <input type="hidden" name="selectedIds" id="selectedIds">
          <input type="hidden" name="excludedIds" id="excludedIds">
      </span>
      
            <form class="form-horizontal recordEditView" id="stockForm" name="stockForm" method="post" action="<?php echo site_url('salesorder/search_salesorder'); ?>" enctype="multipart/form-data"> 
       <div tabindex="3" class="wrapper_search" id="wrapper_search"> 
       
            <input type="text" 	value="<?php if(isset($search_so['search_so_order'])){ echo $search_so['search_so_order']; }else{}?>" name="search_sale_ord_no" class="input-large search-l" id="search_sale_ord_no" placeholder="Order Form No">
            <span id="auto_complete_sale_ord_no"></span>
            
			
			
           <!-- <input type="text" 	value="<?php //if(isset($search_so['so_qut_no'])){ echo $search_so['so_qut_no']; }else{}?>" name="search_sale_qut_no" class="input-large search-l" id="search_sale_qut_no" placeholder="Sales Quotaion No">
            <span id="auto_complete_sale_qut_no"></span>-->
              <?php 
					$sessionData = $this->session->userdata('userlogin');
					if($sessionData['user_id'] == 1)  {
					?>
            <input type="text" 	value="<?php //if(isset($search_so['search_cus_name'])){ echo $search_so['search_cus_name']; }else{}?>" name="search_cus_name" class="input-large search-l" id="search_cus_name" placeholder="Customer Name">
            <span id="auto_complete_cus_name"></span>
            
           <input type="text" 	value="" name="search_cus_code" class="input-large search-l" id="search_cus_code" placeholder="Customer Code">
            <span id="auto_complete_cus_code"></span>
            <?php }  ?>
          <input type="text" 	value="<?php if($f_date != "1970-01-01"){ echo $search_so['from_date']; }else{}?>" name="from_date" class="input-large search-l" id="from_date" placeholder="From Date">
             
            <input type="text" 	value="<?php if($t_date != "1970-01-01"){ echo $search_so['to_date']; }else{}?>" name="to_date" class="input-large search-l" id="to_date" placeholder="To Date">
             
          
<!--       	 <input type="reset" name="Reset" id="rest" class="btn btn-primary" style="width:80px;" />
-->			<button id="search" name="search" type="submit" class="btn-success">Search</button>
 		 </div> 
      </form>
      
      
   </div>
    
    <div class="table_head" id="table">
      <div class="col w10 last">
	  <div class="sessionMsg"><?php echo $this->session->flashdata('message'); ?></div>
        <div class="content">
          <table>
            <tbody>
              <tr>
                <!-- <th class="checkbox"><input type="checkbox" name="checkbox" id="multipleItemselecctall"></th>-->
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
                
              </tr>
              <?php
			 // echo "<pre>";
			 // print_r($so_list);
		if(!empty($so_list)) {
			$i = $this->uri->segment(5) ? $this->uri->segment(5)+1 : 1;
			
		 foreach($so_list as $SO) { ?>
              <tr class="listViewEntries" data-id='36'  id="Leads_listView_row_1">
                <!--<td class="checkbox"><input type="checkbox" class="itemcheckbox" name="checkbox"></td>-->
				 <td><a href="<?php echo site_url('salesorder/view_salesorder/'); ?>/<?php echo $SO['sales_order_id']; ?>"><?php echo $i;?></a></td>
                <td><?php if(($SO['sales_order_add_date']) != '0000-00-00' && $SO['sales_order_add_date'] != '' && $SO['sales_order_add_date'] != NULL) { ?>
                	<?php echo date('d-m-Y', strtotime($SO['sales_order_add_date'])); ?>
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
                
				 <a href="<?php echo site_url('salesorder/print_sales_order_a4/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="A4 Sheet Printer" target="_blank"><span class="icon-print"></span></a>
				 
				  <?php

					if($sessionData['user_id'] == 1)  { ?>
                <a href="<?php echo site_url('salesorder/print_sales_order/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="Thermal Printer" target="_blank"><span class="icon-print"></span></a>
					<?php } ?>
                <li>
				 <?php if(isset($salesorder->view_option)) { if($salesorder->view_option != '0') { ?>
				<a href="<?php echo site_url('salesorder/vieworderform/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="View">
				<span class="icon-edit">
				</span>
				</a><?php } } ?>
				</li> 
				 <li>
				 <?php if(isset($salesorder->edit_option)) { if($salesorder->edit_option != '0') { ?>
				   <?php /*?><?php if($SO['sales_order_status'] != "delivered" && $SO['sales_order_status'] != "closed" && $SO['sales_order_status'] != "onprocess"  && $SO['sales_order_status'] != "awaiting confirmation"){?><?php */?>
				   
				  <?php

					if($sessionData['user_id'] == 1)  {
					if($SO['sales_order_status'] == "confirmorder"){?>
					
				<a href="<?php echo site_url('salesorder/edit_orderform/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="Edit">  <span class="icon-pencil"></span></a>
                 <?php }else {?>
                 <a href="javascript:void(0)" onclick="edit_block();"><span class="icon-pencil"></span></a>
                 <?php } } 
				 else {?>
				 
				 <a href="<?php echo site_url('salesorder/edit_orderform/'); ?>/<?php echo $SO['sales_order_id']; ?>" title="Edit">  <span class="icon-pencil"></span></a>
				 <?php
				 }
				 } }?>
				</li>
				
                </td>
              </tr>
              <?php $i++;}} else{?>
              <tr>
                <td colspan="6" style="text-align:center;"> No Records Found </td>
              </tr>
              <?php }?>
            </tbody>
          </table>
          
        </div>
        <div class="dataTables_paginate paging_bootstrap">
              <center> <?php echo $page_links; ?> </center>  
          </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</section>
